<?php

require_once __DIR__ . "/../includes/app.php";

use MVC\Router;

$router = new Router();

$router->get("/nosotros", 'funcion_nosotros');
$router->get("/contactanos", 'funcion_contactanos');

$router->comprobarRutas();