<?php

namespace App\src\required;

use App\config\Param;

class ContactValidator extends Validator
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
        if ($key === 'name') {
            $error = $this->testName($key, $value);
            $this->addError($key, $error);
        } elseif ($key === 'email') {
            $error = $this->testEmail($key, $value);
            $this->addError($key, $error);
        } elseif ($key === 'object') {
            $error = $this->testObject($key, $value);
            $this->addError($key, $error);
        } elseif ($key === 'message') {
            $error = $this->testMessage($key, $value);
            $this->addError($key, $error);
        }
    }
    //on va ajouter une erreur si un des champ n'est pas valide
    private function addError($key, $error)
    {
        if ($error) {
            $this->errors += [
                $key => $error
            ];
        }
    }
    // on a créé 4 contraintes et les prochaines méthodes vont faire appel à eux
    private function testName($key, $value)
    {
        if ($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('nom', $value);
        }
        if ($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('nom', $value, 2);
        }
        if ($this->required->testMaxLength($key, $value, 255)) {
            return $this->required->testMaxLength('nom', $value, 255);
        }
        //return null;
    }

    private function testEmail($key, $value)
    {
        if ($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('email', $value);
        }
        if ($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('email', $value, 2);
        }
        if ($this->required->testMaxLength($key, $value, 255)) {
            return $this->required->testMaxLength('email', $value, 255);
        }
        if ($this->required->testEmail($key, $value)) {
            return $this->required->testEmail('email', $value);
        }
        //return null;
    }
    private function testObject($key, $value)
    {
        if ($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('object', $value);
        }
        if ($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('object', $value, 2);
        }
        if ($this->required->testMaxLength($key, $value, 255)) {
            return $this->required->testMaxLength('object', $value, 255);
        }
        //return null;
    }
    private function testMessage($key, $value)
    {
        if ($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('message', $value);
        }
        if ($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('message', $value, 2);
        }
        //return null;
    }
}
