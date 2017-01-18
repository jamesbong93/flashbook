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
                    <li class = "active">
                        <a href="item.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Books</a>
                    </li>
                    <li>
                        <a href="feedback.php"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Feedback</a>
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
                            <a href="password_change.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
					
					</li>
					 <li>
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
			
			
            <div class="col-md-3">
                <p class="lead">Book Categories</p>
                <div class="list-group">
                    <a href="item.php" class="list-group-item ">Arts & Photography</a>
                    <a href="item_business.php" class="list-group-item">Business & Money </a>
                    <a href="item_children.php" class="list-group-item ">Children's Books</a>
                    <a href="item_cook.php" class="list-group-item ">Cookbooks, Food & Wine</a>
                    <a href="item_computer.php" class="list-group-item ">Computer & Technology</a>
                    <a href="item_education.php" class="list-group-item active">Education & Teaching</a>
                  
                </div>
            </div>
			
		
        <div class="col-md-9">

             <div class="row" >
            <div class="col-lg-12">
                <h3 >Education & Teaching</h3>
            </div>
        </div>
		
        <!-- /.row -->
		<div class="row text-center" >
		
		<?php 
		
		 $ca = "Education & Teaching";
		$query_se = "SELECT * FROM books Where Category = '$ca' ";
		
		
		$query_user = "SELECT ID FROM user_login where username = '".$username."'";
				$result_user = $conn->query($query_user);
				$row_user = $result_user->fetch_assoc();
				 
				 
				 
		$result_se = $conn->query($query_se);
				
					
			while($row = $result_se->fetch_assoc()) {
					
				
					
					
				$book_id = $row["ISBN"];
					$user_id = $row_user["ID"];
					$price = $row["Price"];
					$book_name = $row["Name"];
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   

						
					<img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                      
                        <p>
						
                             <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a> 
							<a href="item_info.php?ISBN_past=<?php echo $row["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
					
				
				
					
				
				
		
		?>

				
           

          
		
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
