<!DOCTYPE html>
<?php

$admin_email = $_GET["admin_email"];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	
    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
	
  <style>
	table.sortable thead {
    background-color:#eee;
    color:#666666;
    font-weight: bold;
    cursor: pointer;

}
	</style>

<script>
function show_confirm() {
    alert("New book was added!");
}

function goback(){
	
	window.location = "edit.php?admin_email=<?php echo $admin_email;?>";
	
}
</script>

</head>



<body>

    <div id="wrapper">

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Navigation -->
            <?php include 'sidebar.php'?>
			<!-- Navigation -->
		
			
			<div class="collapse navbar-collapse navbar-ex1-collapse">
                               <ul class="nav navbar-nav side-nav">
                    
                     <li >
                        <a href="dashboard.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                    </li>
                    <li  class="active">
                        <a href="books.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-wrench"></i> Books </a>
                    </li>
					<li>
                        <a href="today_order.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Today orders  <span class="badge alert-info"> <?php echo $today_counts;?></a>
                    </li>
					<li >
                        <a href="yesterday_order.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Yesterday orders  <span class="badge alert-info"> <?php echo $yesterday_counts;?></a>
                    </li>
                    <li>
                        <a href="purchase_history.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Purchase History  <span class="badge alert-info"> <?php echo $purchase_counts;?></a>
                    </li>
					<li>
                        <a href="purchase_request.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-wrench"></i> Purchase Request <span class="badge alert-info"> <?php echo $request_counts;?></a>
                    </li>
					<li >
                        <a href="view_history.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-calendar"></i>  View History <span class="badge alert-info"> <?php echo $view_counts;?></a>
                    </li>
					<li>
                        <a href="report.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-list-alt"></i> Customer Reports </a>
                    </li>
					<li>
                        <a href="sales_report.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-list-alt"></i> Sales Reports </a>
                    </li>
					<li>
                        <a href="feedback_analysis.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-list-alt"></i> Feedback Reports </a>
                    </li>
                    
                   
                </ul>
			
			
            </div>
		</nav>
        

    <div id="page-wrapper">
	 <div class="container-fluid">
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add books <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Add new books
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
    <div  class="col-md-8 col-md-offset-0" >
	
      <form name = "newbookform" class="form-horizontal" method = "post"  onsubmit = "show_confirm()">
      

          <!-- Form Name -->
          <legend id = "le">Fill in the information of new book</legend>

          <!-- Name input-->
		  
		  <div class="form-group">
            <label class="col-sm-3 control-label">Name: </label>
            <div class="col-sm-9">
			<input class = "form-control"type = "text" name = "name" placeholder = "Enter the book name..." required auto-focus>
            </div>
          </div>
		  
		  
          <div class="form-group">
            <label class="col-sm-3 control-label">Category: </label>
            <div class="col-sm-9">
						<select class = "form-control" name = "category" required>
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
		  
		  <!-- Contact input-->
          <div class="form-group">
            <label class="col-sm-3 control-label">Author: </label>
            <div class="col-sm-9">
			<input class = "form-control" type = "text" name = "author"  placeholder= "Enter the author name..." required>	
            </div>
          </div>
		  
		    <!-- Address input-->
          <div class="form-group">
            <label class="col-sm-3 control-label">Pubblise date: </label>
            <div class="col-sm-9">
			<input class = "form-control" type = "date" name = "publish_date" required>	
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-3 control-label">Price: </label>
            <div class="col-sm-9">
			<input class = "form-control" type = "text" name = "price"  placeholder= "Enter the book price (RM)..." required>	
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-3 control-label">Description: </label>
            <div class="col-sm-9">
			<textarea class = "form-control"  rows = "5" name = "description"  placeholder= "Enter the detail of the book..." required></textarea>	
            </div>
          </div>
		  
		  
		  
		   <div class="form-group">
            <label class="col-sm-3 control-label">Image: </label>
            <div class="col-sm-9">
			<input class = "form-control" type = "file" name = "book_image" >	
            </div>
          </div>
		  
		 
		  
		 
		  <legend></legend>
		 
         
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
			  
				<input type = "button" value = "Back" class="btn btn-primary" onclick="goback()">
				
                <input class="btn btn-primary" type="submit" name = "add_btn" value = "Add"   >
              </div>
            </div>
        

       
      </form>
	  
	  <?php
	  
	  if(isset($_POST["add_btn"])){
							
							$name = $_POST["name"];
							$category = $_POST["category"];
							$author = $_POST["author"];
							$publish_date = $_POST["publish_date"];
							$price = $_POST["price"];
							$description = $_POST["description"];
							$stock_num = $_POST["stock_num"];
							
							
							
							$query_add = "INSERT INTO books(Name,Category,Author,Publish_date,Price,Description,Stock_num) VALUES 
							('$name','$category','$author','$publish_date','$price','$description','$stock_num')";
							
							$conn->query($query_add);
								
							
								
	
							
							
						}
						
	?>
	 
    </div><!-- /.col-lg-12 -->
			</div>
		</div>
    </div>
	
	 <script src="js/bootstrap.min.js"></script>
</body>

</html>
