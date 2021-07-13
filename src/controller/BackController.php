<?php

namespace App\src\controller;

use App\config\Param;

class BackController extends Controller
{
    public function addPost(Param $post)
    { //si le formulaire a été envoyé on fait appel à la méthode addPost
        if($post->get('submit')) {
            $errors = $this->validator->validateData($post, 'Article');
            if(!$errors){
        $user_id = 1; //on a créé une valeur par defaut et il faudra recuperer la vrai valeur quand le system connexion sera fait
        $this->postModel->addPost($post, $user_id);
        $this->session->set('add_Post', 'Votre article a été ajouté avec succés !');
            header('Location: ../public/index.php');
        }
        //require '../view/add_Post.php';
        //si le formulaire n'a pas été envoyé on fait rien
        return $this->view->render('add_Post', [
            'post' => $post, //le contenu saisi par l'utilisateur
            'errors' =>$errors //les éventuelles erreurs detectés par le validator
        ]);
        }
    return $this->view->render('add_Post', [
        'post' => $post
            ]);
    }

    public function updatePost(Param $post, $post_id)
    {
        $article = $this->postModel->showPost($post_id);

        if($post->get('submit')) {
            $errors = $this->validator->validateData($post, 'Article');
            if(!$errors){
            $this->postModel->updatePost($post, $post_id);
            $this->session->set('update_Post', 'Votre article a été modifié avec succés');
            header('Location: ../public/index.php');
        }
        return $this->view->render('update_Post', [
            'article' => $article,
            'errors' => $errors
        ]);
        }
        $post->set('id', $article->getid());
        $post->set('title', $article->getTitlePost());
        $post->set('content', $article->getHeaderPost());
        $post->set('author', $article->getContentPost());

    return $this->view->render('update_Post', [
        'article' => $article
    ]);
    } 

    
    public function deletePost($post_id)
    {
        $this->postModel->deletePost($post_id);
        header('Location: ../public/index.php');
    }
    
}