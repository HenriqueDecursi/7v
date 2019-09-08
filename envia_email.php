<?php

// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nome = $_POST['nome'];
$email = trim($_POST['email']);
$telefone = $_POST['telefone'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];


/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<p align="center">FORMULÁRIO PREENCHIDO NO SITE</P>
<p><b>Nome:</b> '.$nome.'
<p><b>E-Mail:</b> '.$email.'
<p><b>Telefone:</b> '.$telefone.'
<p><b>Assunto:</b> '.$assunto.'
<p><b>Mensagem:</b> '.$mensagem.'</p>
<hr>';


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
$headers = 'MIME-Version: 1.0\r\n';
$headers .= 'Content-type: text/html; charset='.$charset.'\r\n';
$headers .= 'Reply-To: '.$email.'\r\n';
//$headers .= 'Cc: copia@seudominio\r\n'; //CAMPO COPIA OPCIONAL
//$headers .= 'Bcc: copiaoculta@seudominio\r\n'; //CAMPO COPIA OCULTA OPCIONAL
$headers .= 'From: contato@sethviagens.com\r\n';
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $email\r\n"; // remetente
$headers .= "Return-Path: contato@sethviagens.com \r\n"; // return-path
$envio = mail("contato@sethviagens.com", $assunto, $mensagemHTML, $headers);

//Verifica se os campos estão preenchidos para enviar então o email
if (!empty($nome) && !empty($email) && !empty($mensagem)) {
    mail($envio);
    $msg = "Sua mensagem foi enviada com sucesso!";
    echo "<script>alert('$msg');window.location.assign('https://www.sethviagens.com/contato.html');</script>";
} else {
    $msg = "Infelizmente não conseguimos enviar sua mensagem!";
    echo "<script>alert('$msg');window.location.assign('https://www.sethviagens.com/contato.html');</script>";
}