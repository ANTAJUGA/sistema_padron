<?php 
include_once("../models/conexion.php");
include_once("../models/claseGeneral.php");
//muy importante para eliminar los caracteres especiales.
$limpia=trim($_POST['buscar_padron']);
$buscar_padron =mysqli_real_escape_string($conexion,$limpia);
$username=mysqli_real_escape_string($conexion,trim($_POST['username']));
$password=mysqli_real_escape_string($conexion,md5(trim($_POST['password'])));
$tipo_usuario=mysqli_real_escape_string($conexion,trim($_POST['tipo_usuario']));
$usuario_creacion= $_POST['usuario_creacion'];

$objeto= new Persona();
$padron=$objeto->Obtener_Datos('padronp FORCE INDEX (padronp_un)','identificacion',$buscar_padron,$conexion);




if(isset($buscar_padron)){//si llego algo por post
    if($objeto->Obtener_Numero_Datos('usuario','persona_Id',$padron['id'],$conexion)<1){//si la consulta da menor que 1
        //$usuario=$objeto->Obtener_Numero_Datos('usuario','persona_Id',$padron['id'],$conexion);
        $objeto->guardar_Usuario($padron['id'],$username,$password,$tipo_usuario,$usuario_creacion,$conexion);
        header("location:../views/crearUsuario.php");
    }
}
else {
     //regresamos en la pagina principal   
}
?>