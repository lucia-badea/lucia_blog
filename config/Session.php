<?php

namespace App\config;

class Session //gére la session courante
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }
    // $_SESSION[$name] = $value;
    public function set($name, $value) //creation des variables de session
    {
        $_SESSION[$name] = $value;
    }
    public function get($name)
    {
        if(isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return false;
    }
    public function display($name)
    {
        if(isset($_SESSION[$name]))
        {
            $key = $this->get($name);
            $this->remove($name);
            return $key;
        }
        return false;
    }
    public function remove($name)
    {
        unset($_SESSION[$name]);//efface l'espace occupé par les variables de session
    }
    public function destroy()
    {
        session_destroy(); //ferme la session du visiteur
    }
}