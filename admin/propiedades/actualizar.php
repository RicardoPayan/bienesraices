<?php
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;
    require '../../includes/app.php';
    estaAutenticado();


    //Validar que sea un ID valido
    $id= $_GET['id'];
    $id= filter_var($id, FILTER_VALIDATE_INT);


    if(!$id){
        header('Location: /admin');
    }

    //Para actualizar la informacion de una propiedad
    //Obtener los datos de la propiedad
     /*Accedemos al id*/
    $propiedad= Propiedad::find($id);
    $vendedores=Vendedor::all();

    //Arreglo con mensajes de errores
    $errores= Propiedad::getErrores();

    //En actualizar.php ya tenemos unos valores iniciales, que son los que estaban guardados antes
//ejecutar el codigo despues de que el usuario envia el formulario

if($_SERVER['REQUEST_METHOD']== 'POST'){

    //Asignar los atributos
    $args=$_POST['propiedad'];

    $propiedad->sincronizar($args);

    //Validacion
    $errores=$propiedad->validar();

    $nombreImagen= md5(uniqid(rand(),true)).".jpg";

    //Subida de archivos


    if (empty($errores)) {
        //save img
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }

        $propiedad->guardar();
    }



}

$inicio=true;
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin" class="boton-verde">Volver</a>

    <!--//Mostrando los mensajes de error-->
    <?php foreach ($errores as $error):?>

        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach;?>

    <form class="formulario" method="POST"  enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'?>
        <input type="submit" value="Actualizar propiedad" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>


