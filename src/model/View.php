<?php

namespace App\src\model;

use App\config\HttpRequest;

class View // Classe qui gére les vues
{
    private $file;
    private $title;
    private $session; 

    public function __construct()
    {
        $httpRequest = new HttpRequest();
        $this->session = $httpRequest->getSession();/*on fait appel à la classe HttpRequest pour récupérer la session */
    }

    public function render($template, $data = [])
    {
        $this->file = '../view/'.$template.'.php';
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../view/base_view.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session
        ]);
        echo $view;
    }

    private function renderFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}