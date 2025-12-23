<?php
    require "../includes/app.php";
    estaAutenticado();
    
    use App\Propiedad;
    use App\Vendedor;

    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    $resultado = $_GET["resultado"] ?? null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            $tipo = $_POST["tipo"];
            
            if ($tipo === "propiedad") {
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            } else if ($tipo === "vendedor") {
                $propiedad = Vendedor::find($id);
                $propiedad->eliminar();
            }
        }
    }

    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes y Raices</h1>

        <?php $mensaje = mostrarNotificacion(intval($resultado)); ?>

        <?php if ($mensaje) : ?>
            <p class="alerta exito" id="alerta"><?php echo sanitizar($mensaje); ?></p>
        <?php endif; ?>            

        <a href="admin/propiedades/crear.php" class="boton-verde">Nueva Propiedad</a>
        <a href="admin/vendedores/crear.php" class="boton-amarillo">Nuevo(a) Vendedor</a>

        <h2>Propiedades</h2>
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
                        <td>S/ <?php echo $propiedad->precio; ?></td>
                        <td class="acciones">
                            <form method="POST">
                                <input type="hidden" id="id" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" id="tipo" name="tipo" value="propiedad">
                                <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
                            </form>
                            <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($vendedores as $vendedor) : ?>
                    <tr>
                        <td><?php echo $vendedor->id; ?></td>
                        <td><?php echo $vendedor->nombre; ?></td>
                        <td><?php echo $vendedor->apellido; ?></td>
                        <td><?php echo $vendedor->telefono; ?></td>
                        <td class="acciones">
                            <form method="POST">
                                <input type="hidden" id="id" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" id="tipo" name="tipo" value="vendedor">
                                <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
                            </form>
                            <a href="admin/vendedores/actualizar.php?id=<?php echo $vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
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