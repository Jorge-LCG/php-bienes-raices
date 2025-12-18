<?php
    require "includes/config/database.php";
    $db = conectarBD();

    $query = "SELECT * FROM propiedades";

    if (isset($limite)) {
        $query .= " LIMIT $limite";
    }

    $resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)) :?>
        <div class="anuncio">
            <img width="200" height="300" loading="lazy" src="../../imagenes/<?php echo $propiedad["imagen"]; ?>.jpg" alt="<?php echo $propiedad["titulo"]; ?>">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad["titulo"]; ?></h3>
                <p><?php echo $propiedad["descripcion"]; ?></p>
                <p class="precio">S/ <?php echo $propiedad["precio"]; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/svg/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad["wc"]; ?></p>
                    </li>
                    
                    <li>
                        <img class="icono" src="build/img/svg/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad["estacionamiento"]; ?></p>
                    </li>
                    
                    <li>
                        <img class="icono" src="build/img/svg/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $propiedad["habitaciones"]; ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad["id"]; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php
    mysqli_close($db);
?>