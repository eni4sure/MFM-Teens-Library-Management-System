<?php include("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
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

	<!-- Website Links and Script -->
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
	<!-- //Website Links and Script -->

	<section class="wrapper scrollable">

		<!-- Website Title , Notification and Admin Image -->
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
								<a href="notification.php" title="notification" ><i class="fa fa-bell"></i><span class="badge blue"><?php echo $Total1;?></span></a>
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
		<!-- //Website Title , Notification and Admin Image -->

		<div class="main-grid">

			<!-- BreadCrum -->
			<div class="banner">
				<h2>
					<a href="home.html">Dashboard</a>
					<i class="fa fa-angle-right"></i> <span>Notification</span>
				</h2>
			</div>
			<div class="clearfix"> </div>
			<!-- //BreadCrum -->

			<br>
			
			<!-- Books , Users and Location Button -->
			<!-- Info Grid -->
			
			<div class="social grid">
				<div class="grid-info">

					<!-- Users Info -->
					<?php
					//number of users

						$Sq = "SELECT COUNT(*) from users WHERE statususer ='Enabled'";

						$re = mysqli_query($connection, $Sq);
						$ss = mysqli_fetch_array($re);
						$Total=array_shift($ss);
						?>
					<a href="users.php"><div class="col-md-4 top-comment-grid">
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
			<!-- //Books , Users and Location Button -->

			<?php
				$date = date("F d, Y");
				$Sql = "SELECT * from borrowdetails WHERE datereturned ='Book not yet returned' AND datedue <= now() ORDER BY id desc";
				$res = mysqli_query($connection, $Sql);
				
				
				while ($ss1 = mysqli_fetch_assoc($res)){ echo"
					<table id=\"table\">
						<thead>
							<tr>
								<th>Username</th>
							    <th>Book</th>
							    <th>Serialnumber</th>
							    <th>Date borrowed</th>
							    <th>Due date</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{$ss1['username']}</td>
								<td>{$ss1['book']}</td>
								<td>{$ss1['serialnumber']}</td>
								<td>{$ss1['dateborrowed']}</td>
								<td>{$ss1['datedue']}</td>
							</tr>
						</tbody>
					</table>
				";}
			?>
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