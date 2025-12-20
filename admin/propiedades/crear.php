<?php
    require "../../includes/app.php";

    use App\Propiedad;
    estaAutenticado();
    $db = conectarBD();

    $query = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $query);

    $errores = Propiedad::getErrores();

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
        $propiedad = new Propiedad($_POST);
        $errores = $propiedad->validar();
        
        if (empty($errores)) {
            $propiedad->guardar();
            
            $imagen = $_FILES["imagen"];

            $carpetaImagenes = "../../imagenes";

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = md5(uniqid(rand(), true));

            move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . "/" . $nombreImagen . ".jpg");

           
    
            $resultado = mysqli_query($db, $query);
    
            if ($resultado) {
                header("Location: /admin?resultado=1");
            }
        }
    }
    
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

                <select name="vendedorId" id="vendedor">
                    <option>--Seleccionar--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedorId === $vendedor["id"] ? "selected" : ""; ?> value="<?php echo $vendedor['id']; ?>">
                            <?php echo $vendedor["nombre"] . " " . $vendedor["apellido"]; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate("footer"); 
?>