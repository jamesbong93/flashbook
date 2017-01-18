<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];

if (isset($_POST["Submit2"])){
	
	
	$user_id = $_POST["user_id"];
	$full_name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	$rating = $_POST["rating"];
	
	

	
		
		$query_se = "INSERT INTO feedback_form (User_ID,Full_name,Email,Message,Rating) VALUES 
		('$user_id','$full_name','$email','$message','$rating')";
		$conn->query($query_se);
	

		
					?>
					<script type="text/javascript">
					alert("Thanks! You have Leave your feedback on this website");
					window.location.assign("homepage.php");
					</script>
					<?php
}	
	?>