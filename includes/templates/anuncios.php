<?php
    //importar la base de datos

    //la ruta es relativa a index.php y anuncio.php

    $db= conectarDB();

    //consultar
    $query= "SELECT * FROM propiedades LIMIT ${limite}";

    $resultado= mysqli_query($db,$query);

?>


<div class="contenedor-anuncios">
    <?php while( $propiedad=mysqli_fetch_assoc($resultado)):?>
    <div class="anuncio">

        <img src="imagenes/<?php echo $propiedad['imagen'];?>" loading="lazy" alt="anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo'];?></h3>
            <p><?php echo $propiedad['descripcion'];?></p>
            <p class="precio"><?php echo "$". $propiedad['precio'];?></p>

            <div class="abajo">
                <ul class="iconos-caracteristicas">
                    <li>
                        <img  class="icono" src="build/img/icono_wc.svg" loading="lazy" alt="icono wc">
                        <p><?php echo $propiedad['wc'];?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" loading="lazy" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamiento'];?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" loading="lazy" alt="icono habitaciones">
                        <p><?php echo $propiedad['habitaciones'];?></p>
                    </li>
                </ul>

                <!--Pasando id a la url-->
                <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class=" boton-amarillo-block">
                    Ver propiedad
                </a>
            </div>
        </div> <!-.contenido-anuncio-->
    </div> <!--.anuncio-->
    <?php endwhile ?>
</div> <!--.contenedor-anuncios-->

<?php
    //cerrar la conexion
    mysqli_close($db);

?>
