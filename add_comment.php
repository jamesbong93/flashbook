
	<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];



				if( isset($_POST["R&C_submit"]) ){
				
				$user_id = $_POST["user_id"];
				$book_id = $_POST["book_id"];
				$rating =  $_POST["rating"];
				$comment = $_POST["comment"];
				$query_insertRandC = "INSERT INTO review (User_ID,Book_ID,Rating,Comment) VALUES ('$user_id','$book_id','$rating','$comment')";
				$conn->query($query_insertRandC);
					
				}
				
				?>
<script>
window.alert("Thanks! You have leave your comment on this book!");
 window.history.back();
 </script>
<?php

	
	
	?>