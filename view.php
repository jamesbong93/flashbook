<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];

$user_id = $_POST["user_id"];
	$book_id = $_POST["book_id"];

echo $user_id;
echo $book_id;
if(isset($_POST["purchase_submit"])){
	
	
$query_se = "INSERT INTO view_history (User_ID,Book_ID) VALUES ('$user_id','$book_id')";
$conn->query($query_se);
	
	
}

?>
<script>
 window.history.back();
 </script>
<?php

?>