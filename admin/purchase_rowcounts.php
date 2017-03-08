<?php



				include '../connect_database.php';

					$query_se = "SELECT * FROM purchase_history";
					$result_se = $conn->query($query_se);
					$purchase_counts=mysqli_num_rows($result_se);
					
?>