<?php

namespace App\config;

class Session //gére la session courante
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }
    // $_SESSION[$key] = $value;
    public function set($key, $value) //creation des variables de session
    {
        $_SESSION[$key] = $value;
    }
    public function get($key)
    {
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }
    public function display($key)
    {
        if(isset($_SESSION[$key]))
        {
            $name = $this->get($key);
            $this->remove($key);
            return $name;
        }
        return false;
    }
    public function remove($key)
    {
        unset($_SESSION[$key]);//efface l'espace occupé par les variables de session
    }
    public function destroy()
    {
        session_destroy(); //ferme la session du visiteur
    }
}