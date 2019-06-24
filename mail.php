<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];


$mail->isSMTP();                                      
$mail->Host = 'smtp.mail.ru';  																							
$mail->SMTPAuth = true;                             
$mail->Username = 'avtomattorginfo@mail.ru'; // Ваш логин от почты с которой будут отправляться письма, почта от хостинга
$mail->Password = 'infoWebFree'; // Ваш пароль от почты с которой будут отправляться письма, пароль от посты хостинга
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465; 

$mail->setFrom('avtomattorginfo@mail.ru'); // от кого будет уходить письмо? Снова ввести почту хостинга
$mail->addAddress('sv.avtomattorg@yandex.ru');     // Кому будет уходить письмо Ваш емаил на яндексе, уже ввел

$mail->isHTML(true);                                  

$mail->Subject = 'Заявка с сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: index.html');
}
?>