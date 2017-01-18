<?php
session_start();
include 'connect_database.php';
$username = $_SESSION["username"];



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flashbook</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="image/favicon.png">

	
<style>
	img.home_page_book{
	width: 150px;
	height: 200px;
	}
	
	img.payment_logo{
		width: 100px;
	height: 100px;
	margin:10px;
	
		
	}
	
	input#search {
    width: 18em;  height: 5em;
	 
	
		}
</style>







</head>

<body>

     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li>
						<a class="navbar-brand " href="homepage.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Flashbook</a>
					</li>
					<li>
                        <a href="your_book.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Your books</a>
                    </li>
                    <li >
                        <a href="item.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Books</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> About us</a>
                    </li>
                    
					
					
                </ul >
				
				<ul class="nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a data-toggle="dropdown" href="sign_in.html" ><span class="dropdown-toggle glyphicon glyphicon-user" aria-hidden="true"></span> User: <?php echo $username;?></a>
					
					<ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
					
					</li>
					 <li >
                        <a href="wish_list.php" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Wish List</a>
                    </li>
					<li class = "active">
                        <a href="#" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Shopping Cart</a>
                    </li>
					<li>
					
					</li>
					
				</ul>
				
					   
			  
            </div >

            <!-- /.navbar-collapse -->
		
        </div>
        <!-- /.container -->

	</nav>
	
	
	
	<?php
	
	
	if(isset($_GET["Submit2"])){
		$book_id = $_GET{"book_id"};
		$book_name = $_GET{"book_name"};
		$user_id = $_GET["user_id"];
		$price = $_GET["price"];
		$payment_method = $_GET["payment_method"];
		$phone = $_GET["phone"];
		$sms_code = $_GET["sms_code"];
		
		$query_se = "INSERT INTO purchase_confirm (User_ID,Book_ID,Phone_num,SMS_code) VALUES ('$user_id','$book_id','$phone','$sms_code')";
		$conn->query($query_se);
		
				
				/*
				if($conn->query($query_se)){
					$smsNotify = 1;
					}
				
					$conn->close();
					
					if($smsNotify == 1){
						require "Services/Twilio.php";
						$AccountSid = "AC82b5ef92bb88e9f9f445a75c2f3fcfb2";
						$AuthToken = "091ec8e0bad25bb49b5506d77483c8b2";
						$http = new Services_Twilio_TinyHttp(
							'https://api.twilio.com',
							array('curlopts' => array(
							CURLOPT_SSL_VERIFYPEER => false,
							CURLOPT_SSL_VERIFYHOST => 2,
						)));
					
						$client = new Services_Twilio($AccountSid, $AuthToken, "2010-04-01", $http);
						$people = array(
						"+60176961042" => "ADMIN",
						"+6.$phone" => "$username"
						
						);
						
						foreach ($people as $number => $username) {
				 
						$sms = $client->account->messages->sendMessage(
				 
						// Step 6: Change the 'From' number below to be a valid Twilio number 
						// that you've purchased, or the (deprecated) Sandbox number
							"+12512810499", 
				 
							// the number we are sending to - Any phone number
							$number,
				 
							// the sms body
							"Hey $username, your sms code: $sms_code"
							
						);
				 
						// Display a confirmation message on the screen
						//echo "Sent message to $name";
						}
					}
					*/
					
					
					
		?>
		<script type="text/javascript">
					$(document).ready(function(){
					$("#myModal").modal('show');
					});
					</script>
					<?php
	}




?>

<!--confimation code -->
        <div id = "myModal" class="modal fade">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			  
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Please enter the SMS code that send to your mobile phone </h4>
			  </div>
			  <form action = "purchase.php" method = "GET">
			  <div class="modal-body">
				SMS Code:<input class = "form-control" type = "text" name = "sms_code_enter"  placeholder= "Enter the code">
				<input type="hidden" name="payment_method" value = "<?php echo $payment_method;?>">
				<input type = "hidden" name = "user_id" value = "<?php echo $user_id;?>">
				<input type = "hidden" name = "book_id" value = "<?php echo $book_id;?>">	
				<input type = "hidden" name = "book_name" value = "<?php echo $book_name;?>">	
				<input type = "hidden" name = "price" value = "<?php echo $price;?>">	
				<input type = "hidden" name = "phone" value = "<?php echo $phone;?>">	
				<input type = "hidden" name = "sms_code" value = "<?php echo $sms_code;?>">	
					
			  </div>
			 
            
        
			  <div class="modal-footer">
			  <p class="pull-left"> </p>
			
				
				
				
				
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" name = "Submit2" class="btn btn-primary" value = "Next" >
				


				
				</form>
				

			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->	
		
		
</body>

</html>		
		