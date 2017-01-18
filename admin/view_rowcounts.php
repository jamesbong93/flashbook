<?php



				include 'C:\wamp\www\flashbook\connect_database.php';

					$query_se = "SELECT * FROM view_history";
					$result_se = $conn->query($query_se);
					$view_counts=mysqli_num_rows($result_se);
					
?>