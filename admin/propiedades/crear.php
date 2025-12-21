<?php
    require "../../includes/app.php";

    use App\Propiedad;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager as Image;

    estaAutenticado();
    $db = conectarBD();

    $propiedad = new Propiedad();

    $query = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $query);

    $errores = Propiedad::getErrores();

    $titulo = "";
    $precio = "";
    $descripcion = "";
    $habitaciones = "";
    $wc = "";
    $estacionamiento = "";
    $vendedorId = "";
    $creado = date("Y/m/d");
    $imagen = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $propiedad = new Propiedad($_POST);
        
        $nombreImagen = md5(uniqid(rand(), true));

        if ($_FILES["imagen"]["tmp_name"]) {
            $manager = new Image(Driver::class);
            $imagen = $manager->read($_FILES["imagen"]["tmp_name"])->cover(800, 600);
            $propiedad->setImagen($nombreImagen);
        }
        
        $errores = $propiedad->validar();
        
        if (empty($errores)) {
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            $imagen->save(CARPETA_IMAGENES . $nombreImagen . ".jpg");

            $resultado = $propiedad->guardar();
    
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
            <?php include "../../includes/templates/formulario_propiedades.php";?>
            <input type="submit" value="Crear Propiedad" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate("footer"); 
?>