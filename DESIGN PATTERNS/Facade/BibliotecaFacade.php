<?php
namespace Facade;

use Facade\{
  ModuloControleClientes, ModuloControleEstoque, ModuloApiSms, ModuloEmail
};

class BibliotecaFacade
{
  public function efetuaRetirada(string $codigoLivro, string $cpfCliente): bool
  {
    $moduloControleEstoque = new ModuloControleEstoque();

    if (!$moduloControleEstoque->validaEstoque($codigoLivro)) {
      throw new Exception('Estoque Indispon�vel');
    }

    return $moduloControleEstoque->registraRetirada($codigoLivro, $cpfCliente);
  }

  public function disparaMensagens(string $codigoLivro, string $cpfCliente, string $apiKey, string $apiPass): bool
  {
    $moduloSms = new ModuloApiSms();
    $moduloControleClientes = new ModuloControleClientes();
    $moduloEmail = new ModuloEmail();

    $cliente = $moduloControleClientes->buscaCliente($cpfCliente);

    if ($moduloEmail->validaServidorDeEmails()) {
      $moduloEmail->enviaMensagem(
        'Biblioteca de Teste',
        $cliente['nome'],
        $cliente['email'],
        "Aluguel de livro de c�digo '{$codigoLivro}' efetuado com sucesso!"
      );
    }

    $token = $moduloSms->geraTokenApi($apiKey, $apiPass);

    $moduloSms->enviaSms(
      $token,
      'Biblioteca de Teste',
      $cliente['nome'],
      $cliente['telefone'],
      "Aluguel de livro de c�digo '{$codigoLivro}' efetuado com sucesso!"
    );

    return true;
  }
}