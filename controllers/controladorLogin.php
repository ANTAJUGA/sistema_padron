<?php 
include_once("../models/conexion.php");
include_once("../models/claseGeneral.php");
//muy importante para eliminar los caracteres especiales.
$usuario=mysqli_real_escape_string($conexion,$_POST['usuario']);                                         
$clave=mysqli_real_escape_string($conexion,$_POST['clave']);
$password = md5($clave);
$objeto= new Persona();
if(isset($clave)){
    if($objeto->sesion_usuario($usuario,$password,$conexion)<1){
        header("location:../index.php");
    }
    else
    {
        session_start();
        $fila=$objeto->fila_usuario($usuario,$password,$conexion);
        $_SESSION['id']=$fila['id'];
        $_SESSION['usuario']=$fila['username'];
        $_SESSION['persona_Id']=$fila['persona_Id'];
        $_SESSION['tipo_usuario']=$fila['tipo_usuario'];
        header("location:../views/inicio.php");
    }
}
else {
    header("location:../index.php"); //regresamos en la pagina principal   
}
?>
?>