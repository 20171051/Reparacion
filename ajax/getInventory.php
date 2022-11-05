<?php
	include('../includes/config.php');
	$edit = '';
	$query="SELECT * FROM orders o
		JOIN staff s ON o.staff_id = s.staff_id
		JOIN customers c on o.cust_id = c.cust_id;";

	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$arr = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$query_total = "SELECT SUM(total) AS total FROM orderitems WHERE ord_id = ".$row['ord_id'].";";
			$result_total = $mysqli->query($query_total) or die($mysqli->error.__LINE__);
			$row_total = $result_total->fetch_assoc();
			$row['total'] = $row_total['total'] ? $row_total['total'] : '0.00';

			$arr[] = $row;
		}
	}
	# JSON-encode the response
	$json_response = json_encode($arr, JSON_INVALID_UTF8_IGNORE);

	// # Return the response
	echo $json_response;
?>
