<?php
	require('session.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
	<head>
		<title>Ausbert Multiservice- Reparaciones</title>
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
							<input type="text" name="search_box" id="search_box" placeholder="Buscar cliente....">
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
			<div class="bread">
				<div class="submenu">
					<ul>
						<li id="update" value="Update Repair">Actualizar</li>
						<li id="add"><a href="agregarrep.php">Agregar</a></li>
					</ul>
				</div>
				<h3>Reparaciones</h3>
			</div>
			<!--Accesorios -->
			
			
			<div class="floats">
				<div class="full-widget" id="searchDiv" style="display:none;">
					
					<form class="form-4" method="post" action="updateRepair.php">	
						<p>Ingresa el ID del equipo:</p> <br>
						<input type="number" name="record" placeholder="Introduzca un numero ej: 1" min="1" maxlength="10" required>
						<input type="submit" name="go" value="Actualizar >>">	
						</form>
					
				</div>
				
				<div class=" full-widget">
					<div ng-controller="repairsCrtl">
						
						<div class="row">
							<div class="col-md-2">Tamaño de pagina:
								<select ng-model="entryLimit" class="form-control">
									<option>5</option>
									<option>10</option>
									<option>20</option>
									<option>50</option>
									<option>100</option>
								</select>
							</div>
							<div class="col-md-3">Filtro:
								<input type="text" ng-model="search" ng-change="filter()" placeholder="Buscar.." class="form-control" />
							</div>
							<!--<div class="col-md-4">
								<br><br><p>Filtered {{ filtered.length }} of {{ totalItems}} total repairs</p>
							</div>-->
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12" ng-show="filteredItems > 0">
								<table class="table table-striped table-bordered">
									<thead>
										<th>ID&nbsp;<a ng-click="sort_by('rep_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Descripcion&nbsp;<a ng-click="sort_by('description');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Modelo&nbsp;<a ng-click="sort_by('model');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Fecha de entrada&nbsp;<a ng-click="sort_by('repairdate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Ultima Actu.&nbsp;<a ng-click="sort_by('collectiondate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Estado&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th>
									</thead>
									<tbody>
										<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
											<td>{{data.rep_id}}</td>
											<td>{{data.description}}</td>
											<td>{{data.model}}</td>
											<td>{{data.repairdate}}</td>
											<td>{{data.collectiondate}}</td>
											<td>{{data.status}}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-12" ng-show="filteredItems == 0">
								<div class="col-md-12">
									<h4>Ningun equipo encontrado</h4>
								</div>
							</div>
							<div class="col-md-12" ng-show="filteredItems > 0">    
								<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
								
							</div>
						</div>
						
					</div> 
					<!-- END OF CUSTOMERS LIST-->	
				</div> 
				<!-- END OF FULL WIDGET-->
				
			</div> 
			<!-- FINAL FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/angular.min.repair.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.repair.js"></script>
		<script src="app/repair.js"></script>  
		
		<script>	
			function showDiv() {
				document.getElementById('searchDiv').style.display = "block";
			}
			
			$( "#update" ).click(function() {
				$( "#searchDiv" ).toggle( "slow", function() {
					// Animation complete.
				});
			});
		</script>
		
	</body>
	
</html> 								