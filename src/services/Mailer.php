<?php

namespace App\src\services;

use \Mailjet\Resources;

  class Mailer
  {
      public function send()
      {

  define('API_USER', '126a7f0de3710b04e7ddc1a53eee4505');
  define('API_LOGIN', 'fcdbd2ec2e0e393c7428b7f01a41d2b3');
  $mj = new \Mailjet\Client(API_USER,API_LOGIN,true,['version' => 'v3.1']);


    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['object']) && !empty($_POST['message'])){
        $firstName = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $objet = htmlspecialchars($_POST['object']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $body = [
                'Messages' => [
                [
                    'From' => [
                    'Email' => "humulesculucia88@gmail.com",
                    'Name' => "Lucia"
                    ],
                    'To' => [
                    [
                        'Email' => "humulesculucia88@gmail.com",
                        'Name' => "Lucia"
                    ]
                    ],
                    'Subject' => "Demande de renseignement",
                    'TextPart' => "$email, $message",
                    'CustomID' => "AppGettingStartedTest"
                ]
                ]
            ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success();
            echo "Email envoyé avec succés !";
    
        }else{
            echo "Email non valide";
        }
    } 
    else{
        header('Location: ../public/index.php?route=contactForm');
        die();
    }
}
}
   


