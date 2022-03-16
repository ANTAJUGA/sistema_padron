<?php 
include_once('constantes.php');
class Persona{
    //PARA GUARDAR CON LOS DATOS EN EL SERVIDOR MENOS 5 HORAS
    //UPDATE reflinki_padron.usuario SET persona_Id=1, username='aguila', fecha_modifica=DATE_SUB(NOW(),INTERVAL 5 HOUR) WHERE id=2;
    //VERIFICAR USUARIO

    function sesion_usuario($usuario,$clave,$conexion) {//funcion para verificar usuario repetidos
        $consulta = "SELECT * FROM usuario where username='$usuario' and password='$clave' and activo=".Constantes::ESTADO_ACTIVO." and eliminado=".Constantes::ESTADO_ELIMINADO;
        $resultado = mysqli_query($conexion, $consulta);
        return mysqli_num_rows($resultado); //retornamos un valor  
    }

    function fila_usuario($usuario,$clave,$conexion) {//funcion para obtener datos de un usuario espcifico
        $consulta = "SELECT * FROM usuario where username='$usuario' and password='$clave' and activo=1 and eliminado=1";
        $resultado = mysqli_query($conexion, $consulta);
        $datos = mysqli_fetch_assoc($resultado);
        return $datos;
    }
    //guardar usuario
    function guardar_Usuario($persona_Id,$username,$password,$tipo_usuario,$usuario_creacion,$conexion){
        $query="INSERT INTO usuario (persona_Id, username, password, fecha_ingreso, tipo_usuario, usuario_creacion, activo, eliminado) 
                                                VALUES($persona_Id, '$username', '$password', DATE_SUB(NOW(),INTERVAL ".Constantes::HORA_EC." HOUR),$tipo_usuario, $usuario_creacion,".Constantes::ESTADO_ACTIVO." , ".Constantes::ESTADO_ELIMINADO.")";
        $resultado = mysqli_query($conexion, $query);
        return $resultado;
    }
    //guardar adherente
    function guardar_adherente($apellido_nombre,$identificacion,$parroquia_id,$sexo_id,$usuario_creacion,$conexion){
        $query="INSERT INTO padronp(apellido_nombre,identificacion,parroquia_id,sexo_id,fecha_ingreso,usuario_creacion,activo,eliminado)VALUES('$apellido_nombre','$identificacion',$parroquia_id,$sexo_id,DATE_SUB(NOW(),INTERVAL ".Constantes::HORA_EC." HOUR),$usuario_creacion,".Constantes::ESTADO_ACTIVO." , ".Constantes::ESTADO_ELIMINADO.")";
        $resultado = mysqli_query($conexion, $query);
        return $resultado;
    }
    //actualizar adherente
    function actualizar_adherente($identificacion,$apellido_nombre,$parroquia_id,$sexo_id,$usuario_modificacion,$conexion){
        $query ="UPDATE padronp set apellido_nombre ='$apellido_nombre',parroquia_id=$parroquia_id,sexo_id=$sexo_id,usuario_modificacion=$usuario_modificacion,fecha_modifica = DATE_SUB(NOW(),INTERVAL ".Constantes::HORA_EC." HOUR) WHERE identificacion='$identificacion'";
        $resultado = mysqli_query($conexion, $query);
        return $resultado;
    }
    //Mostrar datos totales
    function Obtener_Datos($tabla, $CampoConsulta, $dato, $conexion)
    {
        $query = "SELECT * from $tabla where $CampoConsulta=$dato";

        $resultado = $conexion->query($query, MYSQLI_USE_RESULT);
        $datos = mysqli_fetch_assoc($resultado);

        return $datos;
    }
    //obtener clave or fecha
    function obterner_clave($conexion){
        $query="SELECT DATE_FORMAT(fecha,'%Y-%m-%d') AS fecha,genera from claves where fecha=DATE_FORMAT( DATE_SUB(NOW(),INTERVAL 5 HOUR),'%Y-%m-%d')";
        $resultado = $conexion->query($query, MYSQLI_USE_RESULT);
        $datos = mysqli_fetch_assoc($resultado);
        return $datos;
    }
    //obtener datos de una lista concreta
    function obtener_lista($tabla,$lista,$conexion){
        for($i=0;$i < count($lista); $i++){
            $query = "SELECT * from $tabla FORCE INDEX (PRIMARY) where identificacion= '$lista[$i]'";
            $resultado = mysqli_query($conexion, $query);
            $datos = mysqli_fetch_assoc($resultado);
            $c=$i+1;
            echo $c.'->'. $datos['apellido_nombre'].' '.$datos['parroquia_id'].' <br/>';
        }
    }
    //mostrar numero de datos
    
