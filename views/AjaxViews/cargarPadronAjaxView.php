<?php
error_reporting(0);
include_once("../../models/conexion.php");
include_once("../../models/claseGeneral.php");
$limpiar=mysqli_real_escape_string($conexion,trim($_REQUEST['buscar_padron']));
$buscar_padron=$limpiar;

$objeto= new Persona();
$persona = $objeto->Obtener_Datos('padronp FORCE INDEX (padronp_un)','identificacion',$buscar_padron,$conexion);
$usuario= $objeto->Obtener_Numero_Datos('usuario FORCE INDEX (PRIMARY)','persona_Id',$persona['id'],$conexion);
//echo $buscar_padron; 
if($persona['id']>0 and $usuario<1){

$parroquia = $objeto->Obtener_Datos('parroquia FORCE INDEX (PRIMARY)','id',$persona['parroquia_id'],$conexion);
$canton = $objeto->Obtener_Datos('canton FORCE INDEX (PRIMARY)','id',$parroquia['canton_id'],$conexion);
$sexo = $objeto->Obtener_Datos('sexo FORCE INDEX (PRIMARY)','id',$persona['sexo_id'],$conexion);
?>
<script>
    //PARA ACTIVIAR EL BOTON GUARDAR SI SE ENCUENTRA UN DATO
    //$("#guardar").prop('disabled', false); 
</script>
<div>
    <div>
        <label>Apellidos Nombres</label>
        <div>
            <input class="col-xs-12 col-sm-12 center"  type="text" id="" placeholder="" value="<?php echo $persona['apellido_nombre'] ?>" required/>
        </div>
    </div>
    <br><br>
    <div>
        <label>Cantón</label>
        <div>
            <input class="col-xs-12 col-sm-12 center"  type="text" id="" placeholder="" value="<?php echo $canton['nombre'] ?>" required/>
        </div>
    </div>
    <br><br>
    <div>
        <label >Parroquia</label>
        <div>
            <input class="col-xs-12 col-sm-12 center" type="text" id="" placeholder="" value="<?php echo $parroquia['nombre'] ?>" required/>
        </div>
    </div>
    <br><br>
    <div>
        <label>Sexo</label>
        <div>
            <input class="col-xs-12 col-sm-12 center"  type="text" id="" placeholder="" value="<?php echo $sexo['nombre'] ?>" required/>
        </div>
    </div>
    <br><br>
    <div class="center">
        <label >Estado Adherente</label>
        <?php if($persona['eliminado']>0){ ?>
            <span class="label label-success arrowed">DISPONIBLE</span>	
        <?php }else {?>
            <span class="label label-danger arrowed">ELIMINADO</span>	
            <?php }?>													
    </div>
    <div>
        <label>Tipo Usuario</label>
        <div>
            <select name="tipo_usuario" class="col-xs-12 col-sm-12 center">

                <!-- PARA MAYOR SEGURIDAD CREAR UNA TABLA -->
                    <option selected>ELIJA LA OPCION...</option>
                    <option value="1">ADMINISTRADOR</option>
                    <option value="2">DIGITADOR</option>
            </select>
        </div>
    </div>
    <br><br>
    <div>
        <label>Usuario</label>
        <div>
            <input class="col-xs-12 col-sm-12 center"  type="text" name="username" id="username" placeholder="" value="" required/>
        </div>
    </div>
    <br><br>
    <div>
        <label>Contraseña</label>
        <div>
            <input class="col-xs-12 col-sm-12 center"  type="password" name="password" id="password" placeholder="Contraseña" value="" onkeyup="comprobar();" required/>
        </div>
    </div>
    <br><br>
    <div>
        <label>Repita Contraseña</label>
        <div>
            <input class="col-xs-12 col-sm-12 center"  type="password" id="cfmpassword" placeholder="Contrasena" value="" onkeyup="comprobar();" required/>
        </div>
    </div>
    <br><br>
</div>
<?php
}
else if($usuario>0){
?> 
<div class="alert alert-warning">
        <i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
        El usuario ya existe, para mayor informacion contacte con el administrador.        
        <button class="close" data-dismiss="alert" >
            <i class="ace-icon fa fa-times"></i>
        </button>
    </div>
<?php 
} else if($padron<1 and $usuario<1){
?> 
<div class="alert alert-danger">
        <i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
        No existe datos, para mayor informacion contacte con el administrador.        
        <button class="close" data-dismiss="alert" >
            <i class="ace-icon fa fa-times"></i>
        </button>
    </div>
<?php 
}
?>
