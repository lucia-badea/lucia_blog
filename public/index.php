<?php

require '../vendor/autoload.php'; //L'appel à l'Autoloader centralisé dans index.php

session_start();

$router = new \App\config\Router();
$router->run();