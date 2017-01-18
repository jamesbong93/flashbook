<?php
session_start();
include 'connect_database.php';
$username = $_SESSION["username"];
$category = "";
$author = ""; 
$budget = ""; 
				
		$query_user = "SELECT * FROM user_login where username = '".$username."'";
		$result_user = $conn->query($query_user);
		$row_user = $result_user->fetch_assoc();
		
		$user_id = $row_user["ID"];	
		$user_type = $row_user["type"];	
		
		
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

 
	  
<style>
	
	
	img.home_page_book{
	
	width: 200px;
	height: 300px;
	
	}
	

</style>
	  
</head>



</script>
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
					<li class="active">
                        <a href="your_book.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Your books</a>
                    </li>
                    <li>
                        <a href="item.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Books</a>
                    </li>
                    <li>
                        <a href="feedback.php"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Feedback</a>
                    </li>
                    
					
					
                </ul >
				
				<ul class="nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a data-toggle="dropdown" href="sign_in.php" ><span class="dropdown-toggle glyphicon glyphicon-user" aria-hidden="true"></span> User: <?php echo $username;?></a>
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
                        <a href="" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Shopping Cart</a>
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
	
		<br><br><br>
		<br>
		

			<?php
			if (isset($_POST["Rec_btn"])){
				
				
				?>
					<script type="text/javascript">
					$(document).ready(function(){
					$("#RecModel").modal('show');
					});
					</script>
					<?php
			}
		?>
		
		
		  
		  
    <?php include "search_box.php";?>
		
		
		<?php
		if($user_type == "Guest_user"){
		
				?>
		<!-- Recommended  book-->
        <div class="row" >
            <div class="col-lg-12">
                <h3 >Recommendation based on your answer to the questions</h3>
            </div>
        </div>
		
        <!-- /.row -->
		<br>
		 <form method = "post" >
			
              <div >
			<input type = "submit" class="btn btn-primary" name = "Rec_btn"  value = "Answer the Questions" ></input>
            
          </div>
			</form>

          <br><br>
		<div class="row text-center" >
		
		<?php 
		
		if(isset($_POST["Submit2"])){
						
						$category = $_POST["quest_category"];
						$author = $_POST["guest_author"];
						
						
					}
			
		$query_know = "SELECT * FROM books Where Category = '$category' and Author = '$author' ";
						
 
		$result_know = $conn->query($query_know);
		

					
			while($row_know = $result_know->fetch_assoc()) {
					
					$book_id = $row_know["ISBN"];
					$user_id = $row_user["ID"];
					$price = $row_know["Price"];
					$book_name = $row_know["Name"];
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   
					 <img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                        <p>
                           <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a> 
							<a href="item_info.php?ISBN_past=<?php echo $row_know["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
		?>
		<hr>
			<hr>
        </div>
		<?php
		}
		
		?>
		

		<?php
		if($user_type == "FB_user"){
		
				?>
	
		
		
		<div class="row" >
            <div class="col-lg-12">
                <h3 >Recommendation based on who you are</h3>
            </div>
        </div>
		
		<div class="row text-center" >
		
		<?php 
		
		$query = "SELECT * FROM user_login WHERE ID = '".$user_id."'";
		$result = $conn->query($query);
		$row_age = $result->fetch_assoc();
		
		$age_user = $row_age["age"];
		$age_usersmall = $age_user - 2;
		$age_userbig = $age_user + 2;
		

		
		$query_view = "SELECT DISTINCT ISBN,Price,Name FROM books,purchase_history,user_login
					   WHERE  user_login.ID IN 
						(SELECT distinct ID FROM user_login
						WHERE gender IN (select gender FROM user_login WHERE ID = '".$user_id."')
						and age IN (select age FROM user_login WHERE ID = '".$user_id."' or age BETWEEN '".$age_usersmall."' AND '".$age_userbig."') 
					   )
						and purchase_history.Book_ID NOT IN (Select Book_ID from purchase_history WHERE User_ID = '".$user_id."' )
						and purchase_history.Book_ID = books.ISBN
					   and purchase_history.User_ID = user_login.ID
					   order by books.Sold_num DESC
					   Limit 4
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
		
        </div><hr><hr>
		<?php
		}
		
		?>
		

		
        <div class="row">
            <div  class="col-lg-12">
                <h3 >Your Recently Viewed Books</h3>
            </div>
        </div>
        <!-- /.row -->

		
        <div class="row text-center" >
		
		<?php 
		

		
		$query_view = "SELECT DISTINCT ISBN,Name,Price FROM books,view_history,user_login
					   WHERE view_history.User_ID = '".$user_id."'
					   and view_history.User_ID = user_login.ID
					   and view_history.Book_ID = books.ISBN
					   order by view_history.View_ID DESC
					   LIMIT 4
					   ";
		
 
		$result_view = $conn->query($query_view);
				
					
			while($row_view = $result_view->fetch_assoc()) {
					
					$book_id = $row_view["ISBN"];
					$user_id = $row_user["ID"];
					$price = $row_view["Price"];
					$book_name = $row_view["Name"];
					
					$query_insert = "INSERT INTO recommneded_list (User_ID,ISBN) VALUES ('$user_id','$book_id') ";
					 $conn->query($query_insert);
					
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
		<hr>
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Recommendation Based On Your Shopping Trend</h3>
            </div>
        </div>
        <!-- /.row -->

                <div class="row text-center" >
		
		<?php 
		
		$query_user = "SELECT ID FROM user_login where username = '".$username."'";
		$result_user = $conn->query($query_user);
		$row_user = $result_user->fetch_assoc();
		$user_id = $row_user["ID"];

		
		$query_purchase = "SELECT DISTINCT ISBN,Price,Name FROM books,purchase_history,user_login
					   WHERE purchase_history.Book_ID = books.ISBN
					   and purchase_history.User_ID = user_login.ID
					   and purchase_history.User_ID IN (Select distinct User_ID From books,purchase_history,user_login
					   Where purchase_history.Book_ID IN (Select distinct ISBN From books,purchase_history,user_login
                       WHERE User_ID = '".$user_id."'
					   and purchase_history.Book_ID = books.ISBN
					   and purchase_history.User_ID = user_login.ID
						)
						and purchase_history.User_ID != '".$user_id."'
					    )
						and purchase_history.Book_ID NOT IN (Select Book_ID from purchase_history WHERE User_ID = '".$user_id."' )
						order by books.Sold_num DESC
					   LIMIT 0,4
					   ";
		

		$result_purchase = $conn->query($query_purchase);
				
					
			while($row_purchase = $result_purchase->fetch_assoc()) {
					
					$book_id = $row_purchase["ISBN"];
					$user_id = $row_user["ID"];
					$price = $row_purchase["Price"];
					$book_name = $row_purchase["Name"];
					
					$query_insert = "INSERT INTO recommneded_list (User_ID,ISBN) VALUES ('$user_id','$book_id') ";
					 $conn->query($query_insert);
				
					
					
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   
                    
               
				
					
						
					 <img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                       
                        <p>
                           <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a> 
							<a href="item_info.php?ISBN_past=<?php echo $row_purchase["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
		?>
        </div>
		
        <hr>
        <hr>
		
		<div class="row">
            <div class="col-lg-12">
                <h3>Recommendation Based On Your Rating To The Books</h3>
            </div>
        </div>
        <!-- /.row -->

                <div class="row text-center" >
		
		<?php 
		
		$query_user = "SELECT ID FROM user_login where username = '".$username."'";
		$result_user = $conn->query($query_user);
		$row_user = $result_user->fetch_assoc();
		$user_id = $row_user["ID"];

		
		$query_rating = "SELECT DISTINCT ISBN,Price,Name FROM books,review,user_login
					   WHERE review.Book_ID = books.ISBN
					   and review.User_ID = user_login.ID
					   and review.User_ID IN (Select distinct User_ID From books,review,user_login
					   Where review.Book_ID IN (Select distinct ISBN From books,review,user_login
                       WHERE User_ID = '".$user_id."'
					   and review.Book_ID = books.ISBN
					   and review.User_ID = user_login.ID
						)
						and review.User_ID != '".$user_id."'
					    )
						and review.Rating >= 4
						and review.Book_ID NOT IN (Select Book_ID from review WHERE User_ID = '".$user_id."' )
						order by books.Sold_num DESC
						 LIMIT 0,4
					   ";
		

		$result_rating= $conn->query($query_rating);
				
					
			while($row_rating = $result_rating->fetch_assoc()) {
					
					$book_id = $row_rating["ISBN"];
					$user_id = $row_user["ID"];
					$price = $row_rating["Price"];
					$book_name = $row_rating["Name"];
					
					$query_insert = "INSERT INTO recommneded_list (User_ID,ISBN) VALUES ('$user_id','$book_id') ";
					 $conn->query($query_insert);
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   
                    
               
				
					
						
					 <img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                       
                        <p>
                           <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a> 
							<a href="item_info.php?ISBN_past=<?php echo $row_rating["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
		?>
        </div>
		
        <hr>
        <hr>
		
		
		
		<div  id = "promo_books">
		</div>
       

       	<div id = "latest_features">
		</div>
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Inspired by Your Wish Lists</h3>
            </div>
        </div>
        <!-- /.row -->

        <div class="row text-center" >
		
		<?php 
		
		
		
		
		
		$query_wish = "SELECT DISTINCT ISBN,Price,Name FROM books,wish_list,user_login
					   WHERE wish_list.User_ID = '".$user_id."'
					   and wish_list.User_ID = user_login.ID
					   and wish_list.Book_ID = books.ISBN
					   order by wish_list.Wish_ID DESC
					   LIMIT 4
					   ";
		
 
		$result_wish = $conn->query($query_wish);
				
					
			while($row_wish = $result_wish->fetch_assoc()) {
					
					$book_id = $row_wish["ISBN"];
					$user_id = $row_user["ID"];
					$price = $row_wish["Price"];
					$book_name = $row_wish["Name"];
					
					$query_insert = "INSERT INTO recommneded_list (User_ID,ISBN) VALUES ('$user_id','$book_id') ";
					 $conn->query($query_insert);
					
			?>
			<div class="col-md-3 col-sm-6 hero-feature" > 
                
				
				 <div class="thumbnail">
                   
                    
               
				
					
						
					 <img class = "home_page_book" src ="books_pic\<?php echo $book_id ?>.jpg" >
					<div class="caption">
                      
                        <p>
                            <a href= "payment_gateway.php?user_id=<?php echo $user_id;?>&book_id=<?php echo $book_id;?>&price=<?php echo $price;?>&book_name=<?php echo $book_name;?>" class="btn btn-primary">Buy Now!</a> 
							<a href="item_info.php?ISBN_past=<?php echo $row_wish["ISBN"]?> "class="btn btn-default">More Info</a>
                        </p>
                    </div>
				
				
				 </div>
            </div>
			<?php
			}
		?>
        </div>
		
		
		<hr>

		<hr>
		
         <div class="row">
            <div  class="col-lg-12">
                <h3 >Highly recommended to you</h3>
            </div>
        </div>
        <!-- /.row -->

		
        <div class="row text-center" >
		
		<?php 
		

	

		$query_view = "SELECT  books.ISBN,books.Name,books.Price,Count(recommneded_list.Rec_ID) AS num_get 
						FROM books,recommneded_list,user_login
					   WHERE recommneded_list.User_ID = '".$user_id."'
					   and recommneded_list.User_ID = user_login.ID
					   and recommneded_list.ISBN = books.ISBN
					   
					   group by books.ISBN,books.Name,books.Price
					   Having num_get >= 2
					     ORDER BY num_get DESC
					   LIMIT 0,4
					   ";


		$result_view = $conn->query($query_view);
		
		$query_delete = "DELETE FROM recommneded_list WHERE User_ID = '".$user_id."' ";
				
		$conn->query($query_delete);
		
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
	</div>
	
			
		<div id = "RecModel" class="modal fade">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			  
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Please answer the questions below properly</h4>
			  </div>
		
			  <div class="modal-body">
				
		<form name = "quest_rcdform" method = "post" action = "your_book.php">
				
			<div class="form-group">
            <label class="col-sm-3 control-label">Select the type of books you like the most: </label>
            <div class="col-sm-9">
			<select class = "form-control" name = "quest_category" >
			<option value="" disabled selected>Select Category...</option>
			<option>Arts & Photography </option>
			<option>Business & Money</option>
			<option>Children's Books</option>
			<option>Computers & Technology </option>
			<option>Cookbooks, Food & Wine</option>
			<option>Education & Teaching</option>
			<option>Health, Fitness & Dieting</option>
			<option>History </option>
			<option>Literature & Fiction</option>
			<option>Politics & Social Sciences</option>
			<option>Reference</option>
			<option>Religion & Spirituality</option>
			<option>Science & Math</option>
			<option>Travel</option>
			</select>	
            </div>
			</div>
			
			<br><br><br><br>
			
			<div class="form-group">
            <label class="col-sm-3 control-label">Who is your most favorite author: </label>
			<div class="col-sm-9">
			<input class = "form-control" type = "text" name = "guest_author" placeholder= "Enter the author name" >	
            </div>
			</div>	
				
			<br><br><br><br>
			
			
			
			
			  
			 
            <div class="pull-right">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" name = "Submit2" class="btn btn-primary" value = "Submit" >
			</div>
		</form>
	 <div class="modal-footer">
			 
			
				
				
				

				
		
			

			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->	

    </div>
			

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include 'footer.php';?>
</html>
