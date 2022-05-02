<?php

require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

$errores=Vendedor::getErrores();
$vendedor=new Vendedor;

if($_SERVER['REQUEST_METHOD']== 'POST'){

    $vendedor = new Vendedor($_POST['vendedores']);
    //Validar que no haya campos vacios
    $errores=$vendedor->validar();

    if (empty($errores)){
        $vendedor->guardar();
    }

}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Registrar Vendedor(a)</h1>
    <a href="/admin" class="boton-verde">Volver</a>

    <!--//Mostrando los mensajes de error-->
    <?php foreach ($errores as $error):?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach;?>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php">
        <?php include '../../includes/templates/formulario_vendedores.php'?>
        <input type="submit" value="Registrar Vendedor" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
