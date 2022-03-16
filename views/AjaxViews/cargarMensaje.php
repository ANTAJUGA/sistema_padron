<?php
error_reporting(0);
if ($_GET['estado'] === 'guardado') {
?>
    <div class="alert alert-success alert-dismissable">
        <button onclick="window.location.href='adherenteView.php'" type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times"></i>
        </button>
        <strong>Éxito</strong> Registro Adherente Guardado
    </div>
<?php
} else if ($_GET['estado'] === 'actualizado') {
?>
    <div class="alert alert-success alert-dismissable">
        <button <button onclick="window.location.href='adherenteView.php'" type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times"></i>
        </button>
        <strong>Éxito</strong> Registro Adherente Actualizado
    </div>
<?php
} else if ($_GET['estado'] === 'error') {
?>
    <div class="alert alert-danger">
        <i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
        <strong>Error del Sistema:</strong> para mayor informacion contacte con el administrador lo antes posible.        
        <button <button onclick=" window.location.href='adherenteView.php'"  class=" close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
    </div>
<?php
} else if ($_GET['estado'] === 'error_clave') {
?>
    <div class="alert alert-danger">
        <i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
            <strong>Error del Sistema:</strong> La clave usuario incorrecta, recuerde que cada 24 horas la clave cambia, para mayor información contacte con el administrador.        
            <button <button onclick=" window.location.href='adherenteView.php'"  class=" close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
    </div>
<?php
} else if ($_GET['estado'] === 'modificado') {
?>
    <div class="alert alert-danger">
        <i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
            <strong>Error del Sistema:</strong> El regitro ya fue modificado con anterioridad, para mayor información contacte con el administrador.        
            <button <button onclick=" window.location.href='adherenteView.php'"  class=" close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
    </div>
<?php
}
?>