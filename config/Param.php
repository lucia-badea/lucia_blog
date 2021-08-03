<?php

namespace App\config;

class Param
{
    private $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function get($key)
    {
        if (isset($this->param[$key])) {
            return $this->param[$key];
        }
        return null;
    }

    public function set($key, $value)
    {
        $this->param[$key] = $value;
    }

    public function allParams() //récupérer toutes les données saisies
    {
        return $this->param;
    }
}
