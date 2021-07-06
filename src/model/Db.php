<?php

namespace App\src\model;

use PDO;
use Exception;

abstract class Db // "abstract" - cette classe ne pourra plus être instanciée
{
    // Mettre en constante les informations de connexion à la BDD
    private const DBHOST = 'mysql:host=localhost;dbname=blog_lucia;charset=utf8';
    private const DBUSER = 'root';
    private const DBPASS = '';

    private $connection;

    private function tryConnection()
    {
        // Condition qui verifie si la connexion est nulle et appele la methode getConnection
        if($this->connection === null){
            return $this->getConnection();
        }
        // S'il y a une connexion, on la renvoie
        return $this->connection;
    }

    private function getConnection() // "private"- la methode sera appelé que depuis la classe
    {
        
        //On essaye se connecter à la BDD
        try{
            $this->connection = new PDO(self::DBHOST, self::DBUSER, self::DBPASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        //Afficher une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connexion :'.$errorConnection->getMessage());
        }
    }

    //Une methode qui va gerer les requetês et va faire appel à getConnection
    protected function manageRequest($sql, $params=null)
    {
        if($params)
        {
            $resultat=$this->tryConnection()->prepare($sql);
            //la methode setFetchMode de PDO avec 1er param PDO::FETCH_CLASS et 2eme param le nom de la classe
           // $resultat->setFetchMode(PDO::FETCH_CLASS, static::class); //"static::class c'est la fonction de PHP get_called_class
            $resultat->execute($params);
            return $resultat;
        }
        $resultat=$this->tryConnection()->query($sql);
        //$resultat->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $resultat;
    }
}