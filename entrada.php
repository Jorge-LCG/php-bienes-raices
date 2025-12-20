<?php
    require "includes/app.php";
    incluirTemplate("header"); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/jpg/destacada.avif" type="image/avif">
            <source srcset="build/img/jpg/destacada.webp" type="image/wep">
            <source srcset="build/img/jpg/destacada.jpg" type="image/jpeg">
            <img src="build/img/jpg/destacada.jpg" alt="anuncio 1">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/12/2024</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, recusandae. Repudiandae praesentium rem perferendis ratione error beatae harum, saepe ex distinctio voluptas accusamus deleniti et eos. Beatae dolor corrupti eaque.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, recusandae. Repudiandae praesentium rem perferendis ratione error beatae harum, saepe ex distinctio voluptas accusamus deleniti et eos. Beatae dolor corrupti eaque.</p>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, recusandae. Repudiandae praesentium rem perferendis ratione error beatae harum, saepe ex distinctio voluptas accusamus deleniti et eos. Beatae dolor corrupti eaque.</p>
        </div>
    </main>

<?php
    incluirTemplate("footer"); 
?>