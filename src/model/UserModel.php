<?php

namespace App\src\model;

use App\config\Param;
use App\src\model\User;

class UserModel extends Db
{
    public function register(Param $post)
    {
        $sql = 'INSERT INTO user (userName, firstName, lastName, email, password, enabled) VALUES (?, ?, ?, ?, ?, ?)';
        $this->manageRequest($sql, [$post->get('userName'), $post->get('firstName'), $post->get('lastName'), $post->get('email'), password_hash($post->get('password'), PASSWORD_BCRYPT), 1]);
    }
}