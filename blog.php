<?php
    require "includes/app.php";
    incluirTemplate("header"); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/jpg/blog1.avif" type="image/avif">
                    <source srcset="build/img/jpg/blog1.webp" type="image/type">
                    <source srcset="build/img/jpg/blog1.jpg" type="image/jpeg">
                    <img srcset="build/img/jpg/blog1.jpg" alt="imagen blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                </a>
                
                <p>Escrito el: <span>20/12/2024</span> por: <span>Admin</span></p>
                <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero.</p>
            </div>
        </article>
        
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/jpg/blog2.avif" type="image/avif">
                    <source srcset="build/img/jpg/blog2.webp" type="image/type">
                    <source srcset="build/img/jpg/blog2.jpg" type="image/jpeg">
                    <img srcset="build/img/jpg/blog2.jpg" alt="imagen blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para decoración de tu hogar</h4>
                </a>

                <p>Escrito el: <span>20/12/2024</span> por: <span>Admin</span></p>
                <p>Máximiza el espacio en tu hogar con este guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/jpg/blog3.avif" type="image/avif">
                    <source srcset="build/img/jpg/blog3.webp" type="image/type">
                    <source srcset="build/img/jpg/blog3.jpg" type="image/jpeg">
                    <img srcset="build/img/jpg/blog3.jpg" alt="imagen blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                </a>
                
                <p>Escrito el: <span>20/12/2024</span> por: <span>Admin</span></p>
                <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero.</p>
            </div>
        </article>
        
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/jpg/blog4.avif" type="image/avif">
                    <source srcset="build/img/jpg/blog4.webp" type="image/type">
                    <source srcset="build/img/jpg/blog4.jpg" type="image/jpeg">
                    <img srcset="build/img/jpg/blog4.jpg" alt="imagen blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para decoración de tu hogar</h4>
                </a>

                <p>Escrito el: <span>20/12/2024</span> por: <span>Admin</span></p>
                <p>Máximiza el espacio en tu hogar con este guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
            </div>
        </article>
    </main>

<?php
    incluirTemplate("footer"); 
?>