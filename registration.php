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

$username =  mysqli_real_escape_string($conn,$_POST["username"]);
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if (isset($_POST["register_btn"])){
	
	$sql_select = "SELECT * from user_login";
	
	$conn->query($sql_select);
	
	$resultfound = false;
	$result = $conn->query($sql_select);


		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
			   if($row["username"] != $username){
				   
					$resultfound = true;
					break;
				   
			}else{
				$resultfound = false;
				
			}
			   
			   
			  
			}
			
		}	

		if($resultfound){
			
			if($password != $confirm_password){
		
			?>
			<script type="text/javascript">
			 window.alert("Password and confirm password is not matached!");
			 window.location = 'registration.html';
			</script>
			<?php
		
			}
	else{
		
	$sql_insert = "INSERT INTO user_login (username, password, type)
	VALUES ('$username', '$password', 'Guest_user')";
	
	
	
	
	$result = $conn->query($sql_insert);
	
		
		

		if($result){
			
			?>
			
			<script type="text/javascript">
			$(document).ready(function(){
			$("#myModal").modal('show');
			});
	
			</script>
			<?php
		}
				else{
			
			
				?>
			<script type="text/javascript">
			 window.alert("The username has been registered!");
			 window.location = 'registration.html';
			</script>
			<?php
			
			
		}
	}
	
			
		}
		
		
		
		else{
			
			
				?>
			<script type="text/javascript">
			 window.alert("The username has been registered!");
			 window.location = 'registration.html';
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
				<h4 class="modal-title">Congratulation! Account created!</h4>
			  </div>
			 
			  <div class="modal-body">
				<label></label>
			  </div>
			  <div class="modal-footer">

			  
				<button type="button" onclick = "return_back()" class="btn btn-primary" data-dismiss="modal">OK</button>

				
				
			
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</body>


</html>