<?php

namespace App\src\controller;

class BackController extends Controller
{
    public function addPost($post)
    { //si le formulaire a été envoyé on fait appel à la méthode addPost
        if(isset($post['submit'])) {
            $this->postModel->addPost($post);
            header('Location: ../public/index.php');
        }
        //require '../view/add_Post.php';
        //si le formulaire n'a pas été envoyé on fait rien
        return $this->view->render('add_Post', [
            'post' => $post
        ]);
    }
    
}