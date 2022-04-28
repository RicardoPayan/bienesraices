<?php

//Importar la conexion
require 'includes/app.php';
$db= conectarDB();

//Crear email y password
$email = 'correo@correo.com';
$password = 'perro';

//password_hash es una funcion de php para generar hashes a base de algun texto, como una contrasena dada por el usuario.
// PASSWORD_DEFAULT es el algoritmo con el que se creara ese hash, hay varios, todos son bastante seguros
$passwordHash= password_hash($password,PASSWORD_DEFAULT);

//Query para crear usuario
$query=" INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";
echo $query;



//Agregarlo a la base de datos
mysqli_query($db,$query);