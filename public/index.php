<?php

require '../vendor/autoload.php'; //L'appel √† l'Autoloader centralis√© dans index.php

session_start();

$router = new \App\config\Router();
$router->run();