<?php 
include_once("../models/conexion.php");
include_once("../models/claseGeneral.php");
//muy importante para eliminar los caracteres especiales.
//print_r($_POST); //veririfcar que llega por post
$limpia=trim($_POST['busqueda']);
$busqueda =mysqli_real_escape_string($conexion,$limpia);
$apellidos=mysqli_real_escape_string($conexion,trim($_POST['apellidos']));
$nombres=mysqli_real_escape_string($conexion,trim($_POST['nombres']));
$apellido_nombre= $apellidos.' '.$nombres;
$parroquia_id=$_POST['parroquia_id'];
$sexo_id=$_POST['sexo_id'];
$usuario_creacion= $_POST['usuario_creacion'];
$clave=$_POST['clave'];
$objeto= new Persona();
$boleano = new ValidarIdentificacion();
$genera=$objeto->obterner_clave($conexion)['genera'];

if($boleano->validarCedula($busqueda)>0){
   $guardar=$objeto->guardar_adherente($apellido_nombre,$busqueda,$parroquia_id,$sexo_id,$usuario_creacion,$conexion);
   if($guardar>0){
        //echo "guardado exitosamente";
        header('location:../views/adherenteView.php?estado=guardado');
        //header('');
   }else{
      if($clave==$genera){
         if($objeto->datos_modifica($conexion,$busqueda)<1){
            $actualizar = $objeto->actualizar_adherente($busqueda, $apellidos, $parroquia_id, $sexo_id, $usuario_creacion, $conexion);
            header('location:../views/adherenteView.php?estado=actualizado');
         }else{
            //echo "error al guardar no se permite duplicado";
            header('location:../views/adherenteView.php?estado=modificado');
         }
      }
      else{
         //echo "error al guardar no se permite cedula inválida";
         header('location:../views/adherenteView.php?estado=error_clave');
      }
      
   }
}

else{
    //echo "error al guardar no se permite cedula inválida";
    header('location:../views/adherenteView.php?estado=error');
}








?>