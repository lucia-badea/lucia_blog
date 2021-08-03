<?php

namespace App\src\required;

class Validator
{
    public function validateData($data, $key)
    {
        if ($key === 'Article') {
            $postValidator = new PostValidator();
            return $postValidator->test($data);
        } elseif ($key === 'Comment') {
            $commentValidator = new CommentValidator();
            return $commentValidator->test($data);
        } elseif ($key === 'User') {
            $userValidator = new UserValidator();
            return $userValidator->test($data);
        } elseif ($key === 'Contact') {
            $contactValidator = new ContactValidator();
            return $contactValidator->test($data);
        }
        return null;
    }
}
