<?php
require_once './libs/Router.php';
require_once './app/controllers/categoria.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo

$router->addRoute('equipos', 'GET', 'EquipoApiController', 'getEquipos');

$router->addRoute('equipos/:ID', 'GET', 'EquipoApiController', 'getEquipo');

$router->addRoute('equipos', 'POST', 'EquipoApiController', 'insertEquipo');

$router->addRoute('equipos/:ID', 'DELETE', 'EquipoApiController', 'deleteEquipo');

$router->addRoute('equipos/:ID', 'PUT', 'EquipoApiController', 'updateEquipo');


// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);