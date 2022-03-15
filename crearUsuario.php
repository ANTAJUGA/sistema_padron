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
				try{ace.settings.loadState('main-container')}catch(e){}
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
								<div class="col-xs-12">
									<div class="col-xs-9">
										<!--LINK DE MODAL-->
										<h4 class="pink">
											<button href="#modal-form" role="button" class="btn btn-sm btn-primary" data-toggle="modal"><i class="ace-icon glyphicon glyphicon-plus"></i>Crear Usuario</button>
										</h4>
									</div>
									<div class="col-xs-3">
										<span class="input-icon">
											<input type="text" placeholder="Buscar Usuario" class="" id="">
											<i class="ace-icon fa fa-search nav-search-icon"></i>
										</span>
									</div>
								</div>
								<br><br><br>
								<div class="col-xs-12">
									<?php 
										$objeto->tabla_usuario($conexion);
									?>
								</div>
                                <!-- FORMULARIO DEL MODAL -->
								<div id="modal-form" class="modal">
									<div class="modal-dialog">
										<div class="modal-content">
											<form role="form" action="../controllers/controladorGuardarUsuario.php" method="POST">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="blue bigger">Ingreso Usuario</h4>
												</div>

												<div class="modal-body">
													<div class="row">
														
															<div class="col-xs-12 col-sm-12">
																<div>
																	<label>Cedula</label>

																	<div>
																		<input class="col-xs-10 col-sm-10" type="text" name="buscar_padron" id="buscar_padron" placeholder="Ingrese Cedula" onblur="buscarPadron()" pattern="[A-Za-z0-9_-]{1,15}"  />
																	</div>
																	<div class="input-group-btn">
															
																		<a class="form-control col-xs-2 col-sm-2 btn btn-block btn-info"><i class="fa fa-search"></i></a>
																	</div>
																</div>
																<br>
																<div id="padron">
																	<div>
																		<label>Apellidos Nombres</label>
																		<div>
																			<input class="col-xs-12 col-sm-12"  type="text" id="apellido_nombre" placeholder="" value="" />
																		</div>
																	</div>
																	<br><br>
																	<div>
																		<label>Cantón</label>

																		<div>
																			<input class="col-xs-12 col-sm-12"  type="text" id="" placeholder="" value="" />
																		</div>
																	</div>
																	<br><br>
																	<div>
																		<label >Parroquia</label>

																		<div>
																			<input class="col-xs-12 col-sm-12" type="text" id="" placeholder="" value="" />
																		</div>
																	</div>
																	<br><br>
																	<div>
																		<label>Sexo</label>
																		<div>
																			<input class="col-xs-12 col-sm-12"  type="text" id="" placeholder="" value=""/>
																		</div>
																	</div>
																	<br><br>
																	
																	<div>
																		<label >Estado Adherente</label>
																		<span class="label label-success arrowed"></span>														
																	</div>
																</div>	
																	
																<div >
																	<!-- mostrar en una sola fila
																		<label >Canton</label> &nbsp;&nbsp;&nbsp;&nbsp;
																		<?php //$objeto->select_datos('canton',$conexion); ?>
																	
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

																		<label >Parroquia</label>&nbsp;&nbsp;&nbsp;&nbsp;
																		<?php //$objeto->select_datos('parroquia',$conexion); ?>
																	--> 
																	
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
								<!-- FORMULARIO DEL MODAL -->
								<div id="ver" class="modal" >
									<div class="modal-dialog">
										<div class="modal-content">
											
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 id="titulo2" class="blue bigger">Información Usuario</h4>
											</div>

											<div class="modal-body">
												<div class="row" id="res">
													
													
												</div>
											</div>
										</div>
									</div>
								</div>
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
						document.getElementById('guardar').disabled=false;
						
						
					} else {
						//bloquea boton
						document.getElementById('guardar').disabled=true;
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
					data: {'persona_id': persona_id},
					success: function (data)
					{
						$('#res').html(data);
					}
				});
			}
			function limpiar(){
			
       		 $('#apellido_nombre').val('');

			}
			function buscarPadron(){
				$.ajax({
					type:"POST",
					url:"AjaxViews/cargarPadronAjaxView.php",//ebviamos por post con un estatus
					data:"buscar_padron=" + $('input#buscar_padron').val(),//capturamos el dato del elemento
					success:function(r){
						$('#padron').html(r);//elemento donde se geenera el resultado 
					}
				});
			}
		</script>
		<?php 
			include_once("pie.php");
		?>
	</body>
</html>
