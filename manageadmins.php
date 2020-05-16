<?php include("includes/connect.php");?>

	<?php require_once("includes/functions.php");?>
	
	<?php Confirm_Login() ?>
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

	<!-- tables -->
	<link rel="stylesheet" type="text/css" href="css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="css/basictable.css" />
	<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	      $('#table').basictable();

	      $('#table-breakpoint').basictable({
	        breakpoint: 768
	      });

	      $('#table-swap-axis').basictable({
	        swapAxis: true
	      });

	      $('#table-force-off').basictable({
	        forceResponsive: false
	      });

	      $('#table-no-resize').basictable({
	        noResize: true
	      });

	      $('#table-two-axis').basictable();

	      $('#table-max-height').basictable({
	        tableWrapper: true
	      });
	    });
	</script>
	<!-- //tables -->
</head>

<body class="dashboard-page">
	<div class="se-pre-con"></div>
	<!-- Script -->
	<script type="text/javascript">
        var theme = $.cookie('protonTheme') || 'default';
        $('body').removeClass (function (index, css) {
            return (css.match (/\btheme-\S+/g) || []).join(' ');
        });
        if (theme !== 'default') $('body').addClass(theme);
	</script>
	<!-- //Script -->

	<!-- Side Navbar -->
	<nav class="main-menu">
		<ul>
			<li>
				<a href="home.php">
					<i class="fa fa-dashboard nav_icon"></i>
					<span class="nav-text">
					Dashboard
					</span>
				</a>
			</li>
			<li>
				<a href="users.php">
					<i class="fa fa-users nav_icon"></i>
					<span class="nav-text">
					Users
					</span>
				</a>
			</li>
			<li>
				<a href="books.php">
					<i class="fa fa-book nav_icon"></i>
					<span class="nav-text">
					Books
					</span>
				</a>
			</li>
			<li>
				<a href="location.php">
					<i class="fa fa-list-ul nav_icon"></i>
					<span class="nav-text">
					Location
					</span>
				</a>
			</li>
			<li>
				<a href="borrow.php">
					<i class="fa fa-exchange nav_icon"></i>
					<span class="nav-text">
						Borrow Book
					</span>
				</a>
			</li>
			<li>
				<a href="return.php">
					<i class="fa fa-exchange nav_icon"></i>
					<span class="nav-text">
						Return Book
					</span>
				</a>
			</li>
			<li>
				<a href="view.php">
					<i class="fa fa-eye nav_icon"></i>
					<span class="nav-text">
						View User History
					</span>
				</a>
			</li>
			<li>
				<a href="viewbookhistory.php">
					<i class="fa fa-eye nav_icon"></i>
					<span class="nav-text">
						View  History
					</span>
				</a>
			</li>
			<li>
				<a href="viewserialnumber.php">
					<i class="fa fa-eye nav_icon"></i>
					<span class="nav-text">
						View Serial Numbers
					</span>
				</a>
			</li>
			<li>
				<a href="notification.php">
					<i class="fa fa-bell nav_icon"></i>
					<span class="nav-text">
						Notification
					</span>
				</a>
			</li>
			<?php 
			$shower = "SELECT * FROM admin WHERE  admin_id = '3'";
			$showcaser = mysqli_query($connection, $shower);
			$sr = mysqli_fetch_array($showcaser);
			$datarows = $sr['username']; 
			$data = strtolower($datarows);
			
			$username = $_COOKIE['username'];
			$user = strtolower($username);
			if($user == $data){
			echo"<li>
				<a href=\"manageadmins.php\">
					<i class=\"fa fa-users nav_icon\"></i>
					<span class=\"nav-text\">
					Manage Admins
					</span>
				</a>
			</li>
		";
			}
			?>
			
		</ul>
		<ul class="logout">
			<li>
			<a href="logout.php">
			<i class="icon-off nav-icon"></i>
			<span class="nav-text">
			Logout
			</span>
			</a>
			</li>
		</ul>
	</nav>
	<!-- //Side Navbar -->

	<section class="wrapper scrollable">

		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>

		<!-- Logo, Search Bar, Notification and Admin Img -->
		<section class="title-bar">

			<!-- Logo and website name -->
			<div class="logo">
				<h1>
					<a href="home.html"><img src="images/logo.png" alt=""/>Library-Management</a>
				</h1>
			</div>
			<!-- //Logo and website name  -->

			<!-- Search Bar -->
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="text" name="search" value="Search Book" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
					<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
			<!-- //Search Bar -->

			<!-- Notification And Admin Image -->
			<div class="header-right">
				<div class="profile_details_left">

					<!--notifications of menu start -->
					<?php
				$date = date("F d, Y");

				$Sql1 = "SELECT COUNT(datedue) from borrowdetails WHERE datereturned ='Book not yet returned' AND datedue <= now()";

				$res1 = mysqli_query($connection, $Sql1);
				$ss1 = mysqli_fetch_array($res1);
				$Total1=array_shift($ss1);
				?>
					<div class="header-right-left">
						<ul class="nofitications-dropdown">
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $Total1;?></span></a>
								<ul class="dropdown-menu anti-dropdown-menu agile-notification">
									<li>
										<div class="notification_header">
											<h3>You have <?php echo $Total1;?> new notifications</h3>
										</div>
									</li>
									<?php
									$date = date("F d, Y");
									$Sql = "SELECT * from borrowdetails WHERE datereturned ='Book not yet returned' AND datedue <= now() ORDER BY id desc LIMIT 0,2";
									$res = mysqli_query($connection, $Sql);
									while($ss1 = mysqli_fetch_assoc($res)){ echo"
									<li>
									<div class=\"notification_desc\">
									<p>{$ss1['username']} is owing a book</p>
									</div>
									<div class=\"clearfix\"></div>
									</li><hr>
										
										";}
                             			  ?>

									<!--<li><a href="#">
										
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet</p>
										
										</div>
									  <div class="clearfix"></div>	
									 </a></li>
									 <li class="odd"><a href="#">
										<hr>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										
										</div>
									   <div class="clearfix"></div>	
									 </a></li>
									 -->
									 <li>
										<div class="notification_bottom">
											<a href="notification.php">See all notifications</a>
										</div> 
									</li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<!--notifications of menu start -->

					<!-- Admin Pic -->
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a><i class="fa fa-sign-in"></i> Admin</a> </li> 
									<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
					<!-- //Admin Pic -->

				</div>
			</div>
			<div class="clearfix"> </div>
			<!-- //Notification And Admin Image -->
		</section>
		<!-- Logo, Search Bar, Notification and Admin Img -->

		<div class="main-grid">
		

			<!-- BreadCrum -->
			<div class="banner">
				<h2>
					<a href="home.php">Dashboard</a>
				</h2>
			</div>
			<div class="clearfix"> </div>
			<!-- BreadCrum -->

			<br>
			
			<!-- Info Grid -->
			<?php
			//number of users

				$Sq = "SELECT COUNT(*) from users WHERE statususer ='Enabled'";

				$re = mysqli_query($connection, $Sq);
				$ss = mysqli_fetch_array($re);
				$Total=array_shift($ss);
				?>
			<div class="social grid">
				<div class="grid-info">

					<!-- Users Info -->
					<a href="Users.php"><div class="col-md-4 top-comment-grid">
						<div class="comments likes">
							<div class="comments-icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="comments-info likes-info">
								<h3><?php echo $Total;?></h3>
								<a href="#">Users</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<!-- //Users Info -->

					<!-- Books Info -->
					
			<?php
			//number of books

				$Sql = "SELECT COUNT(*) from books ";

				$res = mysqli_query($connection, $Sql);
				$sss = mysqli_fetch_array($res);
				$Totals=array_shift($sss);
				?>
					<a href="books.php"><div class="col-md-4 top-comment-grid">
						<div class="comments">
							<div class="comments-icon">
								<i class="fa fa-book"></i>
							</div>
							<div class="comments-info">
								<h3><?php echo $Totals;?></h3>
								<a href="#">Books</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div></a>
					<!-- //Books Info -->

					<!-- Locations Info -->
					<?php
			//number of locations

				$Sqls = "SELECT COUNT(*) from location ";

				$ress = mysqli_query($connection, $Sqls);
				$ssss = mysqli_fetch_array($ress);
				$Totalss=array_shift($ssss);
				?>
					<a href="location.php"><div class="col-md-4 top-comment-grid">
						<div class="comments tweets">
							<div class="comments-icon">
								<i class="fa fa-list-ul"></i>
							</div>
							<div class="comments-info tweets-info">
								<h3><?php echo $Totalss;?></h3>
								<a href="#">Locations</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div></a>
					<!-- //Locations Info -->

					<div class="clearfix"> </div>

				</div>
			</div>
			<!-- //Info Grid -->
			

			<div class="agile-grids">

				<style type="text/css">
					.comments-icon i.fa.fa-plus{
					    font-size: 5em;
					    color: #6C8CD0;
					}
				</style>

				<!-- Add User Button -->
				<a href="#" data-toggle="modal" data-target="#myModal">
				<div class="col-md-4 top-comment-grid">
					<div class="comments likes">
						<div class="comments-icon">
							<i class="fa fa-plus"></i>
						</div>
						<div class="comments-info likes-info">
							<h3>Add</h3>
							<a href="#">Admin</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				</a>
				<!-- //Add User Button -->

				<!-- Add User Modal -->
				<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="modal-header">
								Add Admin
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i  class="fa fa-times"></i></span></button>	
							</div>

							<div class="modal-body">
							
								<div class="form-body">
									<form class="form-horizontal" action="manageadmins.php" method="post"> 

										<div class="form-group"> 
											<label for="name" class="col-sm-2 control-label">Username</label> 
											<div class="col-sm-10"> 
												<input type="text" name="username" class="form-control" id="name" placeholder="Enter Username"  required> 
											</div>
										</div>

										<div class="form-group"> 
											<label for="username" class="col-sm-2 control-label">Firstname</label> 
											<div class="col-sm-10"> 
												<input type="text" name="firstname" class="form-control" id="username" placeholder="Enter Firstname"  required> 
											</div>
										</div>
										<div class="form-group"> 
											<label for="username" class="col-sm-2 control-label">Surname</label> 
											<div class="col-sm-10"> 
												<input type="text" name="surname" class="form-control" id="username" placeholder="Enter Surname"  required> 
											</div>
										</div>

										

										<div class="form-group"> 
											<label for="Classteacher" class="col-sm-3 control-label">Password</label> 
											<div class="col-sm-9"> 
												<input type="password" name="password" class="form-control" id="Classteacher" placeholder="Enter Password"  required> 
											</div>
										</div>

										<div class="form-group"> 
											<label for="Phonenumber" class="col-sm-4 control-label">Confirm Password</label> 
											<div class="col-sm-8"> 
												<input type="password" name="passwordconfirm" class="form-control" id="Phonenumber"  placeholder="Confirm Password"  required> 
											</div>
										</div>


										<div class="col-sm-offset-2"> 
											<button name="submit" value="submit" type="submit" class="btn btn-default w3ls-button">Submit</button> 
										</div>
										
									</form> 
								</div>
							</div>
    

							<div class="modal-footer">
								<button type="Cancel" class="btn btn-default"  data-dismiss="modal">Cancel</button> 
							</div>
						</div>
					</div>
				</div>
				
				<!-- //Add User Modal -->
                <?php

include("includes/connect.php");
$error = "";

if(isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($connection, $_POST['username']);
     $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordconfirm'];
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $surname = mysqli_real_escape_string($connection, $_POST['surname']);
  
    
    
    if(strlen($username) < 3)
    {
        $error = " Username is too short";
        echo "<div class=\"alert alert-success alert-dismissable\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          <strong>Danager!</strong><br/>".$error."</div>";
    }
    
    else if(strlen($firstname) < 3)
    {
        $error = "First name is too short";
        echo "<div class=\"alert alert-success alert-dismissable\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          <strong>Danager!</strong><br/>".$error."</div>";
    }
    else if(strlen($surname) < 3)
    {
        $error = "Surname name is too short";
        echo "<div class=\"alert alert-danger alert-dismissable\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          <strong>Danger!</strong><br/>".$error."</div>";
    }
    
    else if(strlen($password) < 8)
    {
        $error = "Password must be greater than 8 characters";
        echo"<div class=\"alert alert-danger alert-dismissable\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          <strong>Danger!</strong><br/>".$error."</div>";
    }
    else if($password !== $passwordConfirm)
    {
        $error = "Password does not match";
        echo "<div class=\"alert alert-danger alert-dismissable\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
          <strong>Danger!</strong><br/>".$error."</div>";
    }
    
    else
    {	
            $password = password_hash($password, PASSWORD_DEFAULT);
         





if (($username != null) && ($password != null ) && ($firstname != null)  && ($surname != null) )
{

$sqli = "INSERT INTO admin(username, password, firstname, surname,  dateadded, chek) 
VALUES ('$username','$password','$firstname', '$surname',  now(), '0')";

$conn = mysqli_query($connection, $sqli);

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
			</div>

			<div class="agile-grids col-md-8">

				<form class="form-inline" action="" method="post"> 
					<div class="form-group"> 
						<label for="Usernamesearch">Username:</label> 
						<input type="text" name="user" list="names" class="form-control" id="Usernamesearch" placeholder="Enter Username">
											</div> 
					<button type="submit" class="btn btn-default w3ls-button" name="search">Search</button> 
				</form>

				<div class="agile-tables">
					<div class="w3l-table-info">
					<?php
                                          if(isset($_POST["search"])){
                                          $show = "SELECT * FROM admin WHERE username ='$user'  ";
                                          $showcase = mysqli_query($connection, $show);
                                          $s = mysqli_fetch_assoc($showcase);
										 $Id = $s['admin_id'];
                                          if($s){
											
                                          foreach ($showcase as $s){
											
											  echo"
					    <table id=\"table\">
						<thead>
						  <tr>
							<th>Username</th>
							<th>Firstname</th>
						    <th>Surname</td>
						    <th>Delete</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>{$s['username']}</td>
							<td>{$s['firstname']}</td>
							<td>{$s['surname']}</td>
													<td>
								<a href=\"deleteadmin.php?Delete=$Id\" title=\"Edit\"		class=\"btn btn-danger\"><i 	class=\"icon-trash icon-large\" ></i></a>		
                               
                            </td>
						  </tr>
						</tbody>
					  </table>"
					  ;}
					}else{
						echo"<div class=\"alert alert-danger alert-dismissable\">
						<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
						<strong> Warning This admin does not exit or you have deleted the admin</strong>"."<br/>";;
					}
				}
				
					?>
				   
				   <?php echo Message();
	      echo SuccessMessage();
	?>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

		<!-- footer -->
		<div class="footer">
			<p>&copy 2018 MFM Teenage Library Management.</p>
		</div>
		<!-- //footer -->
	</section>

	<!-- Javascript -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/proton.js"></script>
</body>
</html>
