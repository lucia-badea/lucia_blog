<?php

namespace App\src\controller;

use App\src\model\PostModel;
use App\src\model\CommentModel;

class FrontController 
{
    private $postModel;
    private $commentModel;

    public function __construct()
    {
        $this->post = new PostModel();
        $this->comment = new CommentModel();
    }
    public function home() // cette méthode gére l'affichage de la page d'accueil
    {
        $posts = $this->post->getPosts();
        require '../view/home.php';
    }

    public function post($post_id)
    {
        $posts = $this->post->showPost($post_id);
        $comments = $this->comment->findCommentsByPost($_GET['id']);
        require '../view/single.php';
    }
}