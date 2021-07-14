<?php

namespace App\src\controller;

use App\config\Param;

class FrontController extends Controller
{
    public function home() // cette méthode gére l'affichage de la page d'accueil
    {
        $posts = $this->postModel->getPosts();
        //require '../view/home.php'; 
        return $this->view->render('home', [
            'posts' => $posts
        ]);
    }

    public function post($post_id)
    {
        $post = $this->postModel->showPost($post_id);
        $comments = $this->commentModel->findCommentsByPost($_GET['post_id']);      
        //require '../view/single.php';
        return $this->view->render('single', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
    
    public function addComment(Param $post, $post_id)
    {
        if($post->get('submit')) {
            $errors = $this->validator->validateData($post, 'Comment');
            if(!$errors) {
            $user_id = 1; //on a créé une valeur par defaut et il faudra recuperer la vrai valeur quand le system connexion sera fait
            $this->commentModel->addComment($post, $post_id, $user_id);
            $this->session->set('add_Comment', 'Votre commentaire a été ajouté avec succées !');
            header('Location: ../public/index.php?route=post&post_id='.$post_id);
        }
        $article = $this->postModel->showPost($post_id);
        $comments = $this->commentModel->findCommentsByPost($post_id);
        return $this->view->render('single', [
            'article' => $article, //renvoie l'article
            'comments' => $comments, //retourne la liste de commentaire associés à l'article
            'post' => $post, //retourne ce qui a été saisi dans le formulaire de commentaire
            'errors' => $errors// retourne les éventuelles erreurs detectés par le validator 
        ]);
     
    }
    }
}