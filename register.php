<?php
	require('addNewStaff.php'); //includes adding new staff script
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ausbert Multi Service</title>
		<link rel="shortcut icon" href="favicon.ico"> 
		
		<link rel="stylesheet" href="css/global.css">	
        <link rel="stylesheet" href="css/login.css" />
	
		<script src="js/modernizr.custom.63321.js"></script>
		
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);		
		</style>
	</head>
	
	<body>
		<div class="container">
			<div class="rect reg">
				<img  class="logos-login" src="images/logo01.png" width="150" height="150" >
				<form class="form-4" method="POST" action="">
					<h1>Registro/ <span class="reg"><a href="index.php">Login</a></span></h1>
						<span id="error"><?php echo $error; ?></span>
						<span id="error"><?php echo $success; ?></span>
						
						
						<label for="forename">Nombre</label>
						<input type="text" name="forename" placeholder="Nombre" required>
						<label for="surname">Apellido</label>
						<input type="text" name="surname" placeholder="Apellido" required>
						
						<label for="email">Correo</label>
						<input type="text" name="email" placeholder="Email" required>
						
						<label for="town">Direccion</label>
						<input type="text" name="town" placeholder="Direccion">
						
						<label for="county">Cedula</label>
						<input type="text" name="county" placeholder="Cedula">
						
						<label for="telephone">telefono</label>
						<input type="text" name="telephone" placeholder="Telefono">
						
						<label for="login">Usuario</label>
						<input type="text" name="username" placeholder="Usuario" required>
					
						<label for="password">Contraseña</label>
						<input type="password" name="password" placeholder="Contraseña" required> 

						<input type="submit" name="submit" value="Registrar">
					     
				</form>
				
			</div>
		</div>
	</body>
	
</html> 