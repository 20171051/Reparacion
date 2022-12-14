<?php
	$success = '';
	$error =  '';
	if (isset($_POST['submit'])) {
		// Definir $usuario y $contraseña
		$surname = $_POST['surname'];
		$forename = $_POST['forename'];
		$town = $_POST['town'];
		$county = $_POST['county'];
		$tel = $_POST['telephone'];
		
		
		// Establecimiento de conexión con el servidor pasando server_name, user_id and password as a parameter
		$conn= mysqli_connect("localhost", "root", "", "compsys");
		
		// Check connection
		if (!$conn) {
			die("Connection fallida: " . mysqli_connect_error());
		}
		
		// To protect MySQL injection for Security purpose
		$surname = stripslashes($surname );
		$forename = stripslashes($forename);
		$town = stripslashes($town);
		$county = stripslashes($county);
		$tel = stripslashes($tel);
		
		$surname = mysqli_real_escape_string($conn, $surname );
		$forename = mysqli_real_escape_string($conn, $forename);
		$town = mysqli_real_escape_string($conn, $town);
		$county = mysqli_real_escape_string($conn, $county);
		$tel = mysqli_real_escape_string($conn, $tel);
		
		
		if ( is_numeric($tel) ) {
			$query = "SELECT * FROM customers WHERE tel = '$tel'";
			$valid = mysqli_query($conn, $query);
			
			if (!$valid) {
				$error = "No se pudo conectar a la base de datos";
			}
			
			if (mysqli_num_rows($valid) == 0 ) {
				$sql = "INSERT INTO customers (surname, forename, town, county, tel)
				VALUES ('$surname', '$forename', '$town', '$county', '$tel');";
				$res = mysqli_query($conn, $sql);
				
				if (!$res) {
					$error = "Error registrando...";
				}
				
				if (mysqli_affected_rows($conn) == 1) {
					$success =  "Cliente registrado con éxito!";
					header("refresh:5; url=cliente.php");
					
					} else {
					$error =  ("
					¡No se pudo registrar debido a un error del sistema!");
				}
				
				} else {
				$error = "Este cliente ya existe el sistema";
			}
			
			} else {
			$error = "Ingrese su numero de telefono correctamente";
		}
		
		mysqli_close($conn);
	}
?>