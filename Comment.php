<?php

class Comment extends Db
{
    public function findCommentsByPost($post_id)
    {
        $sql = 'SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC';
        return $this->manageRequest($sql, [$post_id]);
    }
}