    function Obtener_Numero_Datos($tabla, $CampoConsulta, $dato, $conexion)
    {
        $query = "SELECT * from $tabla where $CampoConsulta=$dato";
        $resultado = mysqli_query($conexion, $query);
        return mysqli_num_rows($resultado);
    }
    //mostrar tabla de usuarios
    function tabla_usuario($conexion){
        $objeto= new Persona();
        $consulta="SELECT * from padronp p FORCE INDEX (PRIMARY) inner join usuario u on p.id = u.persona_id 
                                           inner join parroquia pa on pa.id = p.parroquia_id 
                                           inner join canton c on c.id =pa.canton_id";
        $resultado= mysqli_query($conexion,$consulta);
            ?>
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Apellidos Nombres</th>
                            <th>Usuario</th>
                            <th>Estado Usuario</th>
                            <th>Estado Sistema</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($datos = mysqli_fetch_assoc($resultado)){
                            //$parroquia = $objeto->Obtener_Datos('parroquia','id',$datos['parroquia_id'],$conexion);
                            //$canton = $objeto->Obtener_Datos('canton','id',$datos['canton_id'],$conexion);
                            $usuario=$objeto->Obtener_Datos('usuario FORCE INDEX (PRIMARY)','persona_Id',$datos['persona_Id'],$conexion);
                        ?>
                        <tr>
                            <td>
                                <?php echo $datos['persona_Id'] ?>
                            </td>
                            <td>
                            <?php if( $usuario['tipo_usuario']==1){?> ADMINISTRADOR <i class="fa fa-flag blue bigger-130"></i>
                                <?php }else{?>DIGITADOR <i class="fa fa-flag orange bigger-130"></i> <?php }  ?>
                            </td>
                            <td>
                                <?php echo $datos['username'] ?>
                            </td>
                            <td>
                                <?php if( $usuario['activo']==1){?> <span class="label label-success arrowed">ACTIVO</span> 
                                <?php }else{?> <span class="label label-warning arrowed">DESACTIVO</span> <?php }  ?>	
                            </td>
                            <td>
                                <?php if( $usuario['eliminado']==1){?> <span class="label label-success arrowed">DISPONIBLE</span> 
                                <?php }else{?> <span class="label label-danger arrowed">ELIMINADO</span> <?php }  ?>	
                            </td>
                            <td>
                            <div class="btn-group">
                                    <button class="btn btn-xs">
                                        <a onclick="abrirModal(<?php echo $datos['persona_Id']?>),limpiar()"><i class="ace-icon fa fa-eye bigger-120"></i></a>
                                    </button>

                                    <button class="btn btn-xs btn-success">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </button>

                                    <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                </table>

            <?php
        $conexion->close();
    }
    function tabla_padron($conexion){
        $objeto= new Persona();
                    $consulta="SELECT id ,
                                      eliminado,
                                      usuario_creacion,
                                      usuario_modificacion,
                                      parroquia_id ,
                                      identificacion, 
                                      apellido_nombre ,
                                      fecha_ingreso,
                                      fecha_modifica 
                                      from padronp FORCE INDEX (PRIMARY) ORDER BY id desc limit 15";
        $resultado= mysqli_query($conexion,$consulta);
            ?>
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Apellidos Nombres</th>
                            <th>Identificacion</th>
                            <th>Cantón</th>
                            <th>Parroquia</th>
                            <th>Fecha Registro</th>
                            <th>Usuario Registro</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <th>Estado Sistema</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($datos = mysqli_fetch_assoc($resultado)){
                            $parroquia = $objeto->Obtener_Datos('parroquia FORCE INDEX (PRIMARY)','id',$datos['parroquia_id'],$conexion);
                            $canton = $objeto->Obtener_Datos('canton FORCE INDEX (PRIMARY)','id',$parroquia['canton_id'],$conexion);
                            $usuario = $objeto->Obtener_Datos('usuario FORCE INDEX (PRIMARY)','id',$datos['usuario_creacion'],$conexion);
                            $usuario_m=$objeto->Obtener_Datos('usuario FORCE INDEX (PRIMARY)','id',$datos['usuario_modificacion'],$conexion);
                        ?>
                        <tr>
                            <td>
                                <?php echo $datos['id'] ?>
                            </td>
                            <td>
                            <?php  echo $datos['apellido_nombre']  ?>
                            </td>
                            <td>
                                <?php echo $datos['identificacion'] ?>
                            </td>
                            <td>
                                <?php echo $canton['nombre'] ?>	
                            </td>
                            <td>
                                <?php echo $parroquia['nombre'] ?>	
                            </td>
                            <td>
                                <?php echo $datos['fecha_ingreso'] ?>	
                            </td>
                            <td>
                                <?php echo $usuario['username'] ?>	
                            </td>
                            <td>
                                <?php echo $datos['fecha_modifica'] ?>	
                            </td>
                            <td>
                                <?php echo $usuario_m['username'] ?>	
                            </td>
                            <td>
                                <?php if( $datos['eliminado']==1){?> <span class="label label-success arrowed">DISPONIBLE</span> 
                                <?php }else{?> <span class="label label-danger arrowed">ELIMINADO</span> <?php }  ?>	
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                </table>

            <?php
        $conexion->close();
    }
    //tabla por usuario de canton
    function tabla_padron_canton($usuario_creacion,$conexion){
        $objeto= new Persona();
                    $consulta="SELECT id ,
                                      eliminado,
                                      usuario_creacion,
                                      usuario_modificacion,
                                      parroquia_id ,
                                      identificacion, 
                                      apellido_nombre ,
                                      fecha_ingreso,
                                      fecha_modifica 
                                      from padronp FORCE INDEX (PRIMARY) where usuario_creacion = $usuario_creacion ORDER BY id desc limit 15";
        $resultado= mysqli_query($conexion,$consulta);
            ?>
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Apellidos Nombres</th>
                            <th>Identificacion</th>
                            <th>Cantón</th>
                            <th>Parroquia</th>
                            <th>Fecha Registro</th>
                            <th>Usuario Registro</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <th>Estado Sistema</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($datos = mysqli_fetch_assoc($resultado)){
                            $parroquia = $objeto->Obtener_Datos('parroquia FORCE INDEX (PRIMARY)','id',$datos['parroquia_id'],$conexion);
                            $canton = $objeto->Obtener_Datos('canton FORCE INDEX (PRIMARY)','id',$parroquia['canton_id'],$conexion);
                            $usuario = $objeto->Obtener_Datos('usuario FORCE INDEX (PRIMARY)','id',$datos['usuario_creacion'],$conexion);
                            $usuario_m=$objeto->Obtener_Datos('usuario FORCE INDEX (PRIMARY)','id',$datos['usuario_modificacion'],$conexion);
                        ?>
                        <tr>
                            <td>
                                <?php echo $datos['id'] ?>
                            </td>
                            <td>
                            <?php  echo $datos['apellido_nombre']  ?>
                            </td>
                            <td>
                                <?php echo $datos['identificacion'] ?>
                            </td>
                            <td>
                                <?php echo $canton['nombre'] ?>	
                            </td>
                            <td>
                                <?php echo $parroquia['nombre'] ?>	
                            </td>
                            <td>
                                <?php echo $datos['fecha_ingreso'] ?>	
                            </td>
                            <td>
                                <?php echo $usuario['username'] ?>	
                            </td>
                            <td>
                                <?php echo $datos['fecha_modifica'] ?>	
                            </td>
                            <td>
                                <?php echo $usuario_m['username'] ?>	
                            </td>
                            <td>
                                <?php if( $datos['eliminado']==1){?> <span class="label label-success arrowed">DISPONIBLE</span> 
                                <?php }else{?> <span class="label label-danger arrowed">ELIMINADO</span> <?php }  ?>	
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                </table>

            <?php
        $conexion->close();
    }
    //mostrar los select de cada tabla
    function select_datos($tabla,$name, $conexion){
        $query = "SELECT * from  $tabla FORCE INDEX (PRIMARY)";
        $resultado = mysqli_query($conexion, $query);
        ?> 
        <select class="col-xs-12 col-sm-12 center" id="<?php echo $name?>" name="<?php echo $name ?>" required>
        <option value="" selected disabled>ELIJA OPCION...</option>
            <?php
            while ($datos = mysqli_fetch_assoc($resultado)){    
            ?>
                <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php 
            }
            ?>                     
        </select>
        <?php 
    }
    function select_datos_js($tabla,$name,$eventJs, $conexion){
        $query = "SELECT * from  $tabla FORCE INDEX (PRIMARY)";
        $resultado = mysqli_query($conexion, $query);
        ?> 
        <select class="col-xs-12 col-sm-12 center" onclick="<?php echo $eventJs ?>" id="<?php echo $name?>" name="<?php echo $name ?>" required>
        <option value="" selected disabled>ELIJA OPCION...</option>
            <?php
            while ($datos = mysqli_fetch_assoc($resultado)){    
            ?>
                <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php 
            }
            ?>                     
        </select>
        <?php 
    }
    //tablas por canton del usuario
    function select_canton_usuario($tabla,$canton_id, $conexion){
        $query = "SELECT * from $tabla FORCE INDEX (PRIMARY)  where canton_id=$canton_id";
        $resultado = mysqli_query($conexion, $query);
        ?> 
        <select class="col-xs-12 col-sm-12 center" id="parroquia_id" name="parroquia_id" required>
            <option value="" selected disabled>ELIJA OPCION...</option>
            <?php
            while ($datos = mysqli_fetch_assoc($resultado)){    
            ?>
                <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php 
            }
            ?>                     
        </select>
        <?php 
    }

    //obtener todos lo datos de usuario por Id de la persona
    function datos_usuario($id,$conexion){
        $objeto= new Persona();
        $consulta="SELECT * from padronp p FORCE INDEX (PRIMARY) inner join usuario u on p.id = u.persona_id 
                                           inner join parroquia pa on pa.id = p.parroquia_id 
                                           inner join canton c on c.id =pa.canton_id
                                           where p.id=$id";
        $resultado= mysqli_query($conexion,$consulta);
        $datos = mysqli_fetch_assoc($resultado);
        return $datos;
    }
    //obntener datos Usuario por su id
    function datos_id_usuario($id,$conexion){
        $objeto= new Persona();
        $consulta="SELECT * from padronp p FORCE INDEX (PRIMARY) inner join usuario u on p.id = u.persona_id 
                                           inner join parroquia pa on pa.id = p.parroquia_id 
                                           inner join canton c on c.id =pa.canton_id
                                           where u.id=$id";
        $resultado= mysqli_query($conexion,$consulta);
        $datos = mysqli_fetch_assoc($resultado);
        return $datos;
    }
    //obterner el la modificacion del adherente
    function datos_modifica($conexion,$identificacion){
        $query="SELECT usuario_modificacion from padronp FORCE INDEX (PRIMARY) where identificacion=$identificacion";
        $resultado = $conexion->query($query, MYSQLI_USE_RESULT);
        $datos = mysqli_fetch_assoc($resultado);
        return $datos['usuario_modificacion'];
    }
    //obtener fecha de servidor
    function obtener_hora($conexion){
        //$query="SELECT DATE_FORMAT( DATE_SUB(NOW(),INTERVAL 5 HOUR) ,'%H:%i:%S') as hora";
        $query ="SELECT DATE_FORMAT(now(),'%H:%i:%s') as hora";
        $resultado = mysqli_query($conexion, $query);
        $datos = mysqli_fetch_assoc($resultado);
        return $datos['hora'];
    }    
}

class ValidarIdentificacion
{

    /**
     * Error
     *
     * Contiene errores globales de la clase
     *
     * @var string
     * @access protected
     */
    protected $error = '';

    /**
     * Validar cédula
     *
     * @param  string  $numero  Número de cédula
     *
     * @return Boolean
     */
    public function validarCedula($numero = '')
    {
        // fuerzo parametro de entrada a string
        $numero = (string)$numero;

        // borro por si acaso errores de llamadas anteriores.
        $this->setError('');

        // validaciones
        try {
            $this->validarInicial($numero, '10');
            $this->validarCodigoProvincia(substr($numero, 0, 2));
            $this->validarTercerDigito($numero[2], 'cedula');
            $this->algoritmoModulo10(substr($numero, 0, 9), $numero[9]);
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Validar RUC persona natural
     *
     * @param  string  $numero  Número de RUC persona natural
     *
     * @return Boolean
     */
    public function validarRucPersonaNatural($numero = '')
    {
        // fuerzo parametro de entrada a string
        $numero = (string)$numero;

        // borro por si acaso errores de llamadas anteriores.
        $this->setError('');

        // validaciones
        try {
            $this->validarInicial($numero, '13');
            $this->validarCodigoProvincia(substr($numero, 0, 2));
            $this->validarTercerDigito($numero[2], 'ruc_natural');
            $this->validarCodigoEstablecimiento(substr($numero, 10, 3));
            $this->algoritmoModulo10(substr($numero, 0, 9), $numero[9]);
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }

        return true;
    }


    /**
     * Validar RUC sociedad privada
     *
     * @param  string  $numero  Número de RUC sociedad privada
     *
     * @return Boolean
     */
    public function validarRucSociedadPrivada($numero = '')
    {
        // fuerzo parametro de entrada a string
        $numero = (string)$numero;

        // borro por si acaso errores de llamadas anteriores.
        $this->setError('');

        // validaciones
        try {
            $this->validarInicial($numero, '13');
            $this->validarCodigoProvincia(substr($numero, 0, 2));
            $this->validarTercerDigito($numero[2], 'ruc_privada');
            $this->validarCodigoEstablecimiento(substr($numero, 10, 3));
            $this->algoritmoModulo11(substr($numero, 0, 9), $numero[9], 'ruc_privada');
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Validar RUC sociedad publica
     *
     * @param  string  $numero  Número de RUC sociedad publica
     *
     * @return Boolean
     */
    public function validarRucSociedadPublica($numero = '')
    {
        // fuerzo parametro de entrada a string
        $numero = (string)$numero;

        // borro por si acaso errores de llamadas anteriores.
        $this->setError('');

        // validaciones
        try {
            $this->validarInicial($numero, '13');
            $this->validarCodigoProvincia(substr($numero, 0, 2));
            $this->validarTercerDigito($numero[2], 'ruc_publica');
            $this->validarCodigoEstablecimiento(substr($numero, 9, 4));
            $this->algoritmoModulo11(substr($numero, 0, 8), $numero[8], 'ruc_publica');
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Validaciones iniciales para CI y RUC
     *
     * @param  string  $numero      CI o RUC
     * @param  integer $caracteres  Cantidad de caracteres requeridos
     *
     * @return Boolean
     *
     * @throws exception Cuando valor esta vacio, cuando no es dígito y
     * cuando no tiene cantidad requerida de caracteres
     */
    protected function validarInicial($numero, $caracteres)
    {
        if (empty($numero)) {
            throw new Exception('Valor no puede estar vacio');
        }

        if (!ctype_digit($numero)) {
            throw new Exception('Valor ingresado solo puede tener dígitos');
        }

        if (strlen($numero) != $caracteres) {
            throw new Exception('Valor ingresado debe tener '.$caracteres.' caracteres');
        }

        return true;
    }

    /**
     * Validación de código de provincia (dos primeros dígitos de CI/RUC)
     *
     * @param  string  $numero  Dos primeros dígitos de CI/RUC
     *
     * @return boolean
     *
     * @throws exception Cuando el código de provincia no esta entre 00 y 24
     */
    protected function validarCodigoProvincia($numero)
    {
        if ($numero < 0 OR $numero > 24) {
            throw new Exception('Codigo de Provincia (dos primeros dígitos) no deben ser mayor a 24 ni menores a 0');
        }

        return true;
    }

    /**
     * Validación de tercer dígito
     *
     * Permite validad el tercer dígito del documento. Dependiendo
     * del campo tipo (tipo de identificación) se realizan las validaciones.
     * Los posibles valores del campo tipo son: cedula, ruc_natural, ruc_privada
     *
     * Para Cédulas y RUC de personas naturales el terder dígito debe
     * estar entre 0 y 5 (0,1,2,3,4,5)
     *
     * Para RUC de sociedades privadas el terder dígito debe ser
     * igual a 9.
     *
     * Para RUC de sociedades públicas el terder dígito debe ser 
     * igual a 6.
     *
     * @param  string $numero  tercer dígito de CI/RUC
     * @param  string $tipo  tipo de identificador
     *
     * @return boolean
     *
     * @throws exception Cuando el tercer digito no es válido. El mensaje
     * de error depende del tipo de Idenficiación.
     */
    protected function validarTercerDigito($numero, $tipo)
    {
        switch ($tipo) {
            case 'cedula':
            case 'ruc_natural':
                if ($numero < 0 OR $numero > 5) {
                    throw new Exception('Tercer dígito debe ser mayor o igual a 0 y menor a 6 para cédulas y RUC de persona natural');
                }
                break;
            case 'ruc_privada':
                if ($numero != 9) {
                    throw new Exception('Tercer dígito debe ser igual a 9 para sociedades privadas');
                }
                break;

            case 'ruc_publica':
                if ($numero != 6) {
                    throw new Exception('Tercer dígito debe ser igual a 6 para sociedades públicas');
                }
                break;
            default:
                throw new Exception('Tipo de Identificación no existe.');
                break;
        }

        return true;
    }

    /**
     * Validación de código de establecimiento
     *
     * @param  string $numero  tercer dígito de CI/RUC
     *
     * @return boolean
     *
     * @throws exception Cuando el establecimiento es menor a 1
     */
    protected function validarCodigoEstablecimiento($numero)
    {
        if ($numero < 1) {
            throw new Exception('Código de establecimiento no puede ser 0');
        }

        return true;
    }

    /**
     * Algoritmo Modulo10 para validar si CI y RUC de persona natural son válidos.
     *
     * Los coeficientes usados para verificar el décimo dígito de la cédula,
     * mediante el algoritmo “Módulo 10” son:  2. 1. 2. 1. 2. 1. 2. 1. 2
     *
     * Paso 1: Multiplicar cada dígito de los digitosIniciales por su respectivo
     * coeficiente.
     *
     *  Ejemplo
     *  digitosIniciales posicion 1  x 2
     *  digitosIniciales posicion 2  x 1
     *  digitosIniciales posicion 3  x 2
     *  digitosIniciales posicion 4  x 1
     *  digitosIniciales posicion 5  x 2
     *  digitosIniciales posicion 6  x 1
     *  digitosIniciales posicion 7  x 2
     *  digitosIniciales posicion 8  x 1
     *  digitosIniciales posicion 9  x 2
     *
     * Paso 2: Sí alguno de los resultados de cada multiplicación es mayor a o igual a 10,
     * se suma entre ambos dígitos de dicho resultado. Ex. 12->1+2->3
     *
     * Paso 3: Se suman los resultados y se obtiene total
     *
     * Paso 4: Divido total para 10, se guarda residuo. Se resta 10 menos el residuo.
     * El valor obtenido debe concordar con el digitoVerificador
     *
     * Nota: Cuando el residuo es cero(0) el dígito verificador debe ser 0.
     *
     * @param  string $digitosIniciales   Nueve primeros dígitos de CI/RUC
     * @param  string $digitoVerificador  Décimo dígito de CI/RUC
     *
     * @return boolean
     *
     * @throws exception Cuando los digitosIniciales no concuerdan contra
     * el código verificador.
     */
    protected function algoritmoModulo10($digitosIniciales, $digitoVerificador)
    {
        $arrayCoeficientes = array(2,1,2,1,2,1,2,1,2);

        $digitoVerificador = (int)$digitoVerificador;
        $digitosIniciales = str_split($digitosIniciales);

        $total = 0;
        foreach ($digitosIniciales as $key => $value) {

            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );

            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int)$valorPosicion;
            }

            $total = $total + $valorPosicion;
        }

        $residuo =  $total % 10;

        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 10 - $residuo;
        }

        if ($resultado != $digitoVerificador) {
            throw new Exception('Dígitos iniciales no validan contra Dígito Idenficador');
        }

        return true;
    }

    /**
     * Algoritmo Modulo11 para validar RUC de sociedades privadas y públicas
     *
     * El código verificador es el decimo digito para RUC de empresas privadas
     * y el noveno dígito para RUC de empresas públicas
     *
     * Paso 1: Multiplicar cada dígito de los digitosIniciales por su respectivo
     * coeficiente.
     *
     * Para RUC privadas el coeficiente esta definido y se multiplica con las siguientes
     * posiciones del RUC:
     *
     *  Ejemplo
     *  digitosIniciales posicion 1  x 4
     *  digitosIniciales posicion 2  x 3
     *  digitosIniciales posicion 3  x 2
     *  digitosIniciales posicion 4  x 7
     *  digitosIniciales posicion 5  x 6
     *  digitosIniciales posicion 6  x 5
     *  digitosIniciales posicion 7  x 4
     *  digitosIniciales posicion 8  x 3
     *  digitosIniciales posicion 9  x 2
     *
     * Para RUC privadas el coeficiente esta definido y se multiplica con las siguientes
     * posiciones del RUC:
     *
     *  digitosIniciales posicion 1  x 3
     *  digitosIniciales posicion 2  x 2
     *  digitosIniciales posicion 3  x 7
     *  digitosIniciales posicion 4  x 6
     *  digitosIniciales posicion 5  x 5
     *  digitosIniciales posicion 6  x 4
     *  digitosIniciales posicion 7  x 3
     *  digitosIniciales posicion 8  x 2
     *
     * Paso 2: Se suman los resultados y se obtiene total
     *
     * Paso 3: Divido total para 11, se guarda residuo. Se resta 11 menos el residuo.
     * El valor obtenido debe concordar con el digitoVerificador
     *
     * Nota: Cuando el residuo es cero(0) el dígito verificador debe ser 0.
     *
     * @param  string $digitosIniciales   Nueve primeros dígitos de RUC
     * @param  string $digitoVerificador  Décimo dígito de RUC
     * @param  string $tipo Tipo de identificador
     *
     * @return boolean
     *
     * @throws exception Cuando los digitosIniciales no concuerdan contra
     * el código verificador.
     */
    protected function algoritmoModulo11($digitosIniciales, $digitoVerificador, $tipo)
    {
        switch ($tipo) {
            case 'ruc_privada':
                $arrayCoeficientes = array(4, 3, 2, 7, 6, 5, 4, 3, 2);
                break;
            case 'ruc_publica':
                $arrayCoeficientes = array(3, 2, 7, 6, 5, 4, 3, 2);
                break;
            default:
                throw new Exception('Tipo de Identificación no existe.');
                break;
        }

        $digitoVerificador = (int)$digitoVerificador;
        $digitosIniciales = str_split($digitosIniciales);

        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );
            $total = $total + $valorPosicion;
        }

        $residuo =  $total % 11;

        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 11 - $residuo;
        }

        if ($resultado != $digitoVerificador) {
            throw new Exception('Dígitos iniciales no validan contra Dígito Idenficador');
        }

        return true;
    }

    /**
     * Get error
     *
     * @return string Mensaje de error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set error
     *
     * @param  string $newError
     * @return object $this
     */
    public function setError($newError)
    {
        $this->error = $newError;
        return $this;
    }
}
?>