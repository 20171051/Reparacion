<?php
	require_once('update/functions.php');
	// Connect to the database server
	if (isset($_POST['record']) and is_numeric($_POST['record'])) {

		$dbcnx = mysqli_connect("localhost", "root", "", "compsys");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}


		$id = $_POST['record'];

		$sql="SELECT * FROM repairs WHERE rep_id=$id";

		$res = mysqli_query($dbcnx, $sql);
		if ( !$res ) {
			echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
			exit();
		}

		else
		{
			$row = mysqli_fetch_array($res);
			$cust_id = $row['Cust_ID'];
			$staff_id = $row['Staff_ID'];
			$brand = $row['Brand'];
			$model = $row['Model'];
			$description = $row['Description'];
			$device = $row['DeviceType'];
			$os = $row['OS'];
			$status = $row['Status'];

			$sql = "SELECT * FROM customers WHERE cust_id=$cust_id";
			$res = mysqli_query($dbcnx, $sql);
			if ( !$res ) {
				echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
				exit();
			}

			else
			{
				$row = mysqli_fetch_array($res);
				$surname = $row['surname'];
				$forename = $row['forename'];
				$town = $row['town'];
				$county = $row['county'];
				$tel = $row['tel'];
			}
		}


			//free results
			mysqli_free_result($res);

			//close connection
			mysqli_close($dbcnx);
		}
	?>
