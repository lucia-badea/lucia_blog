<?php

namespace App\src\controller;

use App\config\Param;

class BackController extends Controller
{
    public function addPost(Param $post)
    { //si le formulaire a été envoyé on fait appel à la méthode addPost
        if($post->get('submit')) {
        $user_id = 1; //on a créé une valeur par defaut et il faudra recuperer la vrai valeur quand le system connexion sera fait
        $this->postModel->addPost($post, $user_id);
        $this->session->set('add_Post', 'Votre article a été ajouté avec succés !');
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
        var_dump($post);
        $post = $this->postModel->showPost($post_id);
        if(isset($_POST['submit'])) {
            $user_id = 1;
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