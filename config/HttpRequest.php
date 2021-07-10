<?php

namespace App\config;

class HttpRequest
{
    private $get;
    private $post;
    private $session;

    public function __construct()
    {
        $this->get = new Param($_GET);
        $this->post = new Param($_POST);
        $this->session = new Session($_SESSION);
    }
    /**
     * @return Param
     */
    public function getGet()
    {
        return $this->get;
    }
    /**
     * @return Param
     */
    public function getPost()
    {
        return $this->post;
    }
    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }
}