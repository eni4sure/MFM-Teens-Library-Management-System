<?php
include("includes/connect.php");
	include("includes/functions.php");

	//user has logged in before
	if(logged_in())
	{
		header("location:home.php");
		
	}
	
	$error = "";


	if(isset($_POST['submit']))
	{
	
	    $username = mysqli_real_escape_string($connection, $_POST['username']);
	    $password = mysqli_real_escape_string($connection, $_POST['password']);
		$checkBox = isset($_POST['keep']);
		
		if(username_exists($username,$connection))
		{
			$result = mysqli_query($connection, "SELECT password FROM admin WHERE username='$username'");
			$retrievepassword = mysqli_fetch_assoc($result);
			
			if(!password_verify($password, $retrievepassword['password']))
			{
				$error = "Password is incorrect";
				echo "<div class=\"alert alert-danger alert-dismissable\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				  <strong>Danger!</strong><br/>".$error."</div>";
			}
			else
			{
				$_SESSION['username'] = $username;
				
				if($checkBox == "on")
				{
					setcookie("username",$username, time()+72000);
				}
				
				header("location:home.php");
			}
			
			
		}

		
		else
		{
			$error = "Username Does not exists";
			echo "<div class=\"alert alert-danger alert-dismissable\">
			<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
			  <strong>Danger!</strong><br/>".$error."</div>";
		}
		
	
	}

?>
<!DOCTYPE html>

<head>
	<title>Library Management</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/font.css" >
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<style type="text/css">
		.no-js #loader {display: none;}
		.js #loader {display:block; position:absolute; left:100px; top:0;}
		.se-pre-con {position:fixed; left:0px; top:0px; width:100%; height:100%; z-index:9999; background: url(images/Preloader_1.gif)center no-repeat #fff; }
	</style>

	<!-- Javascript -->
	<script type="text/javascript" src="js/jquery2.0.3.min.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/skycons.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
			$(".se-pre-con").fadeOut("slow")
		})
	</script>
</head>

<body class="signup-body">
	<div class="se-pre-con"></div>
	<div class="agile-signup">	
		
		<div class="content2">
			<div class="grids-heading gallery-heading signup-heading">
				<h2> Library Management</h2>
			</div>
			<form action=" " method="post">
				<input type="text" 		name="username" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
				<input type="password"	name="password"	value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
				<div class="checkbox" style="float: left; margin-left: 2em;"> 
					<label> <input type="checkbox"  name="keep"> Remember me </label> 
				</div> 
				<input type="submit" name="submit"	class="register" value="Login">
			</form>
			<div class="signin-text">
				<div class="text-right">
					<p><a href="visitor.php">Not Admin? Click here</a></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<!-- footer -->
		<div class="copyright">
			<p>&copy 2018 MFM Teenage Library Management.</p>
		</div>
		<!-- //footer -->
	</div>
	<script src="js/proton.js"></script>
</body>

</html>
