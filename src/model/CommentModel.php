<?php

namespace App\src\model;

use App\src\model\Comment;

class CommentModel extends Db
{
    private function object($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setTitleComment($row['titleComment']);
        $comment->setContentComment($row['contentComment']);
        $comment->setCreated_at($row['created_at']);
        return $comment;
    }
    public function findCommentsByPost($post_id)
    {
        $sql = 'SELECT comments.id, comments.titleComment, comments.contentComment, comments.created_at, user.firstName, user.lastName FROM comments
        INNER JOIN user
        ON user.id=comments.user_id
        WHERE post_id = ?
        ORDER BY created_at DESC';
        $resultat = $this->manageRequest($sql, [$post_id]);
        $comments = [];
        foreach ($resultat as $row) {
            $comment_id = $row['id'];
            $comments[$comment_id] = $this->object($row);
        }
        $resultat->closeCursor();
        return $comments;

        //$sql = 'SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC';
        //return $this->manageRequest($sql, [$post_id]);
    }

    public function addComment($post, $post_id)// l'ajout d'un commentaire
    {
        $sql = 'INSERT INTO comments (titleComment, contentComment, created_at, post_id) VALUES (?, ?, NOW(), ?)';
        $this->manageRequest($sql, [$titleComment, $contentComment, $post_id]);
    }
    //$sql = 'INSERT INTO posts (titlePost, headerPost, contentPost, updated_at) VALUES (?,?,?, NOW())';
    //$this->manageRequest($sql, [$titlePost, $headerPost, $contentPost]);
}