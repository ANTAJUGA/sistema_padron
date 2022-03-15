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


					</div>

					<div class="page-content">
						<?php 
							include_once("template/settings.php")
						?>

						<div class="page-header">
                                <div>
                                    <img  src="" width="100%" />
                                </div>
                        </div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php 
								
								?>
								
								<div>
									<img src="assets/images/portada/inicio.png" width="100%" />
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

		
        <?php include_once("pie.php"); ?>
        </body>
</html>