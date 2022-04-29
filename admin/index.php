<?php

    require '../includes/app.php';
    estaAutenticado();

    use App\Propiedad;
    use App\Vendedor;
    //Implementar un metodo para obtener todas las propiedades
    $propiedades= Propiedad::all();
    $vendedores= Vendedor::all();




    //Muestra mensaje condicional
    $resultado=$_GET['resultado'] ?? null;


    //Esto es para revisar que estamos enviando la informacion desde el formulario y que el request method sea post
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $id= $_POST['id'];
        //Verificamos que si sea entero
        $id=filter_var($id,FILTER_VALIDATE_INT);

        if($id){
            //Eliminar el archivo

            //Seleccionamos el id de la base de datos. id que mandamos desde el formulario
            $propiedad= Propiedad::find($id);
            $propiedad->eliminar();

        }
    }

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;



    // Incluye un template

    $inicio=true;
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if(intval ($resultado==1)): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif (intval ($resultado==2)): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
         <?php elseif (intval ($resultado==3)): ?>
            <p class="alerta exito">Anuncio eliminado Correctamente</p>
        <?php endif;?>
        <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva propiedad</a>


        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <!--Mostrar los resultados-->
            <tbody>
                <!--Iterando mientras haya informacion en la base de datos-->
                <?php foreach ($propiedades as $propiedad):?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-table"></td>
                    <td>$<?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="submit"  class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="propiedades/actualizar.php? id= <?php echo $propiedad->id;?> " class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php

    //Cerrar la conexion
    mysqli_close($db);

    incluirTemplate('footer');
?>

