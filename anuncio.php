<?php include "includes/templates/header.php"; ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/jpg/anuncio1.avif" type="image/avif">
            <source srcset="build/img/jpg/anuncio1.webp" type="image/wep">
            <source srcset="build/img/jpg/anuncio1.jpg" type="image/jpeg">
            <img src="build/img/jpg/anuncio1.jpg" alt="anuncio 1">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">S/3000000</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/svg/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                
                <li>
                    <img class="icono" src="build/img/svg/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                
                <li>
                    <img class="icono" src="build/img/svg/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>3</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, recusandae. Repudiandae praesentium rem perferendis ratione error beatae harum, saepe ex distinctio voluptas accusamus deleniti et eos. Beatae dolor corrupti eaque.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, recusandae. Repudiandae praesentium rem perferendis ratione error beatae harum, saepe ex distinctio voluptas accusamus deleniti et eos. Beatae dolor corrupti eaque.</p>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, recusandae. Repudiandae praesentium rem perferendis ratione error beatae harum, saepe ex distinctio voluptas accusamus deleniti et eos. Beatae dolor corrupti eaque.</p>
        </div>
    </main>

    <footer class="footer">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>

            <p class="copyright">Todos los derechos reservados 2025 &copy;</p>
        </div>
    </footer>

    <script src="build/js/app.min.js"></script>
</body>
</html>