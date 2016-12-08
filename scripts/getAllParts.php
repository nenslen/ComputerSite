<?php

	/*
		This page gets all records and encodes to JSON
	*/
	
	
	
	// Connect to database
	$conn = new mysqli("localhost", "root", "password", "computersite");
	if($conn->connect_error) {
		die("Unable to connect");
	}
		
		
		
	$result = mysqli_query($conn, "SELECT part_id, part_name, part_description_short, part_description_long, part_synonyms, part_facts FROM part;");
	
	
	header('Content-type: text/javascript');
	$rows = array();
	

	while ($row = mysqli_fetch_array($result)) {
	
		$rows[] = $row;
	}
	
	
	echo json_encode($rows);
	
	$conn->close();
?>