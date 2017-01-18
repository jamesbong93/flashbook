<?php



				include 'C:\wamp\www\flashbook\connect_database.php';

					$query_se = "SELECT * FROM purchase_history,user_login,books
							where purchase_history.User_ID = user_login.ID 
							and purchase_history.Book_ID = books.ISBN
							and purchase_history.Purchase_date LIKE '%". date("Y-m-d") . "%'";
							
					$result_se = $conn->query($query_se);
					$today_counts=mysqli_num_rows($result_se);
					
?>