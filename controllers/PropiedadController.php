<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PropiedadController {
    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $resultado = null;

        $router->render('propiedades/admin', [
            "propiedades" => $propiedades,
            "resultado" => $resultado
        ]);
    }

    public static function crear() {
        echo "Crear";
    }

    public static function actualizar() {
        echo "actualizar";
    }
}