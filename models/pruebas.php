<?php

include_once("conexion.php");

include_once("claseGeneral.php");

$objeto = new Persona();
$boleano = new ValidarIdentificacion();
/*/$usuario_sesion="admin";
$contraseña="admin";
$password = md5($contraseña);//LO USAMOS PARA CONVERTIR EN CLAVE CIFRADA
if($objeto->sesion_usuario($usuario_sesion,$password,$conexion)<1){

    echo "error";
}
else
{
    $datos=$objeto->fila_usuario($usuario_sesion,$password,$conexion);
    echo $datos["id"];
    echo $datos["username"];
}*/

//$objeto->tabla_usuario($conexion);
//$datos = $objeto->datos_usuario(1,$conexion);
//echo $datos['identificacion'];

//echo $objeto->Obtener_Numero_Datos('padronp','identificacion','140096244',$conexion);
/// echo $objeto->guardar_Usuario(11,'marco','e4f4012316b8b0e944b92a30c3501586',1,1,$conexion);

/*if( $boleano->validarCedula('1401324122')>0){
    echo "cedula valida";
}
else{
    echo "error";
}
*/
/*
if($objeto->Obtener_Datos('padronp','identificacion','1400962344',$conexion)['id']>0){
    echo $objeto->Obtener_Datos('padronp','identificacion','1400962344',$conexion);
}
else{
    echo 'error';
}*/
//$datos= $objeto->datos_id_usuario(2,$conexion);
//echo $datos['id'];
$cedulas= array("1400412001",
"1401076409",
"1401459225",
"1401074172",
"1401070238",
"1401005879",
"1400396030",
"1400536692",
"1400535009",
"1400534606",
"1400390702",
"1400515951",
"1400064893",
"1400436505",
"1400515803",
"1400103261",
"1450106776",
"1400450993",
"1400753438",
"1400590707",
"0706621687",
"1400520860",
"1400352884",
"1400479125",
"1400728497",
"1400049852",
"1401078470",
"1400019525",
"1400771372",
"1401073208",
"1400687933",
"1400771331",
"1400752125",
"1400391080",
"1400441554",
"1400376503",
"1401073216",
"1401074354",
"1400016216",
"1400852115",
"1401222359",
"1400362719",
"1400428270",
"1401001803",
"1401001795",
"1401285091",
"1401075625",
"1401073463",
"1400798110",
"1400346431",
"1400637888",
"1400020929",
"1400320162",
"1401163546",
"1400661060",
"1400752588",
"1400716930",
"1400685978",
"1400203632",
"0901526186",
"1400664080",
"1400318885",
"1400790877",
"1900263821",
"1400020051",
"1401076912",
"1400646129",
"1400048482",
"1400696199",
"1400448237",
"1400249551",
"1400406276",
"1401073299",
"1400484307",
"1400306104",
"1400721641",
"1400679534",
"1400593875",
"1400567077",
"1400567093",
"1401075104",
"1400119341",
"1401077795",
"1400591499",
"1400023527",
"1400951594",
"1401073992",
"1400479794",
"0704330422",
"1400099535",
"1400379085",
"1401077977",
"1401077951",
"1401077969",
"1400045900",
"1400248827",
"1401078983",
"1401006000",
"1400391213",
"1400020077",
"1400942056",
"1450189251",
"1400817399",
"1400776272",
"1401074867",
"1002851200",
"1401077266",
"1401072648",
"1400381024",
"1400475669",
"1401073661",
"1401073679",
"1401073497",
"1400796916",
"1401077381",
"1400228613",
"1400349203",
"1400197768",
"1400168603",
"1400973036",
"1400015739",
"1400515415",
"1400485296",
"1400891691",
"1401071103",
"1401073224",
"1400838213",
"1400100910",
"1401001936",
"1401077225",
"1400772040",
"1400301907",
"1400777031",
"1400444871",
"1400319107",
"1400353270",
"1400346415",
"1400592927",
"1400562748",
"1400281695",
"1400380315",
"1400293377",
"1401078207",
"1401078355",
"1401073471",
"1400692628",
"1401071301",
"1400618748",
"1400579981",
"1400338974",
"1401072549",
"1401075245",
"1401076201",
"1400814065",
"1400783260",
"0101116028");
//$objeto->select_canton_usuario('parroquia',2,$conexion);
//$objeto->obtener_lista('padronp',$cedulas,$conexion);
//echo $objeto->guardar_adherente('prueba','1401089634',1,1,1,$conexion);
//echo $objeto->actualizar_adherente('1400962344','ANTUNI TANDU JUAN GABRIEL',53,1,1,$conexion);
//echo $objeto->obterner_clave($conexion)['genera'];
?>
