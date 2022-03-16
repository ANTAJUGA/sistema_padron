<?php
include_once('../models/conexion.php');
include_once('../models/claseGeneral.php');
//preguntamos si hay una sesion iniciada
//date_default_timezone_set('America/Guayaquil'); 
$objeto = new Persona(); ///descansar un rato mucha programacion
$hora = $objeto->obtener_hora($conexion);

if ($hora > "08:00:00" and  $hora< "17:00:00") {
    session_start();
    if(!$_SESSION['id']){//SINO ESTA LOGEAFO EN CUALQUIER PAGINA
        header("location:../index.php");//regresamos al inicio de todo
    }
} else {
    include_once('controladorCerrarSesion.php');
    header("location:../index.php");//regresamos al inicio de todo
}

?>