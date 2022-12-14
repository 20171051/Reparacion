<?php
	require_once('session.php');
	require_once('update/repairForm.php');
	require_once('update/repairUpdated.php');
	require_once('update/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ausbert Multi Service - Actualizar reparacion</title>
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

					<!-- Search Bar by http://www.paulund.co.uk/create-a-slide-out-search-box -->
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

			<!-- Inicio menu -->
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
						<a href="cliente.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-users"></i>
							</span>
							<span>Clientes</span>
						</a>
					</li>
					<li class="active">
						<a href="reparaciones.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
							<span>Reparaciones</span>
						</a>
					</li>
					<li>
						<a href="#">
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
					<li>
						<a href="cuentas.php">
							<span class="icon">
								<!-- <i aria-hidden="true" class="icon-coin"></i> -->
								<i aria-hidden="true" class="icon-user"></i>
							</span>
							<span>Cuentas</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- Final menu -->


			<!--Accesorios -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Retroceder</a></li>
						<li id="add"><a href="agregarrep.php">Agregar reparaci??n</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="reparaciones.php">Reparacion</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Actualizacion de reparacion</span>
			</div>
			<!--Accesorios -->


			<div class="floats">
				<div class="full-widget">
					<span id="msg">
						<?php
							echo $success;
							echo $error;
						?>
					</span>
					<form class="form-4" action="" method="post">
						<input type="hidden" name="record" value="<?php echo $cust_id; ?>" readonly>
						<input type="hidden" name="ud_id" value="<?php echo $id; ?>" readonly>
						ID del cliente: <input type="text" value="<?php echo "$forename $surname (id: $cust_id)"; ?>" readonly>
						<input type="text" name="ud_cust_id" value="<?php echo $cust_id; ?>" readonly>
						<input type="hidden" name="ud_staff_id" value="<?php echo $staff_id; ?>" readonly>
						Tipo de equipo: <?php echo enumDropdown("repairs", "DeviceType", "ud_device", $device); ?>
						Marca: <input type="text" name="ud_brand" value="<?php echo $brand; ?>" required>
						Modelo: <input type="text" name="ud_model" value="<?php echo $model; ?>" required>
						Sistema operativo: <?php echo enumDropdown("repairs", "OS", "ud_os", $os); ?>
						Descripcion: <textarea rows="5" name="ud_description" required><?php echo $description; ?></textarea>
						Estado: <?php echo enumDropdown("repairs", "Status", "ud_status", $status); ?>
						<input type="submit" name="submit" value="Actualizar">

					</form>

				</div>

			</div>
			<!-- FINAL FLOATS-->
		</div>
		<!-- END OF MAIN-->

		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->

	</body>

</html>
