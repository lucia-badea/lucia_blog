<?php

class Post extends Db
{
    public function getPosts()
    {
       
        $sql = 'SELECT * FROM posts ORDER BY id DESC';
        return $this->manageRequest($sql);
    }

    public function showPost($post_id)
    {
        $sql = 'SELECT id, titlePost, headerPost, contentPost,
        updated_at, user_id FROM posts WHERE id=?';
        return $this->manageRequest($sql, [$post_id]);

    }
}