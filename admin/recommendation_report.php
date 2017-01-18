
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
	.breadcrumb li a    {
    color: blue;
}
	</style>
	


</head>



<body>

    <div id="wrapper">

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Navigation -->
            <?php 
			
			include 'sidebar.php';
			
			?>
			<!-- Navigation -->
		
			
			<div class="collapse navbar-collapse navbar-ex1-collapse">
               	<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
					<li>
                        <a href="dashboard.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                    </li>
                    <li >
                        <a href="books.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-wrench"></i> Books </a>
                    </li>
					<li>
                        <a href="today_order.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Today orders  <span class="badge alert-info"> <?php echo $today_counts;?></a>
                    </li>
					<li>
                        <a href="yesterday_order.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Yesterday orders  <span class="badge alert-info"> <?php echo $yesterday_counts;?></a>
                    </li>
                    <li>
                        <a href="purchase_history.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Purchase History <span class="badge alert-info"> <?php echo $purchase_counts;?></a>
                    </li>
					<li>
                        <a href="purchase_request.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-wrench"></i> Purchase Request <span class="badge alert-info"> <?php echo $request_counts;?></a>
                    </li>
					<li>
                        <a href="view_history.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-calendar"></i>  View History <span class="badge alert-info"> <?php echo $view_counts;?></a>
                    </li>
					<li class = "active">
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
			
			
            </div>
		</nav>
		
<?php

$user_id = $_GET["user_id"];

if (isset($_GET["search2"])){
	$sql_select = "SELECT ID from user_login";
	
	$conn->query($sql_select);
	
	$resultfound = false;
	$result = $conn->query($sql_select);
	

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
			   if($row["ID"] == $user_id){
					$resultfound = true;
					
					break;
				   
			   }
			   
			   
			  
			}
			
		}	

		if($resultfound){
			 
			
		}
		else{
			?>
			<script type="text/javascript">
			window.alert("Please enter valid user ID");
			window.location.assign("report.php?admin_email=<?php echo $admin_email;?>");
			</script>
			<?php
			
		}
		
	
}




?>



<?php



			$query_getname = "SELECT * FROM user_login WHERE ID = '".$user_id."' ";
				$result_name = $conn->query($query_getname);
				
				$row_name = $result_name->fetch_assoc();
				
				$user_name = $row_name["username"];
				
				
?>
    <div id="page-wrapper">
	 <div class="container-fluid">
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Recommendation Report
                        </h1>
                        <p>Customer Name: <?php echo $user_name;?></p>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
		
				
				

				
				
				
					<div class="col-md-15">
                        
						
						<br>
						<ol class="breadcrumb blue" >
                            <li class="active ">
                                <i class="fa fa-dashboard"></i> Based on customer's shopping trend
                            </li>
                        </ol>
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                      
									
                                        <th>Book name</th>
                                        
                                       
                                        
                                       
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
			
				
			
				
				$query_se = "SELECT DISTINCT ISBN,Price,Name FROM books,purchase_history,user_login
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
					 
					   ";
							
					
					
				

					$result_se = $conn->query($query_se);
				
				
					
					
					
					While($row = $result_se->fetch_assoc()){
					
				
					echo "<tr>"; 
					
						echo "<td>".$row["Name"];
						
					
						
						echo "</tr>"; 	
					
					
					}
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
                </div>
				
				<br><br><br>
				<legend></legend>
				
	  <div class="row">
		
					<div class="col-md-15">
                        
						
						<br>
						<ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Based on customer's rating to the books
                            </li>
                        </ol>
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example3" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                      
										
                                        <th>Book name</th>
                                      
                                       
                                        
                                       
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
				$query_count = "SELECT * FROM user_login";
				$result_count = $conn->query($query_count);
				$count_row=mysqli_num_rows($result_count);
				$page_count = $count_row/10;
				$page_count = ceil($page_count);
				$user_id = $_GET["user_id"];
				
			
				
				$query_se = "SELECT DISTINCT ISBN,Price,Name FROM books,review,user_login
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
							";
							
					
					
				

					$result_se = $conn->query($query_se);
				
				
					
					
					
					While($row = $result_se->fetch_assoc()){
					
				
					echo "<tr>"; 
						
					
						echo "<td>".$row["Name"];
						
					
						
						echo "</tr>"; 	
					
					
					}
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
        </div>
				
				<br><br><br>
			
				<legend></legend>
			
			
		 <div class="row">
		
					<div class="col-md-15">
                        
						
						<br>
						<ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Based on customer's wish list
                            </li>
                        </ol>
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example4" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                      
										
                                        <th>Book name</th>
                                        
                                       

                                    </tr>
                                </thead>
								<tbody>
				<?php
			
			
				$user_id = $_GET["user_id"];
				
			
				
				$query_se = "SELECT DISTINCT ISBN,Price,Name FROM books,wish_list,user_login
					   WHERE wish_list.User_ID = '".$user_id."'
					   and wish_list.User_ID = user_login.ID
					   and wish_list.Book_ID = books.ISBN
					   order by wish_list.Wish_ID DESC
					   
					   ";
		
							
					
					
				

					$result_se = $conn->query($query_se);
				
				
					
					
					
					While($row = $result_se->fetch_assoc()){
					
				
					echo "<tr>"; 
						
					
						echo "<td>".$row["Name"];
						
					
						
						echo "</tr>"; 	
					
					
					}
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
                </div>
				
					<br><br><br>
				<br><br><br>
				<br><br><br>
				
			
			
			
			
			
			</div>
		</div>
		
		
		
		
		
    </div>
	<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $("#example3").dataTable();
                $("#example4").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
	 <script src="js/bootstrap.min.js"></script>
</body>

</html>
