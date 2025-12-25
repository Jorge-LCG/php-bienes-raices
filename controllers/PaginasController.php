<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
        $inicio = true;
        $propiedades = Propiedad::get(3);

        $router->render("paginas/index", [
            "inicio" => $inicio,
            "propiedades" => $propiedades
        ]);
    }

    public static function nosotros() {
        echo "nosotros página principal";
    }

    public static function propiedades() {
        echo "propiedades página principal";
    }

    public static function propiedad() {
        echo "propiedad página principal";
    }

    public static function blog() {
        echo "blog página principal";
    }

    public static function entrada() {
        echo "entrada página principal";
    }

    public static function contacto() {
        echo "contacto página principal";
    }
}