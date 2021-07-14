<?php

namespace App\config;

class Param
{
    private $param;

    public function __construct($param)
    {
        $this->param = $param;
    }
    
    public function get($name)
    {
        if(isset($this->param[$name]))
        {
            return $this->param[$name];
        }
        return null;
    }

    public function set($name, $value)
    {
        $this->param[$name] = $value;
    }

    public function allParams() //récupérer toutes les données saisies
    {
        return $this->param;
    }
}