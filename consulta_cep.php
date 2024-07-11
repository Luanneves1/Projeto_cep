<?php

require __DIR__.'/vendor/autoload.php';

use App\WebService\ViaCEP;

if (!isset($argv[1])) {
    die("CEP não definido\n");
}

$cep = $argv[1];
$dadosCEP = ViaCEP::consultarCEP($cep);

print_r($dadosCEP);
