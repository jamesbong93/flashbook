<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];

$user_id = $_GET["user_id"];
	$book_id = $_GET["book_id"];


	
	
$query_se = "INSERT INTO wish_list (User_ID,Book_ID) VALUES ('$user_id','$book_id')";
$conn->query($query_se);
	
	


?>
<script>
window.alert("Congratulation! You have add the book to your wish list!");
 window.history.back();
 </script>
<?php

?>