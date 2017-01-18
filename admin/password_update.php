<?php

session_start();
include 'C:\wamp\www\flashbook\connect_database.php';

$admin_ID = $_POST["admin_ID"];
$admin_email = $_POST["admin_email"];



$query_se = "SELECT * FROM admin_login WHERE ID = '".$admin_ID."' ";

$result = $conn->query($query_se);
	$row = $result->fetch_assoc();
	
if(isset($_POST["Submit2"])){
	
	$old_password = $_POST["old_password"];
	$ori_password = $row["password"];
	$new_password = $_POST["new_password"];
	$new_password_confirm = $_POST["new_password_confirm"];
	
	if($old_password == $ori_password && $new_password == $new_password_confirm){
		
		$query_update = "UPDATE admin_login SET password = '".$new_password."' 
						WHERE ID = '".$admin_ID."'";

		$conn->query($query_update);
		
		?>
		<script>
		window.alert("Congratulation! Your password have been changed!");
		window.location.assign("dashboard.php?admin_email=<?php echo $admin_email;?>");
		 </script>
		<?php
		
	}
	elseif($new_password != $new_password_confirm){
		
		?>
		<script>
		window.alert("Sorry! Your new password enter is not match with confirmation password, please try again!");
		window.location.assign("admin_setting.php?admin_email=<?php echo $admin_email;?>&admin_ID=<?php echo $admin_ID;?>");
		 </script>
		<?php
		
	}
	else{
		
		?>
		<script>
		window.alert("Sorry! Your old password enter is not correct, please try again!");
		window.location.assign("admin_setting.php?admin_email=<?php echo $admin_email;?>&admin_ID=<?php echo $admin_ID;?>")
		 </script>
		<?php
		
		
		
		
	}
	
	
	
	
}




?>