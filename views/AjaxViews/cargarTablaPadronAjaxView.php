<?php
include_once("../../models/conexion.php");
include_once("../../models/claseGeneral.php");
$objeto = new Persona();
$canton_id = $_POST['canton_id'];
$objeto->tabla_imprime_padron($conexion, $canton_id);
?>