<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(empty($_POST['name']))
{
	header('Location:contact_Form.php?error=name');
}
if(empty($_POST['email']))
{
	header('Location:contact_Form.php?error=email');
}
if(empty($_POST['object']))
{
	header('Location:contact_Form.php?error=object');
}
if(empty($_POST['message']))
{
	header('Location:contact_Form.php?error=message');
}

require 'vendor/autoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$object = $_POST['object'];
$message = $_POST['message'];


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'humulesculucia88@gmail.com';                     //SMTP username
    $mail->Password   = 'maisonjaune02112017';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;  
                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('badealucia88@yahoo.com', 'Lucia');
    $mail->addAddress('humulesculucia88@gmail.com');     //Add a recipient

    $content = "

    Cher Administrateur,

    {$name} t'as contacté par ton site web.
    L'objet d'email est : {$object} et son email : est {$email}.
    Son message est : {$message}. "; 

    //Content
    $mail->isHTML(true);      
    $mail->Subject = $object;
    $mail->Body    = $content;
    $mail->AltBody = strip_tags($content);

    $mail->send();
    echo 'Votre message a été envoyé';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}