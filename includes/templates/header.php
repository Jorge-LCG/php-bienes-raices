<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION["login"] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes y Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? "inicio" : ""; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/svg/logo.svg" alt="imagen de logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/svg/barras.svg" alt="menu hamburguesa">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/svg/dark-mode.svg" alt="darkmode">
                    
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <?php 
                if ($inicio) {
                    echo "<h1>Ventas de Casas y Departamentos Exclusivos de Lujos</h1>";
                }
            ?>
        </div>
    </header>