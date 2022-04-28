<?php
    require 'includes/app.php';
    $inicio=true;
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Conoce sobre nosotros</h1>

    <div class="nosotros-contenido">

        <picture class="nosotros-imagenes">
        <source srcset="build/img/nosotros.webp" type="image/webp">
        <source srcset="build/img/nosotros.jpg" type="image/jpeg">
        <img src="build/img/nosotros.jpg" loading="lazy" alt="imagen nosotros">
        </picture>


        <div class="nosotros-informacion">
            <h3>25 años de experiencia</h3>
            <p>Pellentesque habitant morbi tristique senectus et netus
                et malesuada fames ac turpis egestas. Nam in tempor leo,
                id porttitor nisl. Praesent at diam porttitor, sodales ipsum eget,
                scelerisque tellus. Nullam ac lobortis ligula, vitae sodales turpis.
                Sed sed eleifend lectus. Maecenas id neque pulvinar, venenatis purus in,
                ultricies felis. Donec vel diam ut justo consectetur lacinia.
                Aenean condimentum, enim nec finibus rutrum, nibh mauris scelerisque
                ante, eu mattis dolor orci in ex. Pellentesque habitant morbi tristique
                senectus et netus et malesuada fames ac turpis egestas. Curabitur eleifend
                scelerisque ligula et
                sollicitudin. Cras laoreet lorem at venenatis lobortis.
            </p>
        </div>
    </div>
</main>

<section class="contenedor seccion">
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
</section>

<?php include 'includes/templates/footer.php'?>


<script src="build/js/bundle.js"></script>
</body>
</html>