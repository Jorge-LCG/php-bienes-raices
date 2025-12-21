<?php
    require "../../includes/app.php";
    estaAutenticado();
    
    use App\Propiedad;

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: /admin");
    }

    $db = conectarBD();

    $propiedad = Propiedad::find($id);

    $query = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $query);

    $errores = Propiedad::getErrores();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $args = $_POST["propiedad"];

        $propiedad->sincronizar($args);

        debuguear($propiedad);
        
        $imagen = $_FILES["imagen"];

        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if (!$precio) {
            $errores[] = "Debes añadir un precio";
        }

        if (strlen($descripcion) <= 50) {
            $errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
        }

        if (!$habitacion) {
            $errores[] = "Debes añadir cantidad de habitaciones";
        }
        
        if (!$wc) {
            $errores[] = "Debes añadir cantidad de baños";
        }
        
        if (!$estacionamiento) {
            $errores[] = "Debes añadir cantidad de estacionamiento";
        }

        if (!$vendedorId) {
            $errores[] = "Debes añadir un vendedor";
        }

        if ($imagen["size"] > $pesoImagen) {
            $errores[] = "La imagen es muy pesada";
        }

        if (empty($errores)) {
            $carpetaImagenes = "../../imagenes";

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            if ($imagen["name"]) {
                unlink($carpetaImagenes . "/" . $propiedad["imagen"] . ".jpg");
                $nombreImagen = md5(uniqid(rand(), true));
                move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . "/" . $nombreImagen . ".jpg");
            } else {
                $nombreImagen = $propiedad["imagen"];
            }


            $query = "UPDATE propiedades SET titulo='$titulo', precio=$precio, imagen='$nombreImagen', descripcion='$descripcion', habitaciones=$habitacion, wc=$wc, estacionamiento=$estacionamiento, vendedorId=$vendedorId WHERE id=$id;";
    
            $resultado = mysqli_query($db, $query);
    
            if ($resultado) {
                header("Location: /admin?resultado=2");
            }
        }
    }

    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include "../../includes/templates/formulario_propiedades.php";?>
            <input type="submit" value="Actualizar Propiedad" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate("footer"); 
?>