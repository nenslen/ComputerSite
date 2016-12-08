<?php
phpinfo();

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

?>

<script>
console.log("writing");
</script>

<?php

$conn = new mysqli("localhost", "root", "password");


// Create database
$sql = "CREATE DATABASE computersite";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}


// Connect to database
$conn = new mysqli("localhost", "root", "password", "computersite");
if($conn->connect_error) {
	die("Unable to connect");
}


// Create Part table
$sql = "CREATE TABLE Part (
	    part_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	    part_name VARCHAR(100),
	    part_description_short VARCHAR(1000),
	    part_description_long VARCHAR(2500),
	    part_synonyms VARCHAR(1000),
	    part_facts VARCHAR(1000),
	    part_image MEDIUMBLOB)";


if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


?>