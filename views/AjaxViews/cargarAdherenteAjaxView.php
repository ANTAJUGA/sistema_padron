<?php
error_reporting(0);
include_once("../../models/conexion.php");
include_once("../../models/claseGeneral.php");
$limpiar = mysqli_real_escape_string($conexion, trim($_REQUEST['busqueda']));
$usuario_creacion = $_REQUEST['usuario_creacion'];
$buscar_padron = $limpiar;

$objeto = new Persona();
$boleano = new ValidarIdentificacion();

$persona = $objeto->Obtener_Datos('padronp FORCE INDEX (padronp_un)', 'identificacion', $buscar_padron, $conexion);

//echo $buscar_padron; 
if ($boleano->validarCedula($buscar_padron) > 0) {
    if ($persona['id'] < 1) {
        $usuario_c = $objeto->datos_id_usuario($usuario_creacion, $conexion);
        $parroquia = $objeto->Obtener_Datos('parroquia FORCE INDEX (PRIMARY)', 'id', $persona['parroquia_id'], $conexion);
        $canton = $objeto->Obtener_Datos('canton FORCE INDEX (PRIMARY)', 'id', $parroquia['canton_id'], $conexion);
        $sexo = $objeto->Obtener_Datos('sexo FORCE INDEX (PRIMARY)', 'id', $persona['sexo_id'], $conexion);
?>
        <script>
            //PARA ACTIVIAR EL BOTON GUARDAR SI SE ENCUENTRA UN DATO
            $("#guardar").prop('disabled', false);
        </script>
        <div>
            <div>
                <label>Apellidos </label>
                <div>
                    <input class="col-xs-12 col-sm-12 center" type="text" name="apellidos" id="apellidos" placeholder="" value="" onkeyup="javascript:this.value=this.value.toUpperCase()" required />
                </div>
            </div>
            <br><br>
            <div>
                <label>Nombres </label>
                <div>
                    <input class="col-xs-12 col-sm-12 center" type="text" name="nombres" id="nombres" placeholder="" value="" onkeyup="javascript:this.value=this.value.toUpperCase()" required />
                </div>
            </div>
            <br><br>
            <div>
                <label>Cantón</label>
                <div>
                    <input class="col-xs-12 col-sm-12 center" type="text" id="" placeholder="" value="<?php echo $usuario_c['nombre'] ?>" readonly />
                </div>
            </div>
            <br><br>
            <div>
                <label>Parroquia</label>
                <div>
                    <?php $objeto->select_datos('parroquia', 'parroquia_id', $conexion) ?>
                </div>
            </div>
            <br><br>
            <div>
                <label>Sexo</label>
                <div>
                    <?php $objeto->select_datos('sexo', 'sexo_id', $conexion) ?>
                </div>
            </div>
            <br><br>

        </div>
    <?php
    } else if ($persona['id'] > 0) {
    ?>
    <script>
            //PARA ACTIVIAR EL BOTON GUARDAR SI SE ENCUENTRA UN DATO
            $("#guardar").prop('disabled', false);
        </script>
        <div class="alert alert-warning">
            <i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
            El adeherente ya existe, para mayor informacion contacte con el administrador.        
            <button class=" close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
                </button>
        </div>
        <div>
            <div>
                <label>Apellidos Nombres </label>
                <div>
                    <input class="col-xs-12 col-sm-12 center" type="text" name="apellidos" id="apellidos" placeholder="" value="<?php echo $persona['apellido_nombre'] ?>" onkeyup="javascript:this.value=this.value.toUpperCase()" required />
                </div>
            </div>
            <br><br>
            <div>
                <label>Cantón</label>
                <div>
                    <?php $objeto->select_datos_js('canton','canton_id','recargarParroquia()',$conexion); ?>
                </div>
            </div>
            <br><br>
            <div>
                <label>Parroquia</label>
                <div id="parroquia">
                    <?php $objeto->select_datos('','',''); ?>
                </div>
            </div>
            <br><br>
            <div>
                <label>Sexo</label>
                <div>
                    <?php $objeto->select_datos('sexo', 'sexo_id', $conexion) ?>
                </div>
            </div>
            <br><br>
            <div>
                <label>Clave de Administrador </label>
                <div>
                    <input class="col-xs-12 col-sm-12 center" type="password" name="clave" id="clave" placeholder="" value="" required />
                </div>
            </div>

        </div>
    <?php
    }
} else {
    ?>
    <div class="alert alert-danger">
        <i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
        Error: cedula No es válida para el registro        
        <button class=" close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
    </div>
<?php
}
?>