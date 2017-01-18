<?php
session_start();
include 'C:\wamp\www\flashbook\connect_database.php';
$admin_email = $_GET["admin_email"];
include 'purchase_rowcounts.php';
include 'today_rowcounts.php';
include 'yesterday_rowcounts.php';
include 'view_rowcounts.php';
include 'request_rowcounts.php';


?>
<html>

<body>


<script>

$(document).ready(function(){
var count_cases = -1;



setInterval(function(){
  
    $.ajax({
        type : "POST",
        url : "file.php",
        success : function(response){
            if (count_cases != -1 && count_cases != response) 
			
            count_cases = response;
			document.getElementById("demo").innerHTML = response;

        }
		
    });
},100);

})



</script>


<?php

$sql_select = "SELECT ID from admin_login WHERE Email = '".$admin_email."'";
	
	$conn->query($sql_select);
	$result = $conn->query($sql_select);
	$row = $result->fetch_assoc();
	
	$admin_ID = $row["ID"];
	
	
?>
<!-- Navigation -->
       
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php?admin_email=<?php echo $admin_email;?>">Flashbook Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id = "demo" class="badge alert-info">0</span> <i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
							
                            <a id = "view_all" href="today_order.php?admin_email=<?php echo $admin_email;?>" >See all new orders</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $admin_email;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="admin_setting.php?admin_email=<?php echo $admin_email;?>&admin_ID=<?php echo $admin_ID;?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="index.html"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			
            
            <!-- /.navbar-collapse -->
        
		</body>
</html>

