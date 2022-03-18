<?php
include_once("../controllers/controladorSesion.php");
include_once("cabecera.php");
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

					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->
				</div>

				<div class="page-content">

					<?php
					include_once("template/settings.php")
					?>


					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div>
								<div id="user-profile-1" class="user-profile row">
									<div class="col-xs-12 col-sm-4 center">
										<div>
											<span class="profile-picture">
												<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo $avatar['foto']; ?>" />
											</span>

											<div class="space-4"></div>

											<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
												<div class="inline position-relative">
													<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
														<i class="ace-icon fa fa-circle light-green"></i>
														&nbsp;
														<span class="white"><?php echo $usuario['apellido_nombre']; ?></span>
													</a>

													<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
														<li class="dropdown-header">Estado Usuario</li>

														<li>
															<a href="">
																<i class="ace-icon fa fa-circle green"></i>
																&nbsp;
																<span class="green">Available</span>
															</a>
														</li>

														<li>

													</ul>
												</div>
											</div>
										</div>

										<div class="space-6"></div>

										<div class="profile-contact-info">

											<div class="space-6"></div>

											<div class="profile-social-links align-center">
												<a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
													<i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
												</a>
											</div>
										</div>

									</div>

									<div class="col-xs-12 col-sm-8">

										<div class="space-12"></div>

										<div class="profile-user-info profile-user-info-striped">
										<div class="profile-info-row">
												<div class="profile-info-name"> Cedula </div>

												<div class="profile-info-value">
													<span class="editable" id="username"><?php echo $usuario['identificacion'] ?> </span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Usuario </div>

												<div class="profile-info-value">
													<span class="editable" id="username"><?php echo $avatar['username'] ?> </span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Ubicacion </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker light-orange bigger-110"></i>
													<span class="editable" id="country"><?php echo $avatar_canton['nombre'] ?></span>
													<span class="editable" id="city"><?php echo $avatar_parroquia['nombre'] ?></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Registrado </div>

												<div class="profile-info-value">
													<span class="editable" id="signup"><?php echo $avatar['fecha_ingreso'] ?></span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Tipo Usuario </div>

												<div class="profile-info-value">
													<span class="editable" id="login">
														<?php if($avatar['tipo_usuario']==1){?>
															ADMINISTRADOR
														<?php }else{?>
															DIGITADOR
														<?php }?>
													</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Celular/Teléfono</div>

												<div class="profile-info-value">
													<span class="editable" id="about">00000000000</span>
												</div>
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

		<?php
		include_once("pie.php");
		?>
</body>

</html>