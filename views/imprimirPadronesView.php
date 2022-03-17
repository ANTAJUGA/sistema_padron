<?php
include_once("../controllers/controladorSesion.php");
include_once("cabecera.php");
include_once("../models/conexion.php");
include_once("../models/claseGeneral.php");
$objeto = new Persona();
?>

<body class="no-skin">
    <?php
    include_once("template/navbar.php");
    ?>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <?php
        include_once("template/MenuDespegable.php");
        ?>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">


                </div>

                <div class="page-content">
                    <?php include_once("template/settings.php"); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-xs-3">
                                <span class="input-icon">
                                    <?php $objeto->select_datos_js('canton', 'canton_id','enviar_tabla()', $conexion) ?>
                                </span>
                            </div>
                        </div>
                        <br><br><br>
                        <div id="tabla_imprime" class="col-xs-12">
                            <?php
                            $objeto->tabla_imprime_padron($conexion,0);
                            ?>
                        </div>
                        <!-- FORMULARIO DEL MODAL -->

                        <!-- FORMULARIO DEL MODAL -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


    <script>
        //comprobar clave
        function comprobar() {
            pass1 = document.getElementById("password").value;
            pass2 = document.getElementById("cfmpassword").value;

            if (pass1 === pass2) {
                //desbloquea boton
                document.getElementById('guardar').disabled = false;


            } else {
                //bloquea boton
                document.getElementById('guardar').disabled = true;
                //$("#guardar").attr("hidden", true);
            }


        }

        function abrirModal(persona_id) {
            $("#ver").modal('show');
            //document.formulario.identificacion.value="";
            cargarUsuario(persona_id);
        }

        function cargarUsuario(persona_id) {
            $.ajax({
                type: 'POST',
                url: 'cargarUsuarioAjaxView.php',
                data: {
                    'persona_id': persona_id
                },
                success: function(data) {
                    $('#res').html(data);
                }
            });
        }

        function limpiar() {

            $('#apellido_nombre').val('');

        }

        function buscarPadron() {
            $.ajax({
                type: "POST",
                url: "AjaxViews/cargarPadronAjaxView.php", //ebviamos por post con un estatus
                data: "buscar_padron=" + $('input#buscar_padron').val(), //capturamos el dato del elemento
                success: function(r) {
                    $('#padron').html(r); //elemento donde se geenera el resultado 
                }
            });
        }

        function enviar_tabla() {
            $.ajax({
                type: "POST",
                url: "AjaxViews/cargarTablaPadronAjaxView.php", //ebviamos por post con un estatus
                data: "canton_id=" + $('#canton_id').val(), //capturamos el dato del elemento
                success: function(r) {
                    $('#tabla_imprime').html(r); //elemento donde se geenera el resultado 
                }
            });
        }
    </script>
    <?php
    include_once("pie.php");
    ?>
</body>

</html>