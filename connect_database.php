<?php


$servername = "139.59.108.5";
$server_username = "root";
$server_password = "James@321";
$dbname = "flashbook";

	// Create connection
$conn = new mysqli($servername, $server_username, $server_password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	

?>