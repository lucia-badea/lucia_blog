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

    public function updatePost($post, $post_id)
    {
        $post = $this->postModel->showPost($post_id);
        if(isset($post->submit)) {
            $this->postModel->updatePost($post, $post_id);
            header('Location: ../public/index.php');
        }

        return $this->view->render('update_Post', [
            'post' => $post
        ]);
    }

    
    public function deletePost($post_id)
    {
        $this->postModel->deletePost($post_id);
        header('Location: ../public/index.php');
    }
    
}