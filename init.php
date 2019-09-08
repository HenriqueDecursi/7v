<?php
 
 /*
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'bdhost0118.servidorwebfacil.com');
define('DB_USER', 'sethviag_admin');
define('DB_PASS', 'Sv!1357531sV');
define('DB_NAME', 'sethviag_db_geral');
*/

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_seth_viagens');

 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
// inclui o arquivo de funçõees
require_once 'functions.php';

?>