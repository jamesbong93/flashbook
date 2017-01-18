
<html>

<body>

<?php
session_start();

$admin_email = $_SESSION["email"];
$admin_password = $_SESSION["password"];


?>
<script>

$(document).ready(function(){
var count_cases = -1;

var notification = new Audio();
notification.src = 'notification.mp3';


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


<!-- Navigation -->
       
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Flashbook Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id = "demo" class="badge alert-info">0</span> <i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                       
					   
                        <li>
							
                            <a id = "view_all" href="new_order.php" >See all new orders</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $admin_email;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="admin_login.html"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			
            
            <!-- /.navbar-collapse -->
        
		</body>
</html>