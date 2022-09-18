<?php
require 'mailer/PHPMailerAutoload.php';

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'],

}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'],
}

if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
    $assunto = $_POST['assunto'],
}
if (isset($_POST['escrever']) && !empty($_POST['escrever'])) {
    $escrever= $_POST['escrever'],
}

$mail = new PHPmailer;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'exemplo@gmail.com';
$mail->Password = 'senha';
$mail->Port = 587;

$mail->setFrom('emai@gmail.com' , 'contato')
$mail->addAddress('emai@gmail.com')

$mail->isHTML(true);

$mail->Subject = $assunto;
$mail->Body    = nl2br($mensagem);
$mail->AltBody = nl2br(strip_tags($mensagem));

if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    header('Location: index.php?enviado');
}
?>