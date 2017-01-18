<!DOCTYPE html>
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
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</head>



<body>

    <div id="wrapper">

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Navigation -->
            <?php include 'sidebar.php';
				$admin_email = $_GET["admin_email"];
				?>
			
			<!-- Navigation -->
		
			
			<div class="collapse navbar-collapse navbar-ex1-collapse">
               	<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                     <li>
                        <a href="dashboard.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="books.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-wrench"></i> Books </a>
                    </li>
					<li>
                        <a href="today_order.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Today orders  <span class="badge alert-info"> <?php echo $today_counts;?></a>
                    </li>
					<li>
                        <a href="yesterday_order.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Yesterday orders  <span class="badge alert-info"> <?php echo $yesterday_counts;?></a>
                    </li>
                    <li>
                        <a href="purchase_history.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Purchase History  <span class="badge alert-info"> <?php echo $purchase_counts;?></a>
                    </li>
					<li>
                        <a href="purchase_request.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-wrench"></i> Purchase Request <span class="badge alert-info"> <?php echo $request_counts;?> </a>
                    </li>
					<li  class="active">
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
			
			
            </div>
		</nav>
        

    <div id="page-wrapper">
	 <div class="container-fluid">
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View <small>View History</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				
				<form  method="post"   id="searchform"> 
				<h3>Select a date</h3>
				  <input  type="text" name = "date" id="datepicker" placeholder = "Select date">
				  <br><br>
			      <input  class="btn btn-primary" type="submit" name="date_sub" value="Search"> 
				  
				  
				</form> 
				
				
				<br>
				<legend></legend>
				<form align = "right" method = "post">
				<input  class="btn btn-primary" type="submit" name="show_all" value="Show All"> 
				</form>
				
				
                <div class="row">
				
				
								<div class="col-md-15">
                        
						
						<br>
						
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Book ISBN</th>
                                        <th>Customer Name</th>
                                        <th>Book Name</th>
                                        <th>View time</th>
										
                                       
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
				
				
				$query_se = "SELECT * FROM view_history,user_login,books
							where view_history.User_ID = user_login.ID 
							and view_history.Book_ID = books.ISBN";
				
					
				if(isset($_POST["date_sub"])){
					
					
						$search = $_POST["date"];
						$query_se = "SELECT * FROM view_history,user_login,books where DATE_FORMAT(View_Time, '%m/%d/%Y') LIKE '%". $search . "%' 
									and view_history.User_ID = user_login.ID 
								and view_history.Book_ID = books.ISBN
							";
						
				}
				
				if(isset($_POST["show_all"])){
					
					
				$query_se = "SELECT * FROM view_history,user_login,books
							where view_history.User_ID = user_login.ID 
							and view_history.Book_ID = books.ISBN";
						
				}	
			
					$result_se = $conn->query($query_se);
					$rowcount=mysqli_num_rows($result_se);
					
					
				while($row = $result_se->fetch_assoc()) {
					
				
					echo "<tr>"; 
						echo "<td>".$row["View_ID"];
						echo "<td>".$row["User_ID"];
						echo "<td>".$row["Book_ID"];
						echo "<td>".$row["username"];
						echo "<td>".$row["Name"];
						echo "<td>".$row["View_Time"];
						
						
						
						echo "</tr>"; 
					
						
					}
					
					$query_num = "SELECT COUNT(*) FROM view_history";
					$result_num = $conn->query($query_num);
					$row_num = $result_num->fetch_assoc();
				?>
				
			
				</tbody>
				</table>
				
			</div>
                    </div>
                
            </div>
                </div>
				
			<br><br><br><br>

				
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
