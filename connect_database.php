<?php


$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "flashbook";

	// Create connection
$conn = new mysqli($servername, $server_username, $server_password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	

?>