<?php

// Connect to database
$conn = new mysqli("localhost", "root", "password", "computersite");
if($conn->connect_error) {
	die("Unable to connect");
}


// Find the image with the right id
$id = $_GET['id'];
$sql = "select part_image from part where part_id = $id;";
$returnData = $conn->query($sql);


// Display the image
if ($returnData->num_rows > 0) {

	$row = $returnData->fetch_assoc();
	header("Content-type: image/jpeg");
	echo $row['part_image'];
	$conn->close();
	die();
}


?>