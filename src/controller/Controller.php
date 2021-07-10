<?php

namespace App\src\controller;

use App\config\HttpRequest;
use App\src\model\PostModel;
use App\src\model\CommentModel;
use App\src\model\View;

abstract class Controller //on va jamais l'instancier
{
    protected $postModel;
    protected $commentModel;
    protected $view;
    protected $get;
    protected $post;
    protected $session;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->view = new View();
        $httpRequest = new HttpRequest();
        $this->get = $httpRequest->getGet();
        $this->post = $httpRequest->getPost();
        $this->session = $httpRequest->getSession();
    }
}