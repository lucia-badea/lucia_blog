<?php

namespace App\src\required;

use App\config\Param;

class UserValidator extends Validator
{
    private $errors = [];
    private $required;

    public function __construct()
    {
        $this->required = new Required();
    }

    public function test(Param $post) //récupér toutes les données de la classe Param via la méthode allParams()
    {
        foreach ($post->allParams() as $key => $value) {
            $this->testField($key, $value);
        }
        return $this->errors;
    }
    private function testField($key, $value) //on va vérifier chaque champ
    {
        if($key === 'userName') {
            $error = $this->testUserName($key, $value);
            $this->addError($key, $error);
        }
        elseif($key === 'firstName') {
            $error = $this->testFirstName($key, $value);
            $this->addError($key, $error);
        }
        elseif ($key === 'lastName') {
            $error = $this->testLastName($key, $value);
            $this->addError($key, $error);
        }
        elseif ($key === 'email') {
            $error = $this->testEmail($key, $value);
            $this->addError($key, $error);
        }
        elseif ($key === 'password') {
            $error = $this->testPassword($key, $value);
            $this->addError($key, $error);
        }
    }
    //on va ajouter une erreur si un des champ n'est pas valide
    private function addError($key, $error) {
        if($error) {
            $this->errors += [
                $key => $error
            ];
        }
    }
    // on a créé 3 contraintes et les prochaines méthodes vont faire appel à eux
    private function testUserName($key, $value)
    {
        if($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('pseudo', $value);
        }
        if($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('pseudo', $value, 2);
        }
        if($this->required->testMaxLength($key, $value, 100)) {
            return $this->required->testMaxLength('pseudo', $value, 100);
        }
        return null;
    }
    private function testFirstName($key, $value)
    {
        if($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('nom', $value);
        }
        if($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('nom', $value, 2);
        }
        if($this->required->testMaxLength($key, $value, 100)) {
            return $this->required->testMaxLength('nom', $value, 100);
        }
        return null;
    }
    private function testLastName($key, $value)
    {
        if($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('prenom', $value);
        }
        if($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('prenom', $value, 2);
        }
        if($this->required->testMaxLength($key, $value, 100)) {
            return $this->required->testMaxLength('prenom', $value, 100);
        }
        return null;
    }
    private function testPassword($key, $value)
    {
        if($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('password', $value);
        }
        if($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('password', $value, 2);
        }
        if($this->required->testMaxLength($key, $value, 100)) {
            return $this->required->testMaxLength('password', $value, 100);
        }
        return null;
    }
    private function testEmail($key, $value)
    {
        if($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('email', $value);
        }
        if($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('email', $value, 2);
        }
        if($this->required->testMaxLength($key, $value, 100)) {
            return $this->required->testMaxLength('email', $value, 100);
        }
        if($this->required->testEmail($key, $value)) {
            return $this->required->testEmail('email', $value);
        }
        return null;
    }
}