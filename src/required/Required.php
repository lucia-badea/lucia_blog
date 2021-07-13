<?php

namespace App\src\required;

class Required
{
    public function notEmpty($key, $value)// vérifie que le champ n'est pas vide
    {
        if(empty($value)) {
            return '<p>Le champ '.$key.' ne peut être vide</p>';
        }
        return null;
    }
    public function testMinLength($key, $value, $min)
    {
        if(strlen($value) < $min) {
            return '<p>Le champ '.$key.' doit contenir plus de '.$min.' caractères</p>';
        }
        return null;
    }
    public function testMaxLength($key, $value, $max)
    {
        if(strlen($value) > $max) {
            return '<p>Le champ '.$key.' doit contenir moins de '.$max.' caractères</p>';
        }
        return null;
    }
}