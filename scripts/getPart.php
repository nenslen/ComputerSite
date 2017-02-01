<?php

	/*
		This page gets a single part and displays in JSON
	*/
	
	
	
	// Connect to database
	$conn = new mysqli("localhost", "root", "password", "computersite");
	if($conn->connect_error) {
		die("Unable to connect");
	}
		
		
	$id = $_GET['id'];
		
	$result = mysqli_query($conn, "SELECT part_id, part_name, part_description_short, part_description_long, part_synonyms, part_facts, part_image 
								   FROM part
								   WHERE part_id = $id;");
	
	
	header('Content-type: text/javascript');
	$rows = array();
	

	while ($row = mysqli_fetch_array($result)) {
	
		$rows[] = $row;
	}
	
	
	echo json_encode($rows);
	
	$conn->close();
?>