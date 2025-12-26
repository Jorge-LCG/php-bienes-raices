<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

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
        $router->render("paginas/nosotros");
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render("paginas/propiedades", [
            "propiedades" => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarODireccionar("/propiedades");
        $propiedad = Propiedad::find($id);

        $router->render("paginas/propiedad", [
            "propiedad" => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render("paginas/blog");
    }

    public static function entrada(Router $router) {
        $router->render("paginas/entrada");
    }

    public static function contacto(Router $router) {
        $mensaje = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $respuesta = $_POST["contacto"];

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '51ea2b094c2910';
            $mail->Password = 'a60adcd1d4c6a8';
            $mail->SMTPSecure = "tls";

            $mail->setFrom("admin@bienesraices.com");
            $mail->addAddress("admin@bienesraices.com", "BienesRaices.com");
            $mail->Subject = "Tienes un nuevo mensaje";

            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            $contenido = "<html> ";
            $contenido .= "<p>Tienes un nuevo mensaje.</p>" ;
            $contenido .= "<p>Nombres: " . $respuesta["nombre"] . " </p>" ;
            $contenido .= "<p>Mensaje: " . $respuesta["mensaje"] . " </p>" ;
            $contenido .= "<p>Vende o Compra: " . $respuesta["tipo"] . " </p>" ;
            $contenido .= "<p>Precio o Presupuesto: " . $respuesta["precio"] . " </p>" ;
            $contenido .= "<p>Prefiere ser contactado por: " . $respuesta["contacto"] . " </p>" ;

            if ($respuesta["contacto"] === "telefono") {
                $contenido .= "<p>Eligió ser contactado por teléfono: </p>" ;
                $contenido .= "<p>Teléfono: " . $respuesta["telefono"] . " </p>" ;
                $contenido .= "<p>Fecha contacto: " . $respuesta["fecha"] . " </p>" ;
                $contenido .= "<p>Hora: " . $respuesta["hora"] . " </p>" ;
            } else {
                $contenido .= "<p>Eligió ser contactado por email: </p>" ;
                $contenido .= "<p>Email: " . $respuesta["email"] . " </p>" ;
            }

            $contenido .= "</html>";
            $mail->Body = $contenido;
            $mail->AltBody = "Este es un texto alternativo";

            if ($mail->send()) {
                $mensaje = "Se envio el correo correctamente";
            } else {
                $mensaje = "No se pudo enviar el correo";
            }
        }

        $router->render("paginas/contacto", [
            "mensaje" => $mensaje
        ]);
    }
}