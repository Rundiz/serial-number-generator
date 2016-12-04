<?php


require __DIR__.'/Autoload.php';

$Autoload = new \Rundiz\SerialNumberGenerator\Tests\Autoload();
$Autoload->addNamespace('Rundiz\\SerialNumberGenerator\\Tests', __DIR__);
$Autoload->addNamespace('Rundiz\\SerialNumberGenerator', dirname(dirname(__DIR__)).'/Rundiz/SerialNumberGenerator');
$Autoload->register();