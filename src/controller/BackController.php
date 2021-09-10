<?php

namespace App\src\controller;

use App\config\Param;

class BackController extends Controller
{
    public function addPost(Param $post) //méthode qui gére l'ajout d'un article
    { //si le formulaire a été envoyé on fait appel à la méthode addPost
        if ($this->testAdmin()) {
            if ($post->get('submit')) {
                $errors = $this->validator->validateData($post, 'Article');
                if (!$errors) {
                    // $user_id = 1; //on a créé une valeur par defaut et il faudra recuperer la vrai valeur quand le system connexion sera fait
                    $this->postModel->addPost($post, $this->session->get('id')/*$user_id*/);
                    $this->session->set('add_Post', 'Votre article a été ajouté avec succés !');
                    header('Location: ../public/index.php?route=admin');
                }
                //require '../view/add_Post.php';
                //si le formulaire n'a pas été envoyé on fait rien
                return $this->view->render('add_Post', [
                    'post' => $post, //le contenu saisi par l'utilisateur
                    'errors' => $errors //les éventuelles erreurs detectés par le validator
                ]);
            }
            return $this->view->render('add_Post', [
                'post' => $post
            ]);
        }
    }

    public function updatePost(Param $post, $post_id) //méthode qui gére la mise à jour d'un article
    {
        if ($this->testAdmin()) {
            $article = $this->postModel->showPost($post_id);

            if ($post->get('submit')) {
                $errors = $this->validator->validateData($post, 'Article');
                if (!$errors) {
                    $this->postModel->updatePost($post, $post_id, $this->session->get('id'));
                    $this->session->set('update_Post', 'Votre article a été modifié avec succés !');
                    header('Location: ../public/index.php?route=admin');
                }
                return $this->view->render('update_Post', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $post->set('id', $article->getId());
            $post->set('titlePost', $article->getTitlePost());
            $post->set('headerPost', $article->getHeaderPost());
            $post->set('contentPost', $article->getContentPost());

            return $this->view->render('update_Post', [
                'post' => $post
            ]);
        }
    }
    public function deletePost($post_id) //méthode qui gére la suppresion d'un article
    {
        if ($this->testAdmin()) {
            $this->postModel->deletePost($post_id);
            $this->session->set('delete_Post', 'Votre article a été supprimé avec succés !');
            header('Location: ../public/index.php?route=admin');
        }
    }

    public function compte() //méthode qui gére l'affichage de la page Profil
    {
        if ($this->testIfLoggedIn()) {
            return $this->view->render('mon_Compte');
        }
    }

    public function editPassword(Param $post) //méthode qui gére la modification du mot de passe
    {
        if ($this->testIfLoggedIn()) {
            if ($post->get('submit')) {
                $this->userModel->editPassword($post, $this->session->get('userName'));
                $this->session->set('edit_Password', 'Le mot de passe a été modifié !');
                header('Location: ../public/index.php?route=compte');
            }
            return $this->view->render('edit_Password');
        }
    }

    public function deleteMembre($user_id) //méthode qui gére la suppresion d'un utilisateur
    {
        if ($this->testAdmin()) {
            $this->userModel->deleteMembre($user_id);
            $this->session->set('delete_Membre', 'L\'utilisateur a été supprimé avec succés !');
            header('Location: ../public/index.php?route=admin');
        }
    }

    public function logout() //méthode qui gére la deconnexion
    {
        if ($this->testIfLoggedIn()) {
            $this->session->destroy();
            $this->session->build();
            $this->session->set('logout', 'J\'espere vous revoir bientôt !');
            header('Location: ../public/index.php');
        }
    }

    public function deleteCompte() //méthode qui gére la suppresion d'un compte
    {
        if ($this->testIfLoggedIn()) {
            $this->userModel->deleteCompte($this->session->get('userName'));
            $this->session->destroy();
            $this->session->build();
            $this->session->set('delete_Compte', 'Votre compte a été supprimé avec succées !');
            header('Location: ../public/index.php');
        }
    }

    public function admin() //méthode qui gére le compte Administrateur
    {
        if ($this->testAdmin()) {
            $articles = $this->postModel->getPosts();
            $user = $this->userModel->showUsers();
            $comments = $this->commentModel->getListNotApprovedComments();
            //$comments = $this->commentModel->getListApprovedComments();
            return $this->view->render('admin', [
                'articles' => $articles,
                'user' => $user,
                'comments' => $comments
            ]);
        }
    }

    private function testIfLoggedIn() // tester si l'utilisateur est connecté
    {
        if (!$this->session->get('userName')) {
            $this->session->set('must_be_login', 'Vous devez être connecté pour accéder à cette page !');
            header('Location: ../public/index.php?route=login');
            exit;
        } else {
            return true;
        }
    }

    private function testAdmin()
    { //si l'utilisateur connecté a le role d'Admin
        $this->testIfLoggedIn();
        if (!($this->session->get('role') === 'admin')) {
            $this->session->set('is_not_admin', 'Vous n\'etez pas un Administrateur! Vous ne pouvez pas accéder à cette page !');
            header('Location: ../public/index.php?route=compte');
            exit;
        } else {
            return true;
        }
    }
    public function isApprovedComment($comment_id) //tester si c'est un commentaire approuvé par admin
    {
        if ($this->testAdmin()) {
            $this->commentModel->isApprovedComment($comment_id);
            $this->session->set('published_Comment', 'Le commentaire a été validé avec succés !');
            header('Location: ../public/index.php?route=admin');
        }
    }
    public function deleteComment($comment_id) //méthode qui gére la suppresion d'un commentaire
    {
        if ($this->testAdmin()) {
            $this->commentModel->deleteComment($comment_id);
            $this->session->set('delete_Comment', 'Le commentaire a été supprimé avec succés !');
            header('Location: ../public/index.php?route=admin');
        }
    }
}
