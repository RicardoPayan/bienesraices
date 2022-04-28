<?php
    use App\Propiedad;
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


    //Consultar para obtener los vendedores
    $consulta= "SELECT * FROM vendedores";
    $resultadoVendedor = mysqli_query($db,$consulta);

    //Arreglo con mensajes de errores
    $errores= Propiedad::getErrores();


    //En actualizar.php ya tenemos unos valores iniciales, que son los que estaban guardados antes




//ejecutar el codigo despues de que el usuario envia el formulario

if($_SERVER['REQUEST_METHOD']== 'POST'){


    /*echo"<pre>";
    var_dump($_POST); /*POST es para leer informacion en los formularios sin que se guarde en la URL*/
    /*echo "</pre>";*/

    /* echo"<pre>";
     var_dump($_FILES); /*Files es para arhcivos*/
    /*echo "</pre>";*/



    //Con mysqli_real_escape_string validamos que la inforamacion puesta en el formulario sera correcta, que sean
    //numeros o strings segun sea necesario. Tambien evitamos lo que se conoce como inyeccion, una forma de joder nuestra
    //base de datos


    //Asignar los atributos
    $args=$_POST['propiedad'];

    $propiedad->sincronizar($args);

    //Validacion
    $errores=$propiedad->validar();

    $nombreImagen= md5(uniqid(rand(),true)).".jpg";

    //Subida de archivos
    if ($_FILES['propiedad']['tmp_name']['imagen']){
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        $propiedad->setImagen($nombreImagen); //Al servidor solo le pasamos el nombre de la imagen

    }
    debuguear($propiedad);

    if(empty($errores)){


        exit();
        //Si el arreglo de errores esta vacio entonces mandamos los datos a la base de datos
        $query= "UPDATE propiedades SET titulo = '${titulo}', precio= '${precio}',imagen= '${nombreImagen}',descripcion= '${descripcion}', habitaciones= ${habitaciones},
                    wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId=${vendedorId} WHERE id = ${id}";

        /*echo $query;*/


        $resultado= mysqli_query($db,$query); /*Indicandole que base de datos es y que valores le agregaremos*/

        if($resultado){
            //Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
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


