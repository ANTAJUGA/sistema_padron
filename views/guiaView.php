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
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php 
				include_once("template/MenuDespegable.php");
			?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<label>Carrera</label>
								<select class="" id="">
									<option value=""></option>
									<option value="">Desarrollo Software</option>
									<option value="">Contabilidad</option>
									<option value="">Agroecologia</option>
								</select>
								<label>Ciclo</label>
								<select class="" id="">
									<option value=""></option>
									<option value="">1</option>
									<option value="">2</option>
									<option value="">3</option>
									<option value="">4</option>
									<option value="">5</option>
								</select>
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
							<div class="col-xs-6 col-sm-1"></div>
							<div class="col-xs-6 col-sm-11">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<ul class="ace-thumbnails clearfix">
										<li class="col-xs-2">
											<a href="#" title="Photo Title">
												<img width="150" height="150" alt="150x150" src="assets/images/gallery/fundamentos.PNG" />
												
												<div class="text">
													<div class="inner">FUNDAMENTOS DE PROGRAMACION</div>
												</div>
											</a>

											<div class="tools tools-bottom">

												<a href="#">
													<i class="ace-icon fa fa-eye"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>

											</div>
										</li>
										<li class="col-xs-2">
											<a href="#" title="Photo Title">
												<img width="150" height="150" alt="150x150" src="assets/images/gallery/desarrollo.PNG" />
												
												<div class="text">
													<div class="inner">DESARROLLO PENSAMIENTO</div>
												</div>
											</a>

											<div class="tools tools-bottom">
												<a href="#">
													<i class="ace-icon fa fa-eye"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>

											</div>
										</li>
										<li class="col-xs-2">
											<a href="#" title="Photo Title">
												<img width="150" height="150" alt="150x150" src="assets/images/gallery/analisis.PNG" />
												
												<div class="text">
													<div class="inner">ANALISIS Y DISEÑOS DE SOFTWARE</div>
												</div>
											</a>

											<div class="tools tools-bottom">
												
												<a href="#">
													<i class="ace-icon fa fa-eye"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>

											</div>
										</li>
										<li class="col-xs-2">
											<a href="#" title="Photo Title">
												<img width="150" height="150" alt="150x150" src="assets/images/gallery/lenguaje.PNG" />
												
												<div class="text">
													<div class="inner">LENGUAJE Y COMUNICACIÓN</div>
												</div>
											</a>

											<div class="tools tools-bottom">

												<a href="#">
													<i class="ace-icon fa fa-eye"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>

											</div>
										</li>
										<li class="col-xs-2">
											<a href="#" title="Photo Title">
												<img width="150" height="150" alt="150x150" src="assets/images/gallery/lenguaje.PNG" />
												
												<div class="text">
													<div class="inner">LENGUAJE Y COMUNICACIÓN</div>
												</div>
											</a>

											<div class="tools tools-bottom">

												<a href="#">
													<i class="ace-icon fa fa-eye"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>

											</div>
										</li>
										<li class="col-xs-2">
											<a href="#" title="Photo Title">
												<img width="150" height="150" alt="150x150" src="assets/images/gallery/lenguaje.PNG" />
												
												<div class="text">
													<div class="inner">LENGUAJE Y COMUNICACIÓN</div>
												</div>
											</a>

											<div class="tools tools-bottom">

												<a href="#">
													<i class="ace-icon fa fa-eye"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>

											</div>
										</li>
									</ul>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

	<?php 
		include_once("pie.php");
	?>