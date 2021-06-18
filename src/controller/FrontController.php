<?php

namespace App\src\controller;

use App\src\manager\PostManager;
use App\src\manager\CommentManager;

class FrontController 
{
    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->post = new PostManager();
        $this->comment = new CommentManager();
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