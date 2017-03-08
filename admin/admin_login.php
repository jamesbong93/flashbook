<?php
session_start();
include '../connect_database.php';
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
	
	 window.location = 'admin_login.html';
	
	
}


</script>
</head>




<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
                <a class="navbar-brand" href="http://callarocket.com/">Flashbook</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<br><br>


<?php

$admin_email = $_POST["admin_email"];
$admin_password = $_POST["admin_password"];

if (isset($_POST["Submit1"])){
	$sql_select = "SELECT ID,Email,password from admin_login";
	
	$conn->query($sql_select);
	
	$resultfound = false;
	$result = $conn->query($sql_select);
	

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
			   if($row["Email"] == $admin_email && $row["password"] == $admin_password){
					$resultfound = true;
					
					break;
				   
			   }
			   
			   
			  
			}
			
		}	

		if($resultfound){
			 $admin_email = $row["Email"];
			
			?>
			<script type="text/javascript">
			window.location.assign("dashboard.php?admin_email=<?php echo $admin_email;?>");
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
				<h4 class="modal-title">Your email and password is invalid </h4>
			  </div>
			 
			  <div class="modal-body">
				<label >Please enter valid email and password</label>
			  </div>
			  <div class="modal-footer">

			  
				<button type="button" onclick = "return_back()" class="btn btn-primary" data-dismiss="modal">OK</button>

				
				
			
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</body>




</html>