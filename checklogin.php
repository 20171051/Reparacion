<?php
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	
	if (isset($_POST['submit'])) {
		
		// defino $usuario y $contrasena
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		
		$conn = mysqli_connect("localhost", "root", "", "compsys");
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		
		// Selecciono de la base de datos
		$query = "SELECT * FROM staff WHERE username = '$username' AND password = '$password'";
		$valid = mysqli_query($conn, $query);
		
		if (!$valid) {
			$error = "No se pudo conectar a la base de datos";
		}
		
		if (mysqli_num_rows($valid) == 1 ) {	
			$_SESSION['login_user'] = $username; // Initciando la sesion 
			header("location: dashboard.php"); // Redireccionando a la otra pagina
			} else {
			$error = "Usuario o contraseña invalido";
		}
		mysqli_close($conn); // Cerrando conexion
	}
?>