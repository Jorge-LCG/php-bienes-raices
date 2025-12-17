<?php
    require "includes/funciones.php";
    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/jpg/nosotros.avif" type="imagen/avif">
                    <source srcset="build/img/jpg/nosotros.webp" type="imagen/webp">
                    <source srcset="build/img/jpg/nosotros.jpg" type="imagen/jpeg">
                    <img loading="lazy" src="build/img/jpg/nosotros.jpg" alt="imagen nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt labore et magnam cumque culpa, illum consequatur excepturi obcaecati officiis aperiam animi delectus incidunt at atque. Officia beatae odit necessitatibus sed.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt labore et magnam cumque culpa, illum consequatur excepturi obcaecati officiis aperiam animi delectus incidunt at atque. Officia beatae odit necessitatibus sed.</p>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt labore et magnam cumque culpa, illum consequatur excepturi obcaecati officiis aperiam animi delectus incidunt at atque.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/svg/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, eaque ut nihil autem non placeat neque consectetur vitae voluptatibus.</p>
            </div>
    
            <div class="icono">
                <img src="build/img/svg/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, eaque ut nihil autem non placeat neque consectetur vitae voluptatibus.</p>
            </div>
            
            <div class="icono">
                <img src="build/img/svg/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, eaque ut nihil autem non placeat neque consectetur vitae voluptatibus.</p>
            </div>
        </div>
    </section>

<?php
    incluirTemplate("footer"); 
?>