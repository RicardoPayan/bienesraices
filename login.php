<?php

    //Conectando a la base de datos
    require 'includes/app.php';
    $db=conectarDB();

//autenicar al usuario

//Array de apoyo en caso de que los campos del formulario esten vacios
$errores=[];

//Codigo que se ejecuta una vez que enviamos el formulario y guarda la informacion en un array
if($_SERVER['REQUEST_METHOD']=='POST'){


    //Sacamos la info gracias al post que hay en el formulario y que le pusimos names a los campos
    // Filtro para validar si es un email valido
    //mysqli_real_escape_string es para pasar un dato en forma de string a la base de datos
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(!$email){
        $errores[]='El email es obligatorio o no es valido';
    }

    if(!$password){
        $errores[]='El password es obligatorio o no es valido';
    }

    if(empty($errores)){
        //revisar si el usuario existe
        $query="SELECT * FROM usuarios WHERE email = '${email}' ";
        $resultado =mysqli_query($db,$query);

       /* var_dump($resultado);*/

        //Como num_rows es un objeto, usamos la sintaxis de flecha para acceder a el
        if($resultado->num_rows){
            $usuario = mysqli_fetch_assoc($resultado);
            /*var_dump($usuario);*/

            //Verificar si el password es correcto o no
            $auth= password_verify($password,$usuario['password']);
            var_dump($auth);
            if($auth){
                //El usuario esta autenticado
                session_start();

                //llenar el arreglo de la sesion
                $_SESSION['usuario']=$usuario['email'];
                $_SESSION['login']=true;

                //Cuando se inicie la sesion, mandamos al admi directamente
                header('Location:/admin');

            }else{
                $errores[]='El password es incorrecto';
            }
        }else{
            $errores[] ='El usuario no existe';
        }
    }

}

//incluye el header

$inicio=true;
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>


    <?php foreach ($errores as $error): //Forma de mostrar los errores en el hmtl?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;?>

    <form method="post" class="formulario">
        <fieldset> <!--Campos relacionados-->
            <legend>Email y password</legend>



            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password" required>

            <input type="submit" value="Iniciar Sesión" class="boton-verde">

        </fieldset>
    </form>
</main>

<?php incluirTemplate('footer');?>


