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
                    
                     <li >
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
                        <a href="purchase_history.php?admin_email=<?php echo $admin_email;?>"><i class="fa fa-fw fa-desktop"></i>  Purchase History <span class="badge alert-info"> <?php echo $purchase_counts;?> </a>
                    </li>
					<li  >
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
					<li class="active">
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
                         Feedback Report
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
				
               
				

				
			
			   <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rating: 5 stars
                            </li>
               </ol>
				<div class="col-md-15">
						
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
				
				
				$query_request = "SELECT * FROM feedback_form,user_login
							where feedback_form.User_ID = user_login.ID 
							and Rating = 5
							";

					
					
			
					$result_request = $conn->query($query_request);
					
					
					
				while($row_request = $result_request->fetch_assoc()) {
					
				
					echo "<tr>"; 
						
						echo "<td>".$row_request["username"];
						echo "<td>".$row_request["Full_name"];
						echo "<td>".$row_request["Email"];
						echo "<td>".$row_request["Message"];
						echo "<td>".$row_request["Date_feedback"];
						echo "</tr>"; 
					
						
					}
					
				
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
                </div>
				
				
				
			<br>
			<br>
			<legend></legend>			
				
						   <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rating: 4 stars
                            </li>
               </ol>
				<div class="col-md-15">
						
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example3" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
				
				
				$query_request = "SELECT * FROM feedback_form,user_login
							where feedback_form.User_ID = user_login.ID 
							and Rating = 4
							";

					
					
			
					$result_request = $conn->query($query_request);
					
					
					
				while($row_request = $result_request->fetch_assoc()) {
					
				
					echo "<tr>"; 
						
						echo "<td>".$row_request["username"];
						echo "<td>".$row_request["Full_name"];
						echo "<td>".$row_request["Email"];
						echo "<td>".$row_request["Message"];
						echo "<td>".$row_request["Date_feedback"];
						echo "</tr>"; 
					
						
					}
					
				
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
               
				
				
				
			<br><br>
			<legend></legend>	
			
						   <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rating: 3 stars
                            </li>
               </ol>
				<div class="col-md-15">
						
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example4" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
				
				
				$query_request = "SELECT * FROM feedback_form,user_login
							where feedback_form.User_ID = user_login.ID 
							and Rating = 3
							";

					
					
			
					$result_request = $conn->query($query_request);
					
					
					
				while($row_request = $result_request->fetch_assoc()) {
					
				
					echo "<tr>"; 
						
						echo "<td>".$row_request["username"];
						echo "<td>".$row_request["Full_name"];
						echo "<td>".$row_request["Email"];
						echo "<td>".$row_request["Message"];
						echo "<td>".$row_request["Date_feedback"];
						echo "</tr>"; 
					
						
					}
					
				
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
               
				
				
				
			<br><br>
			<legend></legend>				
			
									   <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rating: 2 stars
                            </li>
               </ol>
				<div class="col-md-15">
						
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example5" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
				
				
				$query_request = "SELECT * FROM feedback_form,user_login
							where feedback_form.User_ID = user_login.ID 
							and Rating = 2
							";

					
					
			
					$result_request = $conn->query($query_request);
					
					
					
				while($row_request = $result_request->fetch_assoc()) {
					
				
					echo "<tr>"; 
						
						echo "<td>".$row_request["username"];
						echo "<td>".$row_request["Full_name"];
						echo "<td>".$row_request["Email"];
						echo "<td>".$row_request["Message"];
						echo "<td>".$row_request["Date_feedback"];
						echo "</tr>"; 
					
						
					}
					
				
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
               
				
				
				
			<br><br>
			<legend></legend>	
			
									   <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rating: 1 stars
                            </li>
               </ol>
				<div class="col-md-15">
						
                        <div class="table-responsive">
                        <div class="box-body table-responsive">
                           <table id="example6" class="table table-bordered table-striped">
							
							<thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
								<tbody>
				<?php
			
				
				
				$query_request = "SELECT * FROM feedback_form,user_login
							where feedback_form.User_ID = user_login.ID 
							and Rating = 1
							";

					
					
			
					$result_request = $conn->query($query_request);
					
					
					
				while($row_request = $result_request->fetch_assoc()) {
					
				
					echo "<tr>"; 
						
						echo "<td>".$row_request["username"];
						echo "<td>".$row_request["Full_name"];
						echo "<td>".$row_request["Email"];
						echo "<td>".$row_request["Message"];
						echo "<td>".$row_request["Date_feedback"];
						echo "</tr>"; 
					
						
					}
					
				
				?>
				
   
				</tbody>
				</table>
			</div>
                    </div>
                
            </div>
               
				
				
				
			<br><br>
			<legend></legend>	
			
			
				 </div>
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
                $("#example5").dataTable();
                $("#example6").dataTable();
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
