<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Mupp Listas 18</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="views/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="views/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="views/assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="views/assets/css/ace.min.css" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="views/assets/css/ace-part2.min.css" />
		<![endif]-->
	<link rel="stylesheet" href="views/assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
		  <link rel="stylesheet" href="views/assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
		<script src="views/assets/js/html5shiv.min.js"></script>
		<script src="views/assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="login-layout blur-login">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<br><br>
					<div class="login-container">




						<div class="position-relative">

							<div id="login-box" class="login-box visible widget-box no-border">

								<div class="widget-body">
									<div class="widget-main">
										<div class="center" style="background-color: #F7F7F7">
											<h1>
												<div>
													<img src="views/assets/images/portada/pacha.png" width="100%" />
												</div><!-- /.row -->
											</h1>
										</div>
										<?php include_once('views/AjaxViews/cargarMensaje.php') ?>

										<h4 class="blue  bigger center">
											<i class="ace-icon fa fa-coffee green"></i>
											<span class="blue">LOGIN</span>
										</h4>

										<div class="space-6"></div>

										<form method="POST" action="controllers/controladorLogin.php">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input name="usuario" type="text" class="form-control center" placeholder="Usuario" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input name="clave" type="password" class="form-control center" placeholder="Contraseña" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<div class="space"></div>

												<div class="center">
													<button type="submit" class="btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
												</div>

											</fieldset>

										</form>

										<div class="space-6"></div>
									</div><!-- /.widget-main -->

								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->

						</div><!-- /.position-relative -->

						<div class="navbar-fixed-top align-right">
							<br />
							&nbsp;
							<a id="btn-login-dark" href="#">Dark</a>
							&nbsp;
							<span class="blue">/</span>
							&nbsp;
							<a id="btn-login-blur" href="#">Blur</a>
							&nbsp;
							<span class="blue">/</span>
							&nbsp;
							<a id="btn-login-light" href="#">Light</a>
							&nbsp; &nbsp; &nbsp;
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="views/assets/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
<script src="views/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='views/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function($) {
			$(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible'); //hide others
				$(target).addClass('visible'); //show target
			});
		});



		//you don't need this, just used for changing background
		jQuery(function($) {
			$('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			});
			$('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			});
			$('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');

				e.preventDefault();
			});

		});
	</script>
</body>

</html>