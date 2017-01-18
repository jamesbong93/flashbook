<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];

$user_id = $_GET["user_id"];
	$book_id = $_GET["book_id"];


	
	
$query_se = "DELETE FROM wish_list WHERE user_id = '".$user_id."'
			 and book_id = '".$book_id."'";
$conn->query($query_se);
	
	


?>
<script>
window.alert("You have deleted this book from your wish list!");
 window.history.back();
 </script>
<?php

?>