<?php
    require "../../includes/funciones.php";
    $auth = estaAutenticado();

    if (!$auth) {
        header("Location: /");
    }
    
    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: /admin");
    }

    require "../../includes/config/database.php";
    $db = conectarBD();

    $query = "SELECT * FROM propiedades WHERE id=$id";
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    $query = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $query);

    $errores = [];
    $titulo = $propiedad["titulo"];
    $precio = $propiedad["precio"];
    $descripcion = $propiedad["descripcion"];
    $habitacion = $propiedad["habitaciones"];
    $wc = $propiedad["wc"];
    $estacionamiento = $propiedad["estacionamiento"];
    $vendedorId = $propiedad["vendedorId"];
    $creado = date("Y/m/d");
    $imagen = "";
    $propiedadImagen = $propiedad["imagen"];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
        $precio = mysqli_real_escape_string($db, $_POST["precio"]);
        $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
        $habitacion = mysqli_real_escape_string($db, $_POST["habitacion"]);
        $wc = mysqli_real_escape_string($db, $_POST["wc"]);
        $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
        $vendedorId = mysqli_real_escape_string($db, $_POST["vendedor"]);
        $imagen = $_FILES["imagen"];
        $pesoImagen = 1000 * 1000;

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
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo</label>
                <input 
                    type="text" id="titulo" name="titulo" placeholder="Título de propiedad" value="<?php echo $titulo; ?>">
                
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
                <img src="/imagenes/<?php echo $propiedadImagen;?>.jpg" alt="<?php $titulo; ?>" class="imagen-small">

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitacion">Habitaciones</label>
                <input type="number" id="habitacion" name="habitacion" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitacion; ?>">
                
                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">
                
                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Información Vendedor</legend>

                <select name="vendedor" id="vendedor">
                    <option>--Seleccionar--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedorId === $vendedor["id"] ? "selected" : ""; ?> value="<?php echo $vendedor['id']; ?>">
                            <?php echo $vendedor["nombre"] . " " . $vendedor["apellido"]; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate("footer"); 
?>