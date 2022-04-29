<?php

    //Autenticacion
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    //base datos

    $db= conectarDB(); /*Llamamos la funcion que conecta con la base de datos*/
    $propiedad = new Propiedad;

    //Consultar para obtener los vendedores
    $consulta= "SELECT * FROM vendedores";
    $resultadoVendedor = mysqli_query($db,$consulta);

    //Arreglo con mensajes de errores
    $errores=Propiedad::getErrores();





    //ejecutar el codigo despues de que el usuario envia el formulario

if($_SERVER['REQUEST_METHOD']== 'POST'){


    //Crea una nueva instancia
    $propiedad=new Propiedad($_POST['propiedad']);

    //Crear carpeta


    //Generar un nombre unico para cada imagen
    //md5 y uniqid son funciones propias de PHP, rand tambien
    $nombreImagen= md5(uniqid(rand(),true)).".jpg";

    //Setear imagen
    //Realiza un resize a la imagen con un intervention

    if ($_FILES['propiedad']['tmp_name']['imagen']){
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        $propiedad->setImagen($nombreImagen); //Al servidor solo le pasamos el nombre de la imagen

    }

    //Validar
    $errores=$propiedad->validar();

    //Con mysqli_real_escape_string validamos que la inforamacion puesta en el formulario sera correcta, que sean
    //numeros o strings segun sea necesario. Tambien evitamos lo que se conoce como inyeccion, una forma de joder nuestra
    //base de datos
    //Revisar que el arreglo de erroes este vacio
    if(empty($errores)){

        //files hacia una variable


        /*SUBIDA DE ARCHIVOS*/
        //crear carpeta para imagenes
        if(!is_dir(CARPETA_IMAGENES)){
           mkdir(CARPETA_IMAGENES);
       }

        //Subir la imagen
        $image->save(CARPETA_IMAGENES. $nombreImagen);


        //GUARDA EN LA BASE DE DATOS
        $propiedad->guardar();



    }



}

    $inicio=true;
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton-verde">Volver</a>

        <!--//Mostrando los mensajes de error-->
        <?php foreach ($errores as $error):?>

        <div class="alerta error">
            <?php echo $error ?>
        </div>
        <?php endforeach;?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'?>
            <input type="submit" value="Crear propiedad" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>


