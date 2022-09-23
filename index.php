<?php
	require('checklogin.php'); // Includes Login Script
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Ausbert multiservice</title>
		<link rel="shortcut icon" href="../favicon.ico"> 
		
		<link rel="stylesheet" href="css/global.css">	
        <link rel="stylesheet" href="css/login.css" />
		
		<script src="js/modernizr.custom.63321.js"></script>
		
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);		
		</style>
	</head>
	
	<body>
		<div class="container">
			<div class="rect">
				<img class="logos-login" src="images/logo01.png ">
				<form class="form-4" method="post" action="">
					<h1>Login / <span class="reg"><a href="register.php">Registro</a></span></h1>
					<span id="error"><?php echo $error; ?></span>
					<label for="login">Usuario</label>
					<input type="text" name="username" placeholder="Usuario" autofocus required>
					
					<label for="password">Contraseña</label>
					<input type="password" name="password" placeholder="Contraseña" required> 
					
					<input type="submit" name="submit" value="Login">
					
				</form>
				
			</div>
		</div>
	</body>
	
</html> 