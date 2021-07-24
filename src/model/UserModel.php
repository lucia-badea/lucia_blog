<?php

namespace App\src\model;

use App\config\Param;
use App\src\model\User;
use App\src\model\Post;

class UserModel extends Db
{

    public function register(Param $post)
    {
        $this->validateUser($post);
        $sql = 'INSERT INTO user (userName, firstName, lastName, email, password, enabled, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $this->manageRequest($sql, [$post->get('userName'), $post->get('firstName'), $post->get('lastName'), $post->get('email'), password_hash($post->get('password'), PASSWORD_BCRYPT), 1, 2]);
    }

    public function login(Param $post)
    {
        $sql = 'SELECT user.id, user.password, user.password, role.description, role.pseudo FROM user INNER JOIN role  ON role.id = user.role_id WHERE userName = ?';
        $data = $this->manageRequest($sql, [$post->get('userName')]);
        $resultat = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $resultat['password']);
        return [
            'resultat' => $resultat,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    public function validateUser(Param $post)
    {
        $sql = 'SELECT COUNT(userName) FROM user WHERE userName = ?';
        $result = $this->manageRequest($sql, [$post->get('userName')]);
        $isOne = $result->fetchColumn();
        if($isOne) {
            return '<p>Ce Pseudo a été déjà utilisé ! Choissisez un autre !</p>';
        }
    }

    public function editPassword(Param $post, $userName)
    {
        $sql = 'UPDATE user SET password = ? WHERE userName = ?';
        $this->manageRequest($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $userName]);
    }

    public function deleteCompte($userName)
    {
        $sql = 'DELETE FROM user WHERE userName = ?';
        $this->manageRequest($sql, [$userName]);
    } 
}