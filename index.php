<?php 

require __DIR__.'/vendor/autoload.php';

//Dependência
use \App\WebService\ViaCEP;

//Verifica a existencia do cep no comando 

if(!isset($argv[1])){

    die("CEP não definido");
}


//Execulta a consulta de cep
$dadosCEP = ViaCEP::consultarCEP($argv[1]);

//imprime o resultado
print_r($dadosCEP);