<?php

namespace App\src\model;

use App\config\Param;
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
        $comment->setIsApprovedComment($row['published']);
        return $comment;
    }
    public function findCommentsByPost($post_id)
    {
        $sql = 'SELECT comments.id, comments.titleComment, comments.contentComment, comments.created_at, comments.published, user.firstName, user.lastName, user.userName FROM comments
        INNER JOIN user
        ON user.id=comments.user_id
        WHERE post_id = ? AND published = 1
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

    public function addComment(Param $post, $post_id, $user_id) // l'ajout d'un commentaire
    {
        //extract($post);
        //var_dump($post);
        $sql = 'INSERT INTO comments (titleComment, contentComment, user_id, post_id, created_at, published) VALUES (?,?,?,?, NOW(),?)';
        $this->manageRequest($sql, [$post->get('titleComment'), $post->get('contentComment'), $user_id, $post_id, 0]);
    }
    //$sql = 'INSERT INTO posts (titlePost, headerPost, contentPost, updated_at) VALUES (?,?,?, NOW())';
    //$this->manageRequest($sql, [$titlePost, $headerPost, $contentPost]);

    public function isApprovedComment($comment_id)
    {
        $sql = "UPDATE comments SET published = ? WHERE id = ?";
        $this->manageRequest($sql, [1, $comment_id]);
    }

    public function deleteComment($comment_id)
    {
        $sql = "DELETE FROM comments WHERE id = ?";
        $this->manageRequest($sql, [$comment_id]);
    }

    public function getListNotApprovedComments()
    {
        $sql = 'SELECT comments.id, comments.titleComment, comments.contentComment, comments.created_at, comments.published, user.firstName, user.lastName, user.userName FROM comments
        INNER JOIN user
        ON user.id=comments.user_id
        WHERE published = 0
        ORDER BY created_at DESC';
        $resultat = $this->manageRequest($sql, [0]);
        $comments = [];
        foreach ($resultat as $row) {
            $comment_id = $row['id'];
            $comments[$comment_id] = $this->object($row);
        }
        $resultat->closeCursor();
        return $comments;
    }

    public function getListApprovedComments()
    {
        $sql = 'SELECT comments.id, comments.titleComment, comments.contentComment, comments.created_at, comments.published, user.firstName, user.lastName FROM comments
        INNER JOIN user
        ON user.id=comments.user_id
        WHERE published = 1
        ORDER BY created_at DESC';
        $resultat = $this->manageRequest($sql, [1]);
        $comments = [];
        foreach ($resultat as $row) {
            $comment_id = $row['id'];
            $comments[$comment_id] = $this->object($row);
        }
        $resultat->closeCursor();
        return $comments;
    }
}
