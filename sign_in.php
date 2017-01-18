<!DOCTYPE html>
<?php
require_once __DIR__ . '/vendor/autoload.php';
 session_start(); 
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log In</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

<style>



</style>   
   

  
</head>

<body>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
                <a class="navbar-brand" href="homepage.php">Flashbook</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<?php
	
	
$fb = new Facebook\Facebook([
  'app_id' => '102681176774682',
  'app_secret' => '92f1fc315883fc50bbc9192b7b599555',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/flashbook/fb-callback.php', $permissions);




	?>


<div class = "container" >
    <h1 align = "center">Flashbook</h1>
    <div class="omb_login">
    	<h3 class="omb_authTitle">Login</h3>
		<div  class="row omb_row-sm-offset-3 omb_socialButtons">
    	    <div class="col-xs-4 col-sm-6">
		        <a href="<?php echo $loginUrl;?>" class="btn btn-lg btn-block omb_btn-facebook">
			        <i class="fa fa-facebook visible-xs"></i>
			        <span class="hidden-xs">Facebook</span>
		        </a>
	        </div>
        
		</div>

		<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">or</span>
			</div>
		</div>
		
		<div  class="row omb_row-sm-offset-3 omb_socialButtons">
			<div class="col-xs-4 col-sm-6">
		        <a href="#" class="btn btn-lg btn-block omb_btn-twitter">
			        <i class="fa fa-twitter visible-xs"></i>
			        <span class="hidden-xs">Guest</span>
		        </a>
	        </div>	
			
			
		</div>
		
		<br>
		<div  class="row omb_row-sm-offset-3">
		
			<div class="col-xs-12 col-sm-6">	
			    <form class="omb_loginForm" action="login.php" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Password">
					</div>
                   <br>

					<input class="btn btn-lg btn-primary btn-block" type="submit" name = "login_btn" value = "Login"></input>
				</form>
			</div>
			
    	</div>
		<div class="row omb_row-sm-offset-3">
			
			<div class="col-xs-12 col-sm-6">
				<p class="omb_forgotPwd">
					<a href="registration.html">No account? Register now!</a>
				</p>
			</div>
		</div>	
</div>    	



</div>
		

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include 'footer.php';?>


</html>
