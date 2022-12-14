<?php
	require_once('session.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
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
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			ul>li, a{cursor: pointer;}
		</style>
		
		<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>
		
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		
	</head>
	
	<body id="top" style="font-size: 62.5%;">
		<!-- Comienzo del Header -->
		<header id="header-wrapper">
			
			<div id="top-bar" class="clearfix">
				
				<div id="top-bar-inner">
					
					<!-- Search Bar by http://www.paulund.co.uk/create-a-slide-out-search-box -->
					<div class="search_form">
						<form action="customer-search.php" method="post">
							<input type="text" name="search_box" id="search_box" placeholder="Buscar cliente">
						</form>
					</div>
					<!-- Search Bar by http://www.paulund.co.uk/create-a-slide-out-search-box -->
					
					
					<div class="topbar-right clearfix">
						
						<ul class="clearfix">
							<li class="login-user">
								<a title="<?php echo $login_session; ?>" href=a href="cuenta.php">
									<span class="icon"><i aria-hidden="true" class="icon-user"></i></span>
									<?php echo $login_session; ?>
								</a>
							</li>
						</ul>
						
						<div class="log-out">
						
							<p>
								<a href="logout.php" title="salir">
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
					<li class="active">
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
			<div class="bread">
				<div class="submenu">
					<ul>
						<li id="back" value="Update Inventory">Actualizar</li>
					</ul>
				</div>
				<h3>Cuenta</h3>
			</div>
			<!--Accesorios -->
			
			
			<div class="floats">
				<div class=" full-widget">
					<?php
						$staff = '';
						$conn= mysqli_connect("localhost", "root", "", "compsys");
						if (!$conn) {
							die("Conexion fallida: " . mysqli_connect_error());
						}
						
						$query = "SELECT * FROM staff WHERE staff_id = $login_id";
						
						$result= mysqli_query($conn, $query);
						
						if (!$result) {
							$error = "No se pudo conectar a la base datos!";
						}
						
						if(mysqli_num_rows($result) == 0) {
							$error = "<ul> <li>No se encontro el resultado de:  (\"" .$name ."\") </li></ul>";
						}
						//-create  while loop and loop through result set
						while($row = mysqli_fetch_array($result)){
							$ID = $row['staff_id'];
							$Nombre =$row['forename'];
							$Apellido=$row['surname'];
							$Direccion = $row['town'];
							$Cedula= $row['county'];
							$tel = $row ['tel'];
							
							//-display the result of the array
						
							// $staff = "<ul><h1><li> Nombre: "  .$firstname .
							//  "</li><li> Apellido: "  . $lastname .  
							//  "</li><li>Direccion:  "   .$town . 
							//  "</li><li>Cedula:  "   .$county . 
							//  "</li><li> Telefono: "   .$tel . "</li></h1></ul>";
							// echo $staff;

							
						}
						// mysqli_close($conn);
					
				?>
				
				<form class="form-4">
					<h1>Informaci??n de la cuenta</h1>
				<ul></ul>
                <span class="text-gray-700 dark:text-gray-400">Nombre</span>
				<input disabled type="text" name="nombr" value="<?php echo $Nombre ?>"class="contenido"/>
				</label>
				<ul></ul>
				<span class="text-gray-700 dark:text-gray-400">Apellido</span>
				<input disabled type="text" name="nombre" value="<?php echo $Apellido; ?>" class="contenido"/>
				<span class="text-gray-700 dark:text-gray-400">Direcci??n</span>
				<input disabled type="text" name="nombr" value="<?php echo $Direccion; ?>"class="contenido"/>
				</label>
				<ul></ul>
				<span class="text-gray-700 dark:text-gray-400">Cedula</span>
				<input disabled type="text" name="nombr" value="<?php echo $Cedula; ?>" class="contenido"/>
				<span class="text-gray-700 dark:text-gray-400">Telefono</span>
				<input disabled type="text" name="nombr" value="<?php echo $tel; ?>" class="contenido"/>
				</label>
				<ul></ul>
				</form>
				
			</div> 
			<!-- END OF FULL WIDGET-->
		</div> 
		<!-- FINAL FLOATS-->
	</div>
	<!-- END OF MAIN-->
	
	<!-- SCRIPT FOR THE MENU -->
	<script src="js/menu.js"></script>
	<!-- SCRIPT FOR THE MENU --> 
	
</body>

</html>