<?php



				include '../connect_database.php';

					$query_se = "SELECT * FROM purchase_confirm";
					$result_se = $conn->query($query_se);
					$request_counts=mysqli_num_rows($result_se);
					
?>