<?php

require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

//Validar que sea un ID valido
$id= $_GET['id'];
$id= filter_var($id,FILTER_VALIDATE_INT);

if (!$id){
    header('Location: /admin');
}

//Obtener el arreglo del vendedor desde la base de datos
$vendedor= Vendedor::find($id);
$errores=Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD']== 'POST'){
 //asignar los valores
    $args= $_POST['vendedores'];
    //Sincronizar objeto en memoria con lo que el usuario escribio
    $vendedor->sincronizar($args);
    $errores=$vendedor->validar();

    if (empty($errores)){
        $vendedor->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin" class="boton-verde">Volver</a>

    <!--//Mostrando los mensajes de error-->
    <?php foreach ($errores as $error):?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach;?>

    <form class="formulario" method="POST" action="">
        <?php include '../../includes/templates/formulario_vendedores.php'?>
        <input type="submit" value="Guardar cambios" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
