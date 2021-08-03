<?php

namespace App\src\controller;

class ErrorController extends Controller //gere les erreurs trouvés dans Router.php
{
    public function notFoundError()
    {
        return $this->view->render('error404');
        //require '../view/error404.php';
    }

    public function serverError()
    {
        return $this->view->render('error500');
        //require '../view/error500.php';
    }
}
