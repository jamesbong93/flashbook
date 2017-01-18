<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];
$user_id = $_POST["user_id"];



$query_se = "SELECT * FROM user_login WHERE ID = '".$user_id."' ";

$result = $conn->query($query_se);
	$row = $result->fetch_assoc();
	
if(isset($_POST["Submit2"])){
	
	$old_password = $_POST["old_password"];
	$ori_password = $row["password"];
	$new_password = $_POST["new_password"];
	$new_password_confirm = $_POST["new_password_confirm"];
	
	if($old_password == $ori_password && $new_password == $new_password_confirm){
		
		$query_update = "UPDATE user_login SET password = '".$new_password."' 
						WHERE ID = '".$user_id."'";

		$conn->query($query_update);
		
		?>
		<script>
		window.alert("Congratulation! Your password have been changed!");
		window.location.assign("homepage.php")
		 </script>
		<?php
		
	}
	elseif($new_password != $new_password_confirm){
		
		?>
		<script>
		window.alert("Sorry! Your new password enter is not match with confirmation password, please try again!");
		window.location.assign("password_change.php")
		 </script>
		<?php
		
	}
	else{
		
		?>
		<script>
		window.alert("Sorry! Your old password enter is not correct, please try again!");
		window.location.assign("password_change.php")
		 </script>
		<?php
		
		
		
		
	}
	
	
	
	
}




?>