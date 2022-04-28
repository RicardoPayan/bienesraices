<?php
    require 'includes/app.php';
    $inicio=true;
    incluirTemplate('header',$inicio=true);
?>

    <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Vestibulum ultrices sem dapibus mauris malesuada, ac mollis enim tempor.
                    Fusce ac libero luctus, eleifend lectus ut,
                    convallis est. Vestibulum libero dolor, tempus vitae porttitor sed,
                    pellentesque porta quam. Etiam nisl risus, posuere ac semper vitae,
                    vulputate non diam. Praesent scelerisque dolor at ante
                    \condimentum, at gravida est scelerisque. Duis et consequat risus. Nam felis metus,
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Vestibulum ultrices sem dapibus mauris malesuada, ac mollis enim tempor.
                    Fusce ac libero luctus, eleifend lectus ut,
                    convallis est. Vestibulum libero dolor, tempus vitae porttitor sed,
                    pellentesque porta quam. Etiam nisl risus, posuere ac semper vitae,
                    vulputate non diam. Praesent scelerisque dolor at ante
                    \condimentum, at gravida est scelerisque. Duis et consequat risus. Nam felis metus,
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Vestibulum ultrices sem dapibus mauris malesuada, ac mollis enim tempor.
                    Fusce ac libero luctus, eleifend lectus ut,
                    convallis est. Vestibulum libero dolor, tempus vitae porttitor sed,
                    pellentesque porta quam. Etiam nisl risus, posuere ac semper vitae,
                    vulputate non diam. Praesent scelerisque dolor at ante
                    \condimentum, at gravida est scelerisque. Duis et consequat risus. Nam felis metus,
                </p>
            </div>
        </div> <!--.iconos-nosotros-->
    </main>

    <section class="seccion contenedor">
        <h2>Casas y depas en ventas</h2>

        <?php
            $limite=3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="ver-todas alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section> <!--.seccion-->

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog"> <!--Para secciones de blog-->
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" loading="lazy" alt="imagen blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>06/12/2021</span> por: <span>Admin</span></p>

                        <p>
                            Consejo para constuir una terraza en el techo de tu casa con los mejores materiales
                            y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog"> <!--Para secciones de blog-->
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" loading="lazy" alt="imagen blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>06/12/2021</span> por: <span>Admin</span></p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores
                            para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section> <!--.blog-->

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron
                    cumple con todas mis expectativas
                </blockquote>
                <p>-Ricardo payan</p>
            </div>
        </section>
    </div>

    <?php incluirTemplate('footer');?>


 <script src="build/js/bundle.js"></script>
</body>
</html>