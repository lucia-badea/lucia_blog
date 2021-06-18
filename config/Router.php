<?php

namespace App\config;
use Exception;
use App\src\controller\FrontController;

class Router 
{
    private $frontController;

    public function __construct()
    {
        $this->frontController = new FrontController();
    }
    public function run()
    {
        try {
            //si index.php a un parametre post, on va afficher la page single
            if(isset($_GET['route'])) {
                if($_GET['route'] === 'post'){
                    $frontController = new FrontController();
                    $frontController->post($_GET['id']);
            }
            else {
                echo 'Page inconnue';
            }
        }
        else {
            //si index.php n'a pas un parametre par defaut on va afficher la Page home
            $this->frontController->home();
            }
        }
        //si un autre parametre va être specifié, on va afficher une erreur
        catch(Exception $e)
        {
            echo 'Erreur';
        }
    }
}