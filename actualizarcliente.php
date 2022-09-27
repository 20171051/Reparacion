<?php
	require_once('session.php');
	require_once('update/customerForm.php');
	require_once('update/customerUpdated.php');	
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
	<head>
		<title>Ausbert multiservice-Cliente</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta charset="utf-8">
		<meta name="description" content="Lakeside Books">
		<meta name="keywords" content="books, lakeside, cork, shop, online">
		
		<link rel="shortcut icon" href="favicon.ico"> 
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/global.css">
		
		<link rel="stylesheet" href="css/menu.css" />
		<script src="js/modernizr.custom.js"></script>
		
		<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>

	</head>
	
	<body id="top" style="font-size: 62.5%;">
		<!-- Comienzo del header-->
		<header id="header-wrapper">
			
			<div id="top-bar" class="clearfix">
				
				<div id="top-bar-inner">
					
					<!-- Barra de busqueda por http://www.paulund.co.uk/create-a-slide-out-search-box -->
					<div class="search_form">
						<form action="customer-search.php" method="post">
						<input type="text" name="search_box" id="search_box" placeholder="Buscar cliente....">
						</form>
					</div>
					
					
					
					<div class="topbar-right clearfix">
						
						<ul class="clearfix">
							<li class="login-user">
								<a title="<?php echo $login_session; ?>" href="#">
									<span class="icon"><i aria-hidden="true" class="icon-user"></i></span>
									<?php echo $login_session; ?>
								</a>
							</li>
						</ul>
						
						<div class="log-out">
							<!-- <p><a title="Sign out" href="#">Sign out</a></p> -->
							<p>
								<a href="logout.php" title="Salir">
									<span>Salir</span>
									<span class="icon"> 
										<i aria-hidden="true" class="icon-exit"></i>
									</span>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="full-shadow"></div>
			
			
		</header>
		<!-- final del Header -->
		
		
		<div class="main clearfix">
			
			<!-- Inicio del menu -->
			<nav id="menu" class="nav">					
				<ul>
					<li>
						<a href="dashboard.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-home"></i>
							</span>
							<span>Inicio</span>
						</a>
					</li>
					<li class="active">
						<a href="cliente.php">
							<span class="icon"> 
								<i aria-hidden="true" class="icon-users"></i>
							</span>
							<span>Cliente</span>
						</a>
					</li>
					<li>
						<a href="reparaciones.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
							<span>Reparaciones</span>
						</a>
					</li>
				<li>
						<a href="cotizaciones.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-sigma"></i>
							</span>
							<span>Cotizaciones</span>
						</a>
					</li>
					<li>
						<a href="servicios.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-barcode"></i>
							</span>
							<span>Servicios</span>
						</a>
					</li>
					<li>
						<a href="cuenta.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-user"></i>
							</span>
							<span>Cuenta</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- final del menu -->
			
			
			<!--Opciones-->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Retroceder</a></li>
						<li id="add"><a href="agregarcliente.php">Agregar cliente</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" >Cliente</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Actualizar</span>
			</div>
			<!--ocpiones-->
			
			
			<div class="floats">
				<div class="full-widget">		
					<span id="msg">
						<?php 
							echo $success; 
							echo $error;
						?>
					</span>
					<form class="form-4" action="" method="post">
						ID del cliente: <input type="text" name="ud_id" value="<?php echo $id; ?>" readonly>
						Nombre<input type="text" name="ud_surname" value="<?php echo $surname; ?>"><br />
						Apellido <input type="text" name="ud_forename" value="<?php echo $forename; ?>"><br />
						
						Dirección: <input type="text" name="ud_town" value="<?php echo $town; ?>"><br />
						Cedula: <input type="text" name="ud_county" value="<?php echo $county; ?>"><br />
						Telefono: <input type="text" name="ud_tel" value="<?php echo $tel; ?>"><br />
						<input type="submit" name="submit" value="Actualizar">
					</form>
					
				</div>
				
			</div> 
			<!-- Final de los FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
		<!-- SCRIPT del menu  -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT del menu -->
		
	</body>
	
</html> 								