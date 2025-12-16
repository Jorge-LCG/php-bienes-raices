<?php
    $inicio = true;
    include "includes/templates/header.php"; 
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/jpg/anuncio1.avif" type="image/avif">
                    <source srcset="build/img/jpg/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/jpg/anuncio1.jpg" type="image/jpeg">
                    <img width="200" height="300" loading="lazy" srcset="build/img/jpg/anuncio1.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago</h3>
                    <p>Casa en el lago con excelente vista, acabos de lujo a un excelente precio.</p>
                    <p class="precio">S/ 3000000</p>

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

                    <a href="anuncio.php" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div>
            
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/jpg/anuncio2.avif" type="image/avif">
                    <source srcset="build/img/jpg/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/jpg/anuncio2.jpg" type="image/jpeg">
                    <img width="200" height="300" loading="lazy" srcset="build/img/jpg/anuncio2.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago</h3>
                    <p>Casa en el lago con excelente vista, acabos de lujo a un excelente precio.</p>
                    <p class="precio">S/ 3000000</p>

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

                    <a href="anuncio.php" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div>
            
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/jpg/anuncio3.avif" type="image/avif">
                    <source srcset="build/img/jpg/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/jpg/anuncio3.jpg" type="image/jpeg">
                    <img width="200" height="300" loading="lazy" srcset="build/img/jpg/anuncio3.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago</h3>
                    <p>Casa en el lago con excelente vista, acabos de lujo a un excelente precio.</p>
                    <p class="precio">S/ 3000000</p>

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

                    <a href="anuncio.php" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div>
        </div>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad.</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <section class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

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
                    
                    <p class="informacion-meta">Escrito el: <span>20/12/2024</span> por: <span>Admin</span></p>
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

                    <p class="informacion-meta">Escrito el: <span>20/12/2024</span> por: <span>Admin</span></p>
                    <p>Máximiza el espacio en tu hogar con este guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
    
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                
                <p>-Jorge Luis</p>
            </div>
        </section>
    </section>

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