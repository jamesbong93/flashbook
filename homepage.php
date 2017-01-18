<?php
session_start();
include 'connect_database.php';


if(empty($_SESSION["username"])){
	
	
	$username = "";
	?>
	<script type="text/javascript">
		window.location = 'homepage_bfsign_in.php';
	</script>
	<?php
	
}
else{
$username = $_SESSION["username"];
}


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
	
	width: 200px;
	height: 300px;

	}
	

  


</style>
	  
		
		
		
</head>

<body>


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
					<li class = "active">
						<a class="navbar-brand " href="homepage.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Flashbook</a>
					</li>
					<li>
                        <a href="your_book.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Your books</a>
                    </li>
                    <li >
                        <a href="item.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Books</a>
                    </li>
                    <li>
                        <a href="feedback.php"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Feedback</a>
                    </li>
                    
					
					
                </ul >
				
				<ul class="nav navbar-nav navbar-right">
					<li class = "dropdown ">
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
	
				<br><br>
				<br><br>
			

    <!-- Page Content -->
	
     <div class="container">
		
		<ul class="nav navbar-nav navbar-left">
					<li>
                        <a href="#best_sellers"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Best Sellers</a>
                    </li>
                    <li>
                        <a href="#latest_features"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Latest Books</a>
                    </li>
                    <li>
                        <a href="#promo_books"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Most Viewd Books</a>
                    </li>
                    
			
					
		</ul >
			   
			   <div class = "search_box">
			   <?php include "search_box.php";?>
			   </div>
           
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
		
            <h1 >Welcome to Flashbook</h1>
			<img src = "home_book.png" width ="100%">
            <p>Welcome to Flashbook which you able to get your preferable book within a short time!</p>
            <p><a href = "your_book.php" class="btn btn-primary btn-large">Get Your Books!</a>
            </p>
			
        </header>

<?php
/*
$to       = 'freebong717@gmail.com';
$subject  = 'Testing sendmail.exe';
$message  = 'Hi, you just received an email using sendmail!';
$headers  = 'From: freebong717@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";
*/
?>

        <hr>
		
		
		
		<!-- Recommended  book-->
        <div class="row" >
            <div class="col-lg-12">
                <h3 id = "best_sellers">Best Sellers</h3>
            </div>
        </div>
		
        <div class="row text-center" >
		
		<?php 
		
		$query_user = "SELECT ID FROM user_login where username = '".$username."'";
		$result_user = $conn->query($query_user);
		$row_user = $result_user->fetch_assoc();
		
		$user_id = $row_user["ID"];
		
		$query_view = "SELECT ISBN,Price,Name,COUNT(purchase_history.Purchase_ID) AS NumberofSold
						FROM purchase_history  JOIN books ON purchase_history.Book_ID=books.ISBN 
						group by books.ISBN
					   order by NumberofSold DESC
					   LIMIT 4
					   ";
		
 
		$result_view = $conn->query($query_view);
				
					
			while($row_view = $result_view->fetch_assoc()) {
					
						$book_id = $row_view["ISBN"];
					$user_id = $row_user["ID"];
					$price = $row_view["Price"];
					$book_name = $row_view["Name"];
					
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   
                    
               
				
					
						
					 <img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                       
                        <p>
                            <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a>  
							<a href="item_info.php?ISBN_past=<?php echo $row_view["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
		?>
        </div>
		
		

		<hr>
		<div id = "latest_features">
		</div>
        <!-- Title -->
        <div class="row">
            <div  class="col-lg-12">
                <h3 >Latest Books</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <!-- /.row -->
		<div class="row text-center" >
		
		<?php 
		
		
		
		$user_id = $row_user["ID"];
		
		$query_view = "SELECT * FROM books
					   order by ISBN DESC
					   LIMIT 4
					   ";
		
 
		$result_view = $conn->query($query_view);
				
					
			while($row_view = $result_view->fetch_assoc()) {
					
					$book_id = $row_view["ISBN"];
					
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   
                    
               
				
					
						
					 <img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                       
                        <p>
                            <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a> 
							<a href="item_info.php?ISBN_past=<?php echo $row_view["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
		?>
        </div>
		
		
		<hr>
		
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3 id = "promo_books">Most Viewd Books</h3>
            </div>
        </div>
        <!-- /.row -->
		<?php 
		
		$query_user = "SELECT ID FROM user_login where username = '".$username."'";
		$result_user = $conn->query($query_user);
		$row_user = $result_user->fetch_assoc();
		
		$user_id = $row_user["ID"];
		
		$query_view = "SELECT books.ISBN, COUNT(View_history.View_ID) AS NumberofView
						FROM View_history  JOIN books ON View_history.Book_ID=books.ISBN 
						group by books.ISBN
					   order by NumberofView DESC
					   LIMIT 4
					   ";
		
 
		$result_view = $conn->query($query_view);
				
					
			while($row_view = $result_view->fetch_assoc()) {
					
					$book_id = $row_view["ISBN"];
					
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   
                    
               
				
					
						
					 <img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                       
                        <p>
                           <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a> 
							<a href="item_info.php?ISBN_past=<?php echo $row_view["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
		?>
    </div>

		
        <hr>
		

  

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include 'footer.php';?>

</html>
