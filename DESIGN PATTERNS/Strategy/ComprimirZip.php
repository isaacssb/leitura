<?php
namespace Strategy;

class ComprimirZip extends CompressaoStrategy
{
  public function comprimir(string $caminhoArquivos): bool
  {
    echo 'Arquivo comprimido no formato ".Zip"';
    return true;
  }
}