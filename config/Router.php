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
            if (isset($route)) {
                if ($route === 'article') {
                    $this->frontController->article($this->httpRequest->getGet()->get('post_id'));
                } elseif ($route === 'addPost') {
                    $this->backController->addPost($this->httpRequest->getPost());
                } elseif ($route === 'updatePost') {
                    $this->backController->updatePost($this->httpRequest->getPost(), $this->httpRequest->getGet()->get('post_id'));
                } elseif ($route === 'deletePost') {
                    $this->backController->deletePost($this->httpRequest->getGet()->get('post_id'));
                } elseif ($route === 'addComment') {
                    $this->frontController->addComment($this->httpRequest->getPost(), $this->httpRequest->getGet()->get('post_id'));
                } elseif ($route === 'register') {
                    $this->frontController->register($this->httpRequest->getPost());
                } elseif ($route === 'login') {
                    $this->frontController->login($this->httpRequest->getPost());
                } elseif ($route === 'compte') {
                    $this->backController->compte();
                } elseif ($route === 'editPassword') {
                    $this->backController->editPassword($this->httpRequest->getPost());
                } elseif ($route === 'logout') {
                    $this->backController->logout();
                } elseif ($route === 'deleteCompte') {
                    $this->backController->deleteCompte();
                } elseif ($route === 'admin') {
                    $this->backController->admin();
                } elseif ($route === 'deleteMembre') {
                    $this->backController->deleteMembre($this->httpRequest->getGet()->get('user_id'));
                } elseif ($route === 'isApprovedComment') {
                    $this->backController->isApprovedComment($this->httpRequest->getGet()->get('comment_id'));
                } elseif ($route === 'deleteComment') {
                    $this->backController->deleteComment($this->httpRequest->getGet()->get('comment_id'));
                } elseif ($route === 'contactForm') {
                    $this->frontController->contactForm($this->httpRequest->getPost(), $this->httpRequest->getGet());
                } else {
                    $this->errorController->notFoundError();
                }
            } else {
                //si index.php n'a pas un parametre par defaut on va afficher la Page home
                $this->frontController->home();
            }
        }
        //si un autre parametre va être specifié, on va afficher une erreur
        catch (Exception $e) {
            $this->errorController->serverError();

            //echo $e->getMessage();
        }
    }
}
