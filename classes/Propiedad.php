<?php

namespace App;

class Propiedad {
    protected static $db;
    protected static $columasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public static function setDB($database) {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->titulo = $args["titulo"] ?? "";
        $this->precio = $args["precio"] ?? "";
        $this->imagen = $args["imagen"] ?? "imagen.jpg";
        $this->descripcion = $args["descripcion"] ?? "";
        $this->habitaciones = $args["habitaciones"] ?? "";
        $this->wc = $args["wc"] ?? "";
        $this->estacionamiento = $args["estacionamiento"] ?? "";
        $this->creado = date("Y/m/d");
        $this->vendedorId = $args["vendedorId"] ?? "";
    }

    public function guardar() {
        $atributos = $this->sanitizarAtributos();

        $query = "INSERT INTO propiedades ( ";
        $query .= join(", ", array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " '); ";

        $resultado = self::$db->query($query);
    }

    public function atributos() {
        $atributos = [];
        foreach (self::$columasDB as $columna) {
            if ($columna === "id") continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public static function getErrores() {
        return self::$errores;
    }

    public function validar() {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }

        if (strlen($this->descripcion) <= 50) {
            self::$errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir cantidad de habitaciones";
        }
        
        if (!$this->wc) {
            self::$errores[] = "Debes añadir cantidad de baños";
        }
        
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir cantidad de estacionamiento";
        }

        if (!$this->vendedorId) {
            self::$errores[] = "Debes añadir un vendedor";
        }

        // if (!$this->imagen["name"] || $this->imagen["error"]) {
        //     $errores[] = "La imagen es obligatoria";
        // }

        // if ($this->imagen["size"] > $pesoImagen) {
        //     $errores[] = "La imagen es muy pesada";
        // }

        return self::$errores;
    }
}