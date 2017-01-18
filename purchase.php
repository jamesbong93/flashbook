<?php

session_start();
include 'connect_database.php';
$username = $_SESSION["username"];


		



if (isset($_GET["Submit2"])){
	
	$book_id = $_GET{"book_id"};
	$book_name = $_GET{"book_name"};
	$user_id = $_GET["user_id"];
	$price = $_GET["price"];
	$payment_method = $_GET["payment_method"];
	$phone = $_GET["phone"];
	$sms_code = $_GET["sms_code"];
	$sms_code_enter = $_GET["sms_code_enter"];
	

	if($sms_code_enter == $sms_code){
		
		$query_se = "INSERT INTO purchase_history (User_ID,Book_ID,Payment_method,SMS_code,Phone_num,Read_check) VALUES 
		('$user_id','$book_id','$payment_method','$sms_code','$phone','no')";
		$conn->query($query_se);
	
	
				$query_countpurchase = "Select * FROM purchase_history where Book_ID = '".$book_id."' ";
				$result_countpurchase = $conn->query($query_countpurchase);
				$count_purchase=mysqli_num_rows($result_countpurchase);
				
			
				
			
		
					?>
					<script type="text/javascript">
					alert("Congratulation! You have purchased the book");
					window.location.assign("homepage.php");
					</script>
					<?php
	}

	else{
		
					
					
					?>
					<script type="text/javascript">
					alert("Your SMS code is not correct\nYour transaction failed!");
					window.location.assign("payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&book_name=<?php echo $book_name;?>&price=<?php echo $price;?> ");
					</script>
					<?php
	}
	
}




				
				



?>