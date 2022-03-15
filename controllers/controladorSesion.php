<?php
//preguntamos si hay una sesion iniciada
session_start();
if(!$_SESSION['id']){//SINO ESTA LOGEAFO EN CUALQUIER PAGINA
    header("location:../index.php");//regresamos al inicio de todo
}
?>