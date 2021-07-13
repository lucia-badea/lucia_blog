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
    private $httpRequest;

    public function __construct()
    {
        $this->backController = new BackController();
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->httpRequest = new HttpRequest();
    }
    public function run()
    {
        try {
            //si index.php a un parametre post, on va afficher la page single
            $route = $this->httpRequest->getGet()->get('route');
            if(isset($route)) {
                if($route === 'post'){
                    $this->frontController->post($this->httpRequest->getGet()->get('post_id'));
            }
            elseif($route === 'addPost'){
                $this->backController->addPost($this->httpRequest->getPost());
            }
            elseif($route === 'updatePost'){
                $this->backController->updatePost($this->httpRequest->getPost(), $this->httpRequest->getGet()->get('post_id'));
            }
            elseif($_GET['route'] === 'deletePost') {
                $this->backController->deletePost($_GET['post_id']);
            }
            elseif($_GET['route'] === 'addComment'){
                $this->frontController->addComment($_POST, $_GET['post_id']);
        }
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

         echo $e->getMessage();
           
        }
        
    }
}