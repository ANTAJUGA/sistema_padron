<?php
$id = $_SESSION['id']; //importante
$persona_Id = $_SESSION['persona_Id']; //importante
$objeto = new Persona();
$usuario = $objeto->Obtener_Datos('padronp', 'id', $persona_Id, $conexion);
$avatar = $objeto->Obtener_Datos('usuario', 'id', $id, $conexion);
$avatar_parroquia=$objeto->Obtener_Datos('parroquia','id',$usuario['parroquia_id'],$conexion);
$avatar_canton=$objeto->Obtener_Datos('canton','id',$avatar_parroquia['canton_id'],$conexion);
?>
<div id="navbar" class="navbar navbar-default          ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<!-- boton toggle para mostrar el menu -->
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>
		<!-- texto de cabecera del instituto -->
		<div class="navbar-header pull-left">
			<a href="../views/inicio.php" class="navbar-brand">
				<small>
					<i class="glyphicon glyphicon-grain"></i>
					MUPP Listas - 18
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<!-- Perfil del bibliotecario -->
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="" />
						<span class="">
							<?php echo $usuario['apellido_nombre']; ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="perfilView.php">
								<i class="ace-icon fa fa-cog"></i>
								Settings
							</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="../controllers/controladorCerrarSesion.php">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->

</div>
<div class="col-xs-12 col-sm-12 center">
		<?php
		date_default_timezone_set('America/Guayaquil');
		$hora = date('H:i:s', time());
		if ($hora >= '17:50:00' and $hora <= '17:10:00') {
		?>
		<div class="alert alert-warning">
			<i class="ace-icon fa fa-exclamation-triangle bigger-120""></i>
        <strong>Alerta:</strong> El sistema se cerrara pronto. Por favor guarde su trabajo.        
        <button <button onclick=" window.location.href='adherenteView.php'"  class=" close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
				</button>
		</div>
		<?php
		}
		?>
	</div>