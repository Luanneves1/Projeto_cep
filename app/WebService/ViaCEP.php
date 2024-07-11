<?php

namespace App\WebService;

class ViaCEP
{

    /**
     * Método responsável por consultar um cep no VIACEP
     * 
     * @param string $cep
     * @return array
     * 
     */

    public static function consultarCEP($cep)
    {

        //INICIA O CURL
$curl = curl_init();

//CONFIGURAÇÃO DO CURL
curl_setopt_array($curl,[CURLOPT_URL => 'https://viacep.com.br/ws/'.$cep.'/json/',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_CUSTOMREQUEST => 'GET'
]);
        
//Response
$response = curl_exec($curl);

//fechar a conexão
curl_close($curl);

//Converter o JSON para ARRAY

$arrResponse = json_decode($response,true);

//RETORNA O CONTEUDO EM ARRAY

return isset($arrResponse['cep'])? $arrResponse : null;

    }
}
