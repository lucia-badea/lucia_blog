<?php

namespace App\src\model;

use App\config\Param;
use App\src\model\Post;


class PostModel extends Db
{
    //méthode object permet convertir chaque champ en proprieté de l'objet Post
    private function object($row)
    {
        $article = new Post();
        $article->setId($row['id']);
        $article->setTitlePost($row['titlePost']);
        $article->setHeaderPost($row['headerPost']);
        $article->setContentPost($row['contentPost']);
        $article->setUpdated_at($row['updated_at']);
        $article->setEditor($row['firstName'] . " " . $row['lastName']);
        return $article;
    }
    public function getPosts() //affiche tous les articles
    {
        $sql = 'SELECT posts.id, posts.titlePost, posts.headerPost, posts.contentPost, posts.updated_at, user.lastName, user.firstName, user.userName FROM posts INNER JOIN user ON posts.user_id = user.id WHERE posts.actif = 1 ORDER BY id DESC';
        $resultat = $this->manageRequest($sql);
        $articles = [];
        foreach ($resultat as $row) {
            $post_id = $row['id'];
            $articles[$post_id] = $this->object($row);
        }
        $resultat->closeCursor();
        return $articles;
    }


    public function showPost($post_id) //affiche un seul article
    {
        $sql = 'SELECT posts.id, posts.titlePost, posts.headerPost, posts.contentPost,
        posts.updated_at, user.lastName, user.firstName FROM posts
        INNER JOIN user
        ON posts.user_id = user.id
        WHERE posts.id = ?';
        $resultat = $this->manageRequest($sql, [$post_id]);
        $article = $resultat->fetch();
        $resultat->closeCursor();
        return $this->object($article);
    }

    public function addPost(Param $post, $user_id) //ajouter un article
    {
        // Récupérer les variables $titlePost, $headerPost et $contentPost
        //extract($post);
        //faire une requete INSERT
        $sql = 'INSERT INTO posts (titlePost, headerPost, contentPost, updated_at, actif, user_id) VALUES (?,?,?, NOW(),?,?)';
        $this->manageRequest($sql, [$post->get('titlePost'), $post->get('headerPost'), $post->get('contentPost'), 1, $user_id]);
    }

    //Modifier un article
    public function updatePost(Param $post, $post_id, $user_id)
    {
        $sql = 'UPDATE posts SET titlePost=:titlePost, headerPost=:headerPost, contentPost=:contentPost, user_id=:user_id, updated_at = NOW()
        WHERE id=:post_id';
        $this->manageRequest($sql, [
            'titlePost' => $post->get('titlePost'),
            'headerPost' => $post->get('headerPost'),
            'contentPost' => $post->get('contentPost'),
            'post_id' => $post_id,
            'user_id' => $user_id
        ]);
    }

    public function deletePost($post_id)
    {
        $sql = 'DELETE FROM comments WHERE post_id = ?';
        $this->manageRequest($sql, [$post_id]);
        $sql = 'DELETE FROM posts WHERE id = ?';
        $this->manageRequest($sql, [$post_id]);
    }
}
