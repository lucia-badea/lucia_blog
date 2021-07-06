<?php

namespace App\src\model;

use App\src\model\Post;

class PostModel extends Db
{
    //méthode object permet convertir chaque champ en proprieté de l'objet Post
    private function object($row)
    {
        $post = new Post();
        $post->setId($row['id']);
        $post->setTitlePost($row['titlePost']);
        $post->setHeaderPost($row['headerPost']);
        $post->setContentPost($row['contentPost']);
        $post->setUpdated_at($row['updated_at']);
        return $post;
    }
    public function getPosts()//affiche tous les articles
    {
        $sql = 'SELECT * FROM posts WHERE posts.actif = 1 ORDER BY id DESC';
        $resultat = $this->manageRequest($sql);
        $posts = [];
        foreach ($resultat as $row){
            $post_id = $row['id'];
            $posts[$post_id] = $this->object($row);
        }      
        $resultat->closeCursor();
        return $posts;
    }

    public function showPost($post_id)//affiche un seul article
    {
        $sql = 'SELECT posts.id, posts.titlePost, posts.headerPost, posts.contentPost,
        posts.updated_at, user.lastName, user.firstName FROM posts
        INNER JOIN user
        ON posts.user_id = user.id
        WHERE posts.id = ?';
        $resultat = $this->manageRequest($sql, [$post_id]);
        $post = $resultat->fetch();
        $resultat->closeCursor();
        return $this->object($post);

    }

   /* public function addPost($post)//ajouter un article
    {
        // Récupérer les variables $titlePost, $headerPost et $contentPost
        extract($post);
        $sql = 'INSERT INTO posts (posts.titlePost, posts.headerPost, posts.contentPost
        posts.updated_at) VALUES (?,?,?, NOW())';
        $this->manageRequest($sql, [$titlePost, $headerPost, $contentPost]);
    }*/
}