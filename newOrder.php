<?php
	// Connect to the database server
	$error = '';
	$success = '';
	if (isset($_POST['record']) and is_numeric($_POST['record'])) {

		$dbcnx = mysqli_connect("localhost", "root", "", "compsys");
		if (mysqli_connect_errno())
		{
			$error = "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}


		$cid = $_POST['record'];

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

			if ($row < 1) {
				header("refresh:1; url=chooseRepair.php");

			} //if nothing is found
		}
		//free results
		mysqli_free_result($res);


		//close connection
		mysqli_close($dbcnx);
	}
?>
