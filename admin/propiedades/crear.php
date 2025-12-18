<?php
    require "../../includes/config/database.php";
    $db = conectarBD();

    $query = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $query);

    $errores = [];
    $titulo = "";
    $precio = "";
    $descripcion = "";
    $habitacion = "";
    $wc = "";
    $estacionamiento = "";
    $vendedorId = "";
    $creado = date("Y/m/d");
    $imagen = "";

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

        if (!$imagen["name"] || $imagen["error"]) {
            $errores[] = "La imagen es obligatoria";
        }

        if ($imagen["size"] > $pesoImagen) {
            $errores[] = "La imagen es muy pesada";
        }

        if (empty($errores)) {
            $carpetaImagenes = "../../imagenes";

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = md5(uniqid(rand(), true));

            move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . "/" . $nombreImagen . ".jpg");

            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitacion', '$wc', '$estacionamiento', '$creado', '$vendedorId');";
    
            $resultado = mysqli_query($db, $query);
    
            if ($resultado) {
                header("Location: /admin");
            }
        }
    }

    require "../../includes/funciones.php";
    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Crear Propiedad</h1>

        <a href="/admin" class="boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo</label>
                <input 
                    type="text" id="titulo" name="titulo" placeholder="Título de propiedad" value="<?php echo $titulo; ?>">
                
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

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

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate("footer"); 
?>