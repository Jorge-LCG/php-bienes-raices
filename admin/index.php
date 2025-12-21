<?php
    require "../includes/app.php";
    estaAutenticado();
    
    use App\Propiedad;
    $propiedades = Propiedad::all();

    $mensaje = $_GET["resultado"] ?? null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            $query = "SELECT imagen FROM propiedades WHERE id=$id;";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink( "../imagenes/" . $propiedad["imagen"] . ".jpg");

            $query = "DELETE FROM propiedades WHERE id=$id;";
            $resultado = mysqli_query($db, $query);

            header("Location: /admin?resultado=3");
        }
    }

    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes y Raices</h1>

        <?php if (intval($mensaje) === 1) : ?>
            <p class="alerta exito" id="alerta">Anuncio Creado Correctamente.</p>
        <?php elseif (intval($mensaje) === 2) : ?>
            <p class="alerta exito" id="alerta">Anuncio Actualizado Correctamente.</p>
        <?php elseif (intval($mensaje) === 3) : ?>
            <p class="alerta exito" id="alerta">Anuncio Eliminado Correctamente.</p>
        <?php endif; ?>

        <a href="admin/propiedades/crear.php" class="boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($propiedades as $propiedad) : ?>
                    <tr>
                        <td><?php echo $propiedad->id; ?></td>
                        <td><?php echo $propiedad->titulo; ?></td>
                        <td>
                            <img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="<?php echo $propiedad->titulo; ?>" class="imagen-tabla">
                        </td>
                        <td><?php echo $propiedad->precio; ?></td>
                        <td class="acciones">
                            <form method="POST">
                                <input type="hidden" id="id" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
                            </form>
                            <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate("footer"); 
?>