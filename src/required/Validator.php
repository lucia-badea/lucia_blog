<?php

namespace App\src\required;

class Validator
{
    public function validateData($data, $key)
    {
        if($key === 'Article') {
            $postValidator = new PostValidator();
            return $postValidator->test($data);
        }
        if($key === 'Comment') {
            $commentValidator = new CommentValidator();
            return $commentValidator->test($data);
        }
        return null;
    }
}