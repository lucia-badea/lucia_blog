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
        return null;
    }
}