<?php
	require('session.php');
	require('piechart.php');
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Ausbert multiservice- Dashboard</title>
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
		<!-- Comienzo del Header -->
		<header id="header-wrapper">
			
			<div id="top-bar" class="clearfix">
				
				<div id="top-bar-inner">
					
					<!--BARRA DE BUSQUEDA-->
					<div class="search_form">
						<form action="customer-search.php" method="post">
							<input type="text" name="search_box" id="search_box" placeholder="Buscar cliente....">
						</form>
					</div>
					<!-- Search Bar by http://www.paulund.co.uk/create-a-slide-out-search-box -->
					
					
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
		<!-- END Header -->
		
		
		<div class="main clearfix">
			
			<!-- INICIO DEL MENU-->
			<nav id="menu" class="nav">					
				<ul>
					<li class="active">
						<a href="#">
							<span class="icon">
								<i aria-hidden="true" class="icon-home"></i>
							</span>
							<span>Inicio</span>
						</a>
					</li>
					<li>
						<a href="cliente.php">
							<span class="icon"> 
								<i aria-hidden="true" class="icon-users"></i>
							</span>
							<span>Clientes</span>
						</a>
					</li>
					<li>
						<a href="">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
							<span>Reparaciones</span>
						</a>
					</li>
					<li>
						<a href="cotizaciones.php">
							<span class="icon">
								<!-- <i aria-hidden="true" class="icon-coin"></i> -->
								<i aria-hidden="true" class="icon-coin"></i>
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
			<!-- FINAL MENU-->
			
			
			<!--Accesorios -->
			<div class="bread dash"><h3>Inicio</h3></div>
			<!--Accesorios -->
			
			
			<div class="floats">
				
				<!-- Acceso rapidos -->
				<div class="widget-content small-widget">
					
					<ul>
						
						<li>
							<a href="agregarcliente.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>Agregar cliente</span>
							</a>
						</li>
						
						<li>
							 <a href="addRepair.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>Agregar reparacion </span>
						
						</li>
						
						<li>
							<a href="#">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>Nueva cotizaciones</span>
							</a>
						</li>
						
						<li>
						<a href="">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>Agregar un servicio y productos</span>
							</a>
						</li>
						
					</ul>
				</div>
				<!-- Easy access links -->
				
				
				<!-- Repair Summary -->
				<div class="widget-content wide-widget">
					<h1 class="center">Detalles de reparación </h1>
					<!--Div that will hold the pie chart-->
				<!	<div id="pie_chart" style="width: 100%; height: 362px;"></div>
				</div>
				<!-- Repair Summary -->
				
				
			</div>
		</div>
		
		
		<!-- SCRIPT del  MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		
	</body>
	
</html> 				