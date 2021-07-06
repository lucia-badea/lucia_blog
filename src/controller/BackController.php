<?php

namespace App\src\controller;

use App\src\model\PostModel;

class BackController 
{
    public function __construct()
    {
        $this->postModel = new PostModel();
    }
    public function addPost($post)
    {
        if(isset($post['submit'])) {
            $post = $this->postModel->addPost($post);
            header('Location: ../public/index.php');
        }
        require '../view/add_Post.php';
    }
    
}