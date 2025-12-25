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

    public static function nosotros(Router $router) {
        $router->render("paginas/nosotros", []);
    }

    public static function propiedades(Router $router) {
        $router->render("", []);
    }

    public static function propiedad(Router $router) {
       $router->render("", []);
    }

    public static function blog(Router $router) {
        $router->render("", []);
    }

    public static function entrada(Router $router) {
        $router->render("", []);
    }

    public static function contacto(Router $router) {
        $router->render("", []);
    }
}