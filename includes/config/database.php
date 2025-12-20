<?php

function conectarBD(): mysqli {
    $db = new mysqli("localhost", "root", "home", "bienesraices_crud");

    if (!$db) {
        echo "No hay conexión a la base de datos";
        exit;
    }

    return $db;
}