<?php
//$conexion=mysqli_connect("reflink.info","reflinki_antuni","JUANANTUNI","reflinki_padron");
$conexion=mysqli_connect("localhost","root","","pachakutik");

$conexion->query("SET NAMES utf8");///MUY IMPORTANTE... ESTO AYUDA A LOS CARACTERES ESPECIALES


if(!$conexion)
{
echo "Error de conexion",PHP_EOL;
exit;
}else{
    
}


?>