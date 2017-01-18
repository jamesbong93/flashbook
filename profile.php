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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
<style>
	img.home_page_book{
	width: 150px;
	height: 200px;
	}
	
	form#p_form{
		
		font-size:150%;
	}
</style>

<script>
function goBack() {
    window.history.back()
}
</script>

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
                        <a href="feedback"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Feedback</a>
                    </li>
                    
					
					
                </ul >
				
				<ul class="nav navbar-nav navbar-right">
					<li class = "dropdown active">
						<a data-toggle="dropdown" href="sign_in.html" ><span class="dropdown-toggle glyphicon glyphicon-user" aria-hidden="true"></span> User: <?php echo $username;?></a>
					
					<ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li>
                            <a href="password_change.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
					<li>
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

    <!-- Page Content -->
    <div class="container">
		 <br> <br><br>
		 
	 <?php include "search_box.php";?>
			
			<br><br><br>
        <div class="row">
			
			
		<?php 
		
		
		
		$query_user = "SELECT * FROM user_login where username = '".$username."'";
				$result_user = $conn->query($query_user);
				$row_user = $result_user->fetch_assoc();
				 
		$user_id = $row_user["ID"];		
		
		
		?>
			
		
        <div class="col-md-9">

             <div class="row" >
            <div class="col-lg-12">
                <h2 >Your Account information</h2>
            </div>
        </div>
		
        <!-- /.row -->
		<div  >
		
		
			
		 <form id = "p_form" name = "profile_form" action = "edit_profile.php" class="form-horizontal" method = "post" >
      

         
          <!-- Name input-->
		  
		  
            <label>Name: </label>
			<?php echo $row_user["username"]?>
			<br>
		  
		  
		  <!-- Contact input-->
			<label>Email: </label>
			<?php echo $row_user["email"]?>
			<br>
		  
		    <!-- Address input-->
			<label>Age: </label>
			<?php echo $row_user["age"]?>
			<br>
		  
			<label>Gender: </label>
			<?php echo $row_user["gender"]?>
			<br>
		  
			<label>Address: </label>
			<?php echo $row_user["address"]?>
			<br>
		  
			<label>Nationality: </label>
			<?php echo $row_user["nationality"]?>
			<br>
		  
		  
		  
		 
		  
		 
		  <legend></legend>
		 
         
              <div class="pull-left">
			  
				<input type = "button" value = "Back" class="btn btn-primary" onclick="goBack()">
				
                <input class="btn btn-primary" type="submit" name = "add_btn" value = "Edit"   >
              </div>
           
        

       
      </form>
	  
				
				
					
				
				
		
		

				
           

          
		
        </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

       
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include 'footer.php';?>
</html>
