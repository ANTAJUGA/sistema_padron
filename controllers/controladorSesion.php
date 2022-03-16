<?php
//preguntamos si hay una sesion iniciada
date_default_timezone_set('America/Guayaquil'); 
$hora = date('H:i:s', time());
session_start();
if ($hora >= '08:00:00' and  $hora <= '17:15:00') {
    if(!$_SESSION['id']){//SINO ESTA LOGEAFO EN CUALQUIER PAGINA
        header("location:../index.php");//regresamos al inicio de todo
    }
} else {
    include_once('controladorCerrarSesion.php');
    header("location:../index.php");//regresamos al inicio de todo
}

?>