<?php

require_once('../autoloader.php');

try {
  $teslaFactory = new \FactoryMethod\TeslaFactory;
  $dodgeFactory = new \FactoryMethod\DodgeFactory;

  $teslaModeloS = $teslaFactory->criarCarro('modelo_s');
  $teslaModeloX = $teslaFactory->criarCarro('modelo_x');

  $dodgeCharger = $dodgeFactory->criarCarro('charger');
  $dodgeDart = $dodgeFactory->criarCarro('dart');
} catch (Exception $e) {
  echo $e->getMessage();
}

echo $teslaModeloS->acelerar();
echo $teslaModeloS->frear();
echo $teslaModeloS->trocarMarcha();
echo '<br />';

echo $teslaModeloX->acelerar();
echo $teslaModeloX->frear();
echo $teslaModeloX->trocarMarcha();
echo '<br />';

echo $dodgeCharger->acelerar();
echo $dodgeCharger->frear();
echo $dodgeCharger->trocarMarcha();
echo '<br />';

echo $dodgeDart->acelerar();
echo $dodgeDart->frear();
echo $dodgeDart->trocarMarcha();
echo '<br />';
?>