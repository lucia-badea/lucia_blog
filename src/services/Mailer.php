<?php

namespace App\src\services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    public function send()
    {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $object = $_POST['object'];
        $message = $_POST['message'];


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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
            //header('Location: ../public/index.php?route=contactForm');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
