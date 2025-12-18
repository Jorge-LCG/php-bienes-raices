<?php
    require "../includes/config/database.php";
    $db = conectarBD();

    $query = "SELECT id, titulo, imagen, precio FROM propiedades";
    $resultado = mysqli_query($db, $query);

    $mensaje = $_GET["resultado"] ?? null;
    require "../includes/funciones.php";
    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes y Raices</h1>

        <?php if (intval($mensaje) === 1) : ?>
            <p class="alerta exito" id="alerta">Anuncio Creado Correctamente.</p>
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
                <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $propiedad["id"]; ?></td>
                        <td><?php echo $propiedad["titulo"]; ?></td>
                        <td>
                            <img src="../imagenes/<?php echo $propiedad["imagen"]; ?>.jpg" alt="<?php echo $propiedad["titulo"] ?>" class="imagen-tabla">
                        </td>
                        <td><?php echo $propiedad["precio"]; ?></td>
                        <td class="acciones">
                            <a href="" class="boton-rojo-block">Borrar</a>
                            <a href="" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate("footer"); 
?>