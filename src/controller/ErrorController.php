<?php

namespace App\src\controller;

class ErrorController //gere les erreurs trouvés dans Router.php
{
    public function notFoundError()
    {
        require '../view/error404.php';
    }

    public function serverError()
    {
        require '../view/error500.php';
    }
}