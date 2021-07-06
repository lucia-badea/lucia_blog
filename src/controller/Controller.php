<?php

namespace App\src\controller;

use App\src\model\PostModel;
use App\src\model\CommentModel;
use App\src\model\View;

abstract class Controller //on va jamais l'instancier
{
    protected $postModel;
    protected $commentModel;
    protected $view;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->view = new View();
    }
}