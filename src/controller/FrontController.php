<?php

namespace App\src\controller;

use App\config\Param;
use App\src\services\Mailer;

class FrontController extends Controller
{
    public function home() // cette méthode gére l'affichage de la page d'accueil
    {
        $articles = $this->postModel->getPosts();
        $user = $this->userModel->showUsers();
        //require '../view/home.php'; 
        return $this->view->render('home', [
            'articles' => $articles,
            'user' => $user
        ]);
    }

    public function article($post_id) //cette méthode affiche un seul article
    {
        $article = $this->postModel->showPost($post_id);
        $comments = $this->commentModel->findCommentsByPost($post_id);
        $user = $this->userModel->showUsers();
        //require '../view/single.php';
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments,
            'user' => $user
        ]);
    }

    public function addComment(Param $post, $post_id) //méthode qui gére l'ajout d'un article
    {
        if ($post->get('submit')) {
            // $user_id = 1; //on a créé une valeur par defaut et il faudra recuperer la vrai valeur quand le system connexion sera fait
            $errors = $this->validator->validateData($post, 'Comment');
            if (!$errors) {
                $this->commentModel->addComment($post, $post_id, $this->session->get('id'));
                $this->session->set('add_Comment', 'Votre commentaire a été soumis pour la validation !');
                header('Location: ../public/index.php?route=article&post_id=' . $post_id);
            }
            $article = $this->postModel->showPost($post_id);
            $comments = $this->commentModel->findCommentsByPost($post_id);
            return $this->view->render('single', [
                'article' => $article, //renvoie l'article
                'comments' => $comments, //retourne la liste de commentaire associés à l'article
                'post' => $post, //retourne ce qui a été saisi dans le formulaire de commentaire
                'errors' => $errors // retourne les éventuelles erreurs detectés par le validator 
            ]);
        }
    }

    public function register(Param $post) //méthode qui gére l'inscription
    {
        if ($post->get('submit')) {
            $errors = $this->validator->validateData($post, 'User');
            if (!$errors) {
                $this->userModel->register($post);
                $this->session->set('register', 'Votre inscription a été effectuée avec succés !');
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    public function login(Param $post) //méthode qui gére la connexion
    {
        if ($post->get('submit')) {
            $resultat = $this->userModel->login($post);
            if ($resultat && $resultat['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir !');
                $this->session->set('id', $resultat['resultat']['id']);
                $this->session->set('role', $resultat['resultat']['pseudo']);
                $this->session->set('userName', $post->get('userName'));
                header('Location: ../public/index.php');
            } else {
                $this->session->set('error_conection', 'Le pseudo ou le mot de passe sont incorrects !');
                return $this->view->render('login', [
                    'post' => $post
                ]);
            }
        }
        return $this->view->render('login');
    }

    public function contactForm(Param $post) //méthode qui gére l'envoie de emails dans contact Form
    {
        if ($post->get('submit')) {
            $errors = $this->validator->validateData($post, 'Contact');
            if (!$errors) {
                $this->mailer->send($post);
                $this->session->set('contact_Form', 'Votre email a été envoyé avec succés ! Vous recevrez un reponse dans maximum 2 jours !');
                header('Location: ../public/index.php?route=contactForm');
            }
            return $this->view->render('contact_Form', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('contact_Form');
    }
}
