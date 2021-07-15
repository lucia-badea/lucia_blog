<?php

namespace App\src\model;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

     /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

 
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }
    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

      /**
     * @return string
     */
    public function getfirstName()
    {
        return $this->firstName;
    }
    /**
     * @param string $firstName
     */
    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;
    }

      /**
     * @return string
     */
    public function getlastName()
    {
        return $this->lastName;
    }
    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

      /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}