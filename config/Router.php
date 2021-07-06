<?php

namespace App\config;

use App\src\controller\BackController;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use Exception;

class Router 
{
    private $backController;
    private $frontController;
    private $errorController;

    public function __construct()
    {
        $this->backController = new BackController();
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
    }
    public function run()
    {
        try {
            //si index.php a un parametre post, on va afficher la page single
            if(isset($_GET['route'])) {
                if($_GET['route'] === 'post'){
                    $this->frontController->post($_GET['post_id']);
            }
            elseif($_GET['route'] === 'addPost'){
                $this->backController->addPost($_POST);
            }

           /* elseif($_GET['route'] === 'addComment'){
                $frontController = new FrontController();
                $frontController->addComment($_GET['post_id']);
        }*/
            else {
                $this->errorController->notFoundError();
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
           $this->errorController->serverError();
        }
    }
}