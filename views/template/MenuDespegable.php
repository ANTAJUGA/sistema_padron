<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">

					<li class="nav-item"    id="inicio">
						<a href="inicio.php">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Inicio</span>
						</a>
						<b class="arrow"></b>
					</li>

					<li class="nav-item" >
						<a href="#" class="dropdown-toggle">
                        <i class=" menu-icon fa fa-users"></i>
							<span class="menu-text">
								Adherentes
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
                            <li class="nav-item"   id="adherenteView">
                                <a href="adherenteView.php">
                                    <i class="menu-icon fa fa-hdd-o"></i>
                                    <span class="menu-text">Insertar Adherente</span>
                                </a>
                                <b class="arrow"></b>
                            </li>
							<li class="nav-item" id="guiaView">
								<a href="guiaView.php">
									<i class="menu-icon fa  fa-flag"></i>
									<span class="menu-text">Listar Registro</span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="nav-item" id="">
								<a href="#">
									<i class="menu-icon fa  fa-folder-open-o"></i>
									<span class="menu-text">Lista Total</span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="nav-item" id="">
								<a href="#">
									<i class="menu-icon glyphicon glyphicon-pencil"></i>
									<span class="menu-text">Registro Electoral</span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>

					</li>
					<?php if ($_SESSION['tipo_usuario']==1){?>
                    <li class="nav-item" >
						<a href="#" class="dropdown-toggle">
                        <i class="menu-icon glyphicon  glyphicon-inbox"></i>
							<span class="menu-text">
								Catalogo
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
                            <li class="nav-item"   id="imprimirPadronesView">
                                <a href="imprimirPadronesView.php">
                                    <i class="menu-icon glyphicon glyphicon-print"></i>
                                    <span class="menu-text">Padrónes</span>
                                </a>
                                <b class="arrow"></b>
                            </li>
							<li class="nav-item" id="">
								<a href="#">
									<i class="menu-icon fa  fa-book"></i>
									<span class="menu-text">Certificado</span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>

					</li>
					
					<li class="nav-item" >
						<a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-usd"></i>
							<span class="menu-text">
								Aportes
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
                            <li class="nav-item"   id="">
                                <a href="#">
                                    <i class="menu-icon fa fa-money"></i>
                                    <span class="menu-text">Adherentes</span>
                                </a>
                                <b class="arrow"></b>
                            </li>
							<li class="nav-item" id="">
								<a href="#">
									<i class="menu-icon fa fa-calendar"></i>
									<span class="menu-text">Reportes</span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>

					</li>
					<?php } ?>
					<?php if($_SESSION['tipo_usuario']==1){ ?>
                    <li class="nav-item" id="crearUsuario">
						<a href="crearUsuario.php">
							<i class="menu-icon glyphicon glyphicon-user"></i>
							<span class="menu-text"> Usuario</span>
						</a>
						<b class="arrow"></b>
					</li>
					<?php } ?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>