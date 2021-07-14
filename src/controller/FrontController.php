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
            $user_id = 1; //on a créé une valeur par defaut et il faudra recuperer la vrai valeur quand le system connexion sera fait
            $this->commentModel->addComment($post, $post_id, $user_id);
            $this->session->set('add_Comment', 'Votre commentaire a été ajouté avec succées !');
            header('Location: ../public/index.php?route=post&post_id='.$post_id);
        }
    }

   /* public function insert()
    {
         /**
        * On vérifie que les données ont bien été envoyées en POST
        * D'abord, on récupère les informations à partir du POST
        * Ensuite, on vérifie qu'elles ne sont pas nulles
        */

        // On commence par le titre
       /* $titleComment = null;
        if (!empty($_POST['titleComment'])) {
            $titleComment = htmlspecialchars($_POST['titleComment']);
        }
        //Ensuite le contenu
        $contentComment = null;
        if (!empty($_POST['contentComment'])) {
            // On fait attention à ce que l'utilisateur' n'essaye pas des balises cheloues dans son commentaire
            $contentComment = htmlspecialchars($_POST['contentComment']);
        }
        // Enfin l'id de l'article
        $post_id = null;
        if (!empty($_POST['post_id']) && ctype_digit($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
        }
        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas de title OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$titleComment || !$post_id || !$contentComment) {
            die("Votre formulaire a été mal rempli !");
        }

        $comment = $this->comment->addComment($_POST['post_id']);

        if (!$post_id) {
            die("L'article $post_id n'existe pas !");
        }
         // Insertion du commentaire
         $this->post->insert($titleComment, $contentComment, $post_id);

         // Redirection vers l'article en question :
         redirect("single.php?id=" . $post_id);

    }*/
}