<?php
session_start();
include 'connect_database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="image/favicon.png">

  




<script>

function return_back(){
	
	 window.location = 'sign_in.php';
	
	
}


</script>
</head>




<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
                <a class="navbar-brand" href="homepage.php">Flashbook</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<br><br>


<?php

$username = $_POST["username"];
$password = $_POST["password"];
 $visit_times = 0;
if (isset($_POST["login_btn"])){
	$sql_select = "SELECT * from user_login";
	
	$conn->query($sql_select);
	
	$resultfound = false;
	$result = $conn->query($sql_select);


		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
			   if($row["username"] === $username && $row["password"] === $password){
				    $visit_times = $row["visit_times"];
					$visit_times = $visit_times + 1;
					$resultfound = true;
					
					break;
				   
			   }
			   
			   
			  
			}
			
		}	

		if($resultfound){
			$_SESSION["username"] = $username;	
			
			
			$sql_visit_tiems = "UPDATE user_login SET visit_times = '".$visit_times."' WHERE username = '".$username."' ";
			$conn->query($sql_visit_tiems);
			
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$date_visited =  date("Y-m-d h:i:sa");
			$sql_login_time = "UPDATE user_login SET last_signin = '".$date_visited."' WHERE username = '".$username."' ";
			$conn->query($sql_login_time);
			
			?>
			<script type="text/javascript">
			window.location = 'homepage.php';
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
			 $(document).ready(function(){
			$("#myModal").modal('show');
			});
			</script>
			<?php
			
		}
		
	
}




?>



<!--Congratulation  -->
        <div id = "myModal" class="modal fade">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			  
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Your username and password is invalid </h4>
			  </div>
			 
			  <div class="modal-body">
				<label >Please enter valid username and password</label>
			  </div>
			  <div class="modal-footer">

			  <form action = "sign_in.php" >
				<button type="button" onclick = "return_back()" class="btn btn-primary" data-dismiss="modal">OK</button>
			</form>
				
				
			
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</body>




</html>