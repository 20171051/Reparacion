<?php
	require_once('session.php');
	require_once('newOrder.php');
	require_once('ordered.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Ausbert multiservice</title>
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

		<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);

			table {
            width: 100%;
			}

            table th {
			padding: 10px;
			background-color: #48577D;
			color: #fff;
			text-align: left;
            }

            table td {
			padding: 5px;
            }
			table tr {
			background-color: #d3dcf2;
            }

		</style>

	</head>

	<body id="top" style="font-size: 62.5%;">
		<!-- Comienzo del Header -->
		<header id="header-wrapper">

			<div id="top-bar" class="clearfix">

				<div id="top-bar-inner">

					<!-- Search Bar by http://www.paulund.co.uk/create-a-slide-out-search-box -->
					<div class="search_form">
						<form action="customer-search.php" method="post">
							<input type="text" name="search_box" id="search_box" placeholder="Buscar cliente...">
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
									<span>Sign-out</span>
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
							<span>Home</span>
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
						<a href="reparaciones.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
							<span>Reparaciones</span>
						</a>
					</li>
					<li class="active">
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
			<!-- Final menu -->


			<!--Accesorios -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Retroceder</a></li>

					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="estimatse.php">Cotizaciones</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Crear</span>
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

					Cliente: <input type="text" placeholder="El ID no es valido" value="<?php echo "$forename $surname (id: $cid)"; ?>" readonly>
					<input type="hidden" name="record" value="<?php echo $cid; ?>" readonly>

						<table>
							<tr>
								<th>Disponibilidaf#</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Precio del elementos</th>
							</tr>
							<?php
								$conn= mysqli_connect("localhost", "root", "", "compsys");
								$sql="SELECT * FROM stock WHERE stock_id IN (";

								foreach($_SESSION['cart'] as $id => $value) {
									$sql .= $id .",";
								}

								//$sql[37] = ' ';
								$sql=substr($sql, 0, -1) .") ORDER BY stock_id ASC";
								//$query=mysql_query($sql);

								$res = mysqli_query($conn, $sql);
								if (!$res) {
									printf("No has agregado nada en el  carrito: %s\n", "");
									exit();
								}

								$totalprice=0;
								while($row = mysqli_fetch_array($res)){
									$subtotal = $_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'];
									$totalprice += $subtotal;
								?>
								<tr>
									<td><?php echo $row['description'] ?></td>
									<td><input type="text" name="quantity[<?php echo $row['stock_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['stock_id']]['quantity'] ?>" readonly /></td>
									<td><?php echo  '&#36;' .$row['price'] ?></td>
									<td><?php echo '&#36;' .$_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'] ?></td>
								</tr>
								<?php

								}
							?>
							<tr>
								<td colspan="4"><h4>Total a pagar: <?php echo '&#36;'. $totalprice ?></h3></td>
							</tr>

						</table>
						<input type="submit" name="order" value="Confirmar Orden">

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
