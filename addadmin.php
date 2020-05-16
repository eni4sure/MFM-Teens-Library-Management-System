<?php

	include("includes/connect.php");
	$error = "";

	if(isset($_POST['submit']))
	{
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		 $password = $_POST['password'];
	    $passwordConfirm = $_POST['passwordConfirm'];
		$firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
		$surname = mysqli_real_escape_string($connection, $_POST['surname']);
	  
		
		
		if(strlen($username) < 3)
		{
			$error = " Username is too short";
			echo $error;
		}
		
		else if(strlen($firstname) < 3)
		{
			$error = "First name is too short";
			echo $error;
		}
		else if(strlen($surname) < 3)
		{
			$error = "Surname name is too short";
			echo $error;
		}
		
		else if(strlen($password) < 8)
		{
			$error = "Password must be greater than 8 characters";
			echo $error;
		}
		else if($password !== $passwordConfirm)
		{
			$error = "Password does not match";
			echo $error;
		}
		
		else
		{	
				$password = password_hash($password, PASSWORD_DEFAULT);
			 





if (($username != null) && ($password != null ) && ($firstname != null)  && ($surname != null) )
{

$sql = "INSERT INTO admin(username, password, firstname, surname,  dateadded, chek) 
  VALUES ('$username','$password','$firstname', '$surname',  now(), '0')";

$conn = mysqli_query($connection, $sql);

if ($conn) {
echo "<div class=\"alert alert-success alert-dismissable\">
<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Success!</strong><br/>New record created successfully</div>";

} else {

echo "<div class=\"alert alert-danger alert-dismissable\">
  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong> Danger</strong>"."<br/>"; 
echo "Error: " . $sql . "<br/>" . mysqli_error($connection);
echo "</div>";
}

mysqli_close($connection);
}
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
		.se-pre-con {position:fixed; left:0px; top:0px; width:100%; height:100%; z-index:9999; background: url(images/Preloader_3.gif)center no-repeat #fff; }
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
				<h2>Add Admin</h2>
			</div>
			<form method="POST"  enctype="multipart/form-data">
				<input type="text"		name="username"		value="Username" 	onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
				<input type="text"		name="firstname"	value="First Name" 	onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}">
				<input type="text"		name="surname"		value="Surname" 	onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Surname';}">
				<input type="password"	name="password"			placeholder="Password">
				<input type="password"	name="passwordConfirm" 	placeholder="Confirm Password">
				<input type="submit" class="register" value="Submit" name="submit">
			</form>
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
