<?php
 
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 
    return $PDO;
}
 
 
/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
function make_hash($str)
{
    return sha1(md5($str));
}
 
 
/**
 * Verifica se o usuário está logado
 */
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}
//A primeira converte uma data yyyy-mm-dd para dd/mm/aaaa e a segunda faz o inverso.
function dataBR($umadata) {

    $brdata = substr($umadata,8,2)."/".substr($umadata,5,2)."/".substr($umadata,0,4);

    return $brdata;

}
function dataMY($umadata) {

    $mydata = substr($umadata,6,4)."-".substr($umadata,3,2)."/".substr($umadata,0,2);

    return $mydata;

}
function dataSP(){
$h = "3"; //HORAS DO FUSO ((BRASÍLIA = -3) COLOCA-SE SEM O SINAL -).
$hm = $h * 60;
$ms = $hm * 60;
//COLOCA-SE O SINAL DO FUSO ((BRASÍLIA = -3) SINAL -) ANTES DO ($ms). DATA
$gmdata = gmdate("m/d/Y", time()-($ms)); 
//COLOCA-SE O SINAL DO FUSO ((BRASÍLIA = -3) SINAL -) ANTES DO ($ms). HORA
$gmhora = gmdate("g:i", time()-($ms)); 
//$data = date('Y/m/d H:i:s',time());
return $gmhora;
}
function data2(){
$mes=date('n');
$ano=date('Y');
$dia=date('d');
$seg=date('s');


$gmt=date('O')*-1;
$timestamp = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
$data_hora = gmdate("Y/m/d H:i:s", $timestamp);

return $data_hora;
}