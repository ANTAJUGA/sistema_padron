<?php
include_once("../../models/conexion.php");
include_once("../../models/claseGeneral.php");

$objeto=new Persona();
if($_GET['estatus']==='cargaParroquia'){
    $canton_id=$_POST['canton_id'];
    $objeto->select_canton_usuario('parroquia',$canton_id,$conexion);
}

?>