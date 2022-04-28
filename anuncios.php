<?php
    require 'includes/app.php';
    $inicio=true;
    incluirTemplate('header');
?>

<main class="contenedor seccion">

    <h2>Casas y depas en ventas</h2>
    <?php
    $limite=10;
    include 'includes/templates/anuncios.php';
    ?>

</main>

<?php incluirTemplate('footer');?>


<script src="build/js/bundle.js"></script>
