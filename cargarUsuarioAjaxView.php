<?php 
include_once("../models/conexion.php");
include_once("../models/claseGeneral.php");
$persona_id = $_REQUEST['persona_id'];
$objeto= new Persona();
$datos=$objeto->datos_usuario($persona_id,$conexion);
$persona = $objeto->Obtener_Datos('padronp FORCE INDEX (padronp_un)','id',$datos['persona_Id'],$conexion);
$usuario=$objeto->Obtener_Datos('usuario','persona_Id',$datos['persona_Id'],$conexion);

$parroquia= $objeto->Obtener_Datos('parroquia','id',$persona['parroquia_id'],$conexion);
$canton = $objeto->Obtener_Datos('canton','id',$parroquia['canton_id'],$conexion);
?>
    
    <form>													
        <div class="col-xs-12 col-sm-12">
            
                <div class="col-xs-3">
                    <img id="avatar" class="editable img-responsive" src="<?php echo $usuario['foto'];?>" />

                </div>
            
            <div class="col-xs-9">
                <label>Cedula</label>

                <div>
                    <input id="identificacion" class="col-xs-12 col-sm-12 form-control" type="text"  value="<?php echo $datos['identificacion'] ?>" />
                </div>
            </div>
            <br><br>
            <div class="col-xs-9">
                <label>Apellidos Nombres</label>
                <div>
                    <input id="apellido_nombre" class="col-xs-12 col-sm-12"  type="text" id="" placeholder="" value="<?php echo $datos['apellido_nombre'] ?>"  />
                </div>
            </div>
            <br><br>
            <div class="col-xs-9">
                <label>Sexo</label>

                <div>
                    <input id="sexo" class="col-xs-12 col-sm-12"  type="text" id="" placeholder="" value="<?php if( $datos['sexo_id']==1){echo "HOMBRE"; }else{echo"MUJER";} ?>" />
                </div>
            </div>
            <br><br>
            
            <div class="col-xs-12">
                <label >Fecha Registro</label>

                <div>
                    <input id="fecha" class="col-xs-12 col-sm-12" type="text" id=""  value="<?php echo $usuario['fecha_ingreso'] ?>" />
                </div>
            </div class="col-xs-12">
            <br><br>
            <div class="col-xs-12">
                <label>Usuario</label>

                <div>
                    <input id="usuario" class="col-xs-12 col-sm-12"  type="text" id="" placeholder="" value="<?php echo $usuario['username'] ?>"/>
                </div>
            </div>
            <br><br>
            <div class="col-xs-12">
                <label>Cantón</label>

                <div>
                    <input id="canton" class="col-xs-12 col-sm-12"  type="text" id="" placeholder="" value="<?php echo $canton['nombre'] ?>"/>
                </div>
            </div>
            <br><br>
            <div class="col-xs-12">
                <label>Parroquia</label>

                <div>
                    <input  id="parroquia" class="col-xs-12 col-sm-12"  type="text" id="" placeholder="" value="<?php echo $parroquia['nombre'] ?>"/>
                </div>
            </div>
        </div>
    </form>