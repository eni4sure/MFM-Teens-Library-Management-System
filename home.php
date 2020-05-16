
<?php include("includes/connect.php");?>
	<?php include("includes/functions.php");?>
		
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
<?php include("includes/head.php");?>
<!-- Logo, Search Bar, Notification and Admin Img -->

			<!-- //Notification And Admin Image -->
		
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
					<div class="col-md-4 top-comment-grid">
					<a href="users.php"><div class="comments likes">
							<div class="comments-icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="comments-info likes-info">
								<h3><?php echo $Total;?></h3>
								<a href="#">Users</a>
							</div>
							<div class="clearfix"> </div>
						</div></a>
					</div>
					
					<!-- //Users Info -->

					<!-- Books Info -->
					
			<?php
			//number of books

				$Sql = "SELECT COUNT(*) from books ";

				$res = mysqli_query($connection, $Sql);
				$sss = mysqli_fetch_array($res);
				$Totals=array_shift($sss);
				?>
					<div class="col-md-4 top-comment-grid">
					<a href="books.php"><div class="comments">
							<div class="comments-icon">
								<i class="fa fa-book"></i>
							</div>
							<div class="comments-info">
								<h3><?php echo $Totals;?></h3>
								<a href="#">Books</a>
							</div>
							<div class="clearfix"> </div>
						</div></a>
					</div>
					<!-- //Books Info -->

					<!-- Locations Info -->
					<?php
			//number of locations

				$Sqls = "SELECT COUNT(*) from location ";

				$ress = mysqli_query($connection, $Sqls);
				$ssss = mysqli_fetch_array($ress);
				$Totalss=array_shift($ssss);
				?>
					<div class="col-md-4 top-comment-grid">
					<a href="location.php"><div class="comments tweets">
							<div class="comments-icon">
								<i class="fa fa-list-ul"></i>
							</div>
							<div class="comments-info tweets-info">
								<h3><?php echo $Totalss;?></h3>
								<a href="#">Locations</a>
							</div>
							<div class="clearfix"> </div>
						</div></a>
					</div>
					<!-- //Locations Info -->

					<div class="clearfix"> </div>

				</div>
			</div>
			<!-- //Info Grid -->
			
			<div class="agile-two-grids">
				<div class="col-md-12 count">
						<div class="count-grid">
							<h3 class="title">Countdown</h3>
							<ul id="example">
								<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
								<li class="seperator">:</li>
								<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
								<li class="seperator">:</li>
								<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
							</ul>
							<div class="clearfix"> </div>
							<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
							<script type="text/javascript">
								$('#example').countdown({
									date: '12/24/2020 18:59:59',
									offset: -8,
									day: 'Day',
									days: 'Days'
								}, function () {
									alert('Done!');
								});
							</script>
						</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>

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
