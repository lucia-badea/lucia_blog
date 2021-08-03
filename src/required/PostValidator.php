<?php

namespace App\src\required;

use App\config\Param;

class PostValidator extends Validator
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
        if ($key === 'titlePost') {
            $error = $this->testTitlePost($key, $value);
            $this->addError($key, $error);
        } elseif ($key === 'headerPost') {
            $error = $this->testHeaderPost($key, $value);
            $this->addError($key, $error);
        } elseif ($key === 'contentPost') {
            $error = $this->testContentPost($key, $value);
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
    // on a créé 3 contraintes et les prochaines méthodes vont faire appel à eux
    private function testTitlePost($key, $value)
    {
        if ($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('titre', $value);
        }
        if ($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('titre', $value, 2);
        }
        if ($this->required->testMaxLength($key, $value, 255)) {
            return $this->required->testMaxLength('titre', $value, 255);
        }
        return null;
    }
    private function testHeaderPost($key, $value)
    {
        if ($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('êntete', $value);
        }
        if ($this->required->testMinLength($key, $value, 2)) {
            return $this->required->testMinLength('êntete', $value, 2);
        }
        if ($this->required->testMaxLength($key, $value, 100)) {
            return $this->required->testMaxLength('êntete', $value, 100);
        }
        return null;
    }
    private function testContentPost($key, $value)
    {
        if ($this->required->notEmpty($key, $value)) {
            return $this->required->notEmpty('contenu', $value);
        }
        if ($this->required->testminLength($key, $value, 2)) {
            return $this->required->testMinLength('contenu', $value, 2);
        }
        return null;
    }
}
