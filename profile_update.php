<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];

	$name = $_POST["name"];
	$email = $_POST["email"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$nationality = $_POST["nationality"];
	$user_id = $_POST["user_id"];

$query_se = "UPDATE user_login SET username = '".$name."',email = '".$email."',age = '".$age."',
			gender = '".$gender."',address = '".$address."',nationality = '".$nationality."'
			WHERE ID = '".$user_id."' ";
$conn->query($query_se);
	
	


?>
<script>
window.alert("Congratulation! Your profile have been updated");
window.location.assign("edit_profile.php")
 </script>
<?php

?>