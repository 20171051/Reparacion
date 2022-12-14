<?php
	require('session.php');

	// Connect to the database server
	if (isset($_GET['id']) and is_numeric($_GET['id'])) {

		$dbcnx = mysqli_connect("localhost", "root", "", "compsys");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}


		$cid = $_GET['id'];

		$sql = "SELECT * FROM customers WHERE cust_id=$cid";

		$res = mysqli_query($dbcnx, $sql);
		if ( !$res ) {
			echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
			exit();
		}

		else
		{
			$row = mysqli_fetch_array($res);
			$id = $row['cust_id'];
			$surname = $row['surname'];
			$forename = $row['forename'];
			$town = $row['town'];
			$county = $row['county'];
			$tel = $row['tel'];
		}
		//free results
		mysqli_free_result($res);

		//close connection
		mysqli_close($dbcnx);
	} else {
		header("location: /cliente.php");
	}
?>

<!DOCTYPE html>
<html>
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
		<!-- BEGIN Header -->
		<header id="header-wrapper">

			<div id="top-bar" class="clearfix">

				<div id="top-bar-inner">

					<!-- Search Bar by http://www.paulund.co.uk/create-a-slide-out-search-box -->
					<div class="search_form">
						<form action="" method="post">
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
								<a href="logout.php" title="Sign out">
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

			<!-- START OF NAVIGATION -->
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
					<li>
					<li class="active">
						<a href="cliente.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-users"></i>
							</span>
							<span>Clientes</span>
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
					<li class="">
						<a href="cuenta.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-user"></i>
							</span>
							<span>Cuenta</span>
						</a>
					</li>
				</ul>
			</nav>
					<!--<li>
						<a href="#">
							<span class="icon">
								<i aria-hidden="true" class="icon-coin"></i>
							</span>
							<span>Facturas</span>
						</a>
					</li>
				</ul>
			</nav>-->
			<!-- END OF NAVIGATION -->


			<!--Breadcrumb -->
			<div class="bread dash"><h3>Clientes</h3></div>
			<!--Breadcrumb -->


			<div class="floats">

				<!-- Easy access links -->
				<div class="widget-content full-widget">
				<form class="form-4">
				<ul></ul>
				<span class="text-gray-700 dark:text-gray-400">Nombre</span>
				<input disabled type="text" name="nombr" value="<?php echo $forename ?>"class="contenido"/>
				</label>
				<ul></ul>
				<span class="text-gray-700 dark:text-gray-400">Apellido</span>
				<input disabled type="text" name="nombre" value="<?php echo $surname; ?>" class="contenido"/>
				<span class="text-gray-700 dark:text-gray-400">Direcci??n</span>
				<input disabled type="text" name="nombr" value="<?php echo $town; ?>"class="contenido"/>
				</label>
				<ul></ul>
				<span class="text-gray-700 dark:text-gray-400">Cedula</span>
				<input disabled type="text" name="nombr" value="<?php echo $county; ?>" class="contenido"/>
				<span class="text-gray-700 dark:text-gray-400">Telefono</span>
				<input disabled type="text" name="nombr" value="<?php echo $tel; ?>" class="contenido"/>
				</label>
				<ul></ul>
				</form>
					<?php  echo $error; ?>
				</div>
				<!-- Easy access links -->

			</div>
		</div>


		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->

	</body>

</html>
