<?php
session_start();

//Al entrar a esta pagina, el arreglo de SESSION lo vaciamos, osea que ya no habria informacion de la sesion
// por lo tanto se cierra la sesion anterior
$_SESSION=[];

header('Location:/');
