<?php

include 'C:\wamp\www\flashbook\connect_database.php';


					$query_se = "SELECT * FROM purchase_history WHERE Read_check = 'no' ";
					$result_se = $conn->query($query_se);
					$rowcount=mysqli_num_rows($result_se);
					echo $rowcount;

?>
