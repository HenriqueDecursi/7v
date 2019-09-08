<?php
 
// inclui o arquivo de inicialização
require 'init.php';

// define a data e hora padrão
//date_default_timezone_set(‘America/Sao_Paulo’);

// pega data e hora
//$data = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));




$data_hora = data2();


// seta uma página para retorno caso 
// dê errado pegar de onde está vindo a requisição
$paginaRetorno = "https://localhost/destino/index.html";

//pega o caminho da requisição
$indicesServer = array('HTTP_REFERER'); 

//procura no vetor e seta na variável $paginaRetorno
foreach ($indicesServer as $arg) { 
    if (isset($_SERVER[$arg])) { 
        //echo '<tr><td>'. $_SERVER[$arg] . '</td></tr>' ;
        $paginaRetorno =  $_SERVER[$arg];  
    } 
   
} 



// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
//$email = $_POST['email'];
 
// abre conexao com o bd 
$PDO = db_connect();

// procura na base de dados se o email existe

$sql = "SELECT email FROM tb_news WHERE email = :email";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// faz a contagem de usuarios que foram encontrados
$cont_users = count($users);

//echo $cont_users;
//echo "<br> Email->". $email;

if ($cont_users <= 0)
{
    $sql = "INSERT INTO tb_news(email, data) values (:email, :data)";
    
    $stmt = $PDO->prepare($sql);
      
   
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':data', $data_hora);
       
    $stmt->execute();

      $msg = "Cadastrado com sucesso!";
    echo "<script>alert('$msg');window.location.assign('".$paginaRetorno."');</script>";
    
   // header('Location: '.$paginaretorno);
}else{
	$msg = "Você já está cadastrado!";
    echo "<script>alert('$msg');window.location.assign('".$paginaRetorno."');</script>";
}
 


//header('Location: index.html');


/*
//Verifica se os campos estão preenchidos para pesquisar se já existe o email
if (!empty($email)) {
    
    $msg = "Sua mensagem foi enviada com sucesso!";
    echo "<script>alert('$msg');window.location.assign('https://www.sethviagens.com/contato.html');</script>";
} else {
    $msg = "Infelizmente não conseguimos enviar sua mensagem!";
    echo "<script>alert('$msg');window.location.assign('https://www.sethviagens.com/contato.html');</script>";
}

*/

?>