<?php
include_once("../controllers/controladorSesion.php");
include_once("cabecera.php");
?>

<body class="no-skin">

	<?php
	include_once("template/navbar.php");
	?>

	<div class="main-container ace-save-state" id="main-container">

		<?php
		include_once("template/MenuDespegable.php");
		?>

		<div class="main-content">
			<div class="main-content-inner">

				<div class="page-content">
					<?php
					include_once("template/settings.php");

					?>

					<div class="row">
						<div class="col-xs-12">
							<script>
								try {
									ace.settings.loadState('main-container')
								} catch (e) {}
							</script>

							<div class="col-xs-12">
								
								<div class="col-xs-9">
									<!--LINK DE MODAL-->
									<h4 class="pink">
										<button href="#modal-form" role="button" class="btn btn-sm btn-primary" data-toggle="modal"><i class="ace-icon glyphicon glyphicon-plus"></i>Regitrar</button>
									</h4>
								</div>
								<?php if ($_SESSION['id'] == 1) { //solo el administrador puede buscar 
								?>
									<div class="col-xs-3">
										<span class="input-icon">
											<input type="text" placeholder="Buscar Adherente" class="" id="">
											<i class="ace-icon fa fa-search nav-search-icon"></i>
										</span>
									</div>
								<?php } ?>
							</div>
						</div>
						<br><br><br>
						<div class=" row col-xs-12">

							<?php include_once('AjaxViews/cargarMensaje.php');?>									
						</div>
						<div class="col-xs-12">
							
							<?php
							if ($_SESSION['tipo_usuario'] > 1) {
								$objeto->tabla_padron_canton($_SESSION['id'], $conexion);
							} else {
								$objeto->tabla_padron($conexion);
							}
							?>
						</div>
						<!-- FORMULARIO DEL MODAL -->
						<div id="modal-form" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<form role="form" action="../controllers/controladorGuardarAdherente.php" method="POST">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="blue bigger">Registrar Adherente</h4>
										</div>

										<div class="modal-body">
											<div class="row">

												<div class="col-xs-12 col-sm-12">
													<div>
														<label>Cedula</label>

														<div>
															<input class="col-xs-10 col-sm-10" type="text" name="busqueda" id="busqueda" placeholder="Ingrese Cedula" onkeypress="return validaNumericos(event)" onblur="buscarAdherente()" pattern="[A-Za-z0-9_-]{1,15}" />
														</div>
														<div class="input-group-btn">

															<a class="form-control col-xs-2 col-sm-2 btn btn-block btn-info"><i class="fa fa-search"></i></a>
														</div>
													</div>
													<br>
													<div id="registro">

													</div>

												</div>
												<!-- ENVIAMOS UN DATOS DE INCOGNITO-->
												<input type="hidden" name="usuario_creacion" value="<?php echo $_SESSION['id']; ?>">

											</div>
										</div>

										<div class="modal-footer">
											<button class="btn btn-lg" data-dismiss="modal">
												<i class="ace-icon fa fa-times"></i>
												Cancelar
											</button>
											<input class="btn btn-lg btn-success" type="submit" value="guardar" name="guardar" id="guardar" disabled>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- PAGE CONTENT BEGINS -->

						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->

					<!-- PAGE CONTENT BEGINS -->

					<!-- PAGE CONTENT ENDS -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
	</div><!-- /.main-content -->

	<script>
		function recargarParroquia() {
			$.ajax({
				type: "POST",
				url: "AjaxViews/cargaSelectAjaxView.php?estatus=cargaParroquia", //ebviamos por post con un estatus
				data: "canton_id=" + $('#canton_id').val(), //capturamos el dato del elemento
				success: function(r) {
					$('#parroquia').html(r); //elemento donde se geenera el resultado 
				}
			});
		}

		function buscarAdherente() {
			$.ajax({
				type: "POST",
				url: "AjaxViews/cargarAdherenteAjaxView.php", //ebviamos por post con un estatus
				data: {
					'busqueda': $('input#busqueda').val(),
					'usuario_creacion': <?php echo $_SESSION['id']; ?>
				}, //capturamos el dato del elemento
				success: function(r) {
					$('#registro').html(r); //elemento donde se geenera el resultado 
				}
			});
		}

		function validaNumericos(event) {
			if (event.charCode >= 48 && event.charCode <= 57) {
				return true;
			}
			return false;
		}
	</script>

	<?php

	include_once("pie.php");
	?>


</body>

</html>