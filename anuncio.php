<?php
    require 'includes/app.php';
    $inicio=true;
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <?php
        include 'includes/templates/anuncio.php'
    ?>
</main>

<?php incluirTemplate('footer');?>


<script src="build/js/bundle.js"></script>
</body>
</html>