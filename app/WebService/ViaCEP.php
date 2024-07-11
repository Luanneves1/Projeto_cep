<?php

namespace App\WebService;

class ViaCEP
{
    /**
     * Método responsável por consultar um cep no VIACEP
     * 
     * @param string $cep
     * @return array
     */
    public static function consultarCEP($cep)
    {
        // Inicia o CURL
        $curl = curl_init();

        // Configuração do CURL
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://viacep.com.br/ws/'.$cep.'/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);
        
        // Response
        $response = curl_exec($curl);

        // Fechar a conexão
        curl_close($curl);

        // Converter o JSON para ARRAY
        $arrResponse = json_decode($response, true);

        // Retorna o conteúdo em ARRAY
        return isset($arrResponse['cep']) ? $arrResponse : null;
    }
}
