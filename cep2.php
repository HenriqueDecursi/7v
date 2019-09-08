<?php
/**

* Busca endereço através do CEP passado pela "querystring" e

* retorna um documento de texto com os parâmetros separados

* por ponto e vírgula.

*

* Carlos Reche (carlosreche@yahoo.com)

* 23.09.2005

*

* baseado no exemplo de Tatiane Gonzaga (tati@soportais.com.br)

* publicado no fórum iMasters (http://forum.imasters.com.br/)

*/

 

$cep = isset($_GET["cep"]) ? preg_replace("/[^\d]/", "", $_GET["cep"]) : false;

$numero = isset($_GET["numero"]) ? trim($_GET["numero"]) : "";

$logradouro = "";

$bairro = "";

$localidade = "";

$uf = "";

 

if ($cep) {

    $res = @file_get_contents("http://www.correios.com.br/servicos/falecomoscorreios/ctBuscaEndereco.cfm?cep=" . $cep);

    if ($res) {

      preg_match_all("/\.value\s*=\s*[\"\']([^\"\']*)[\"\']/", $res, $matches);

      $logradouro = $matches[1][0];

      $bairro = $matches[1][1];

      $localidade = $matches[1][2];

      $uf = $matches[1][3];

    }

}

 

header("Content-type: text/plain");

echo $logradouro . ";" . $numero . ";" . $bairro . ";" . $localidade . ";" . $uf . ";" . $cep;

 

?>