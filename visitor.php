<?php include("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>


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
				<a href="index.php">
					<i class="fa fa-dashboard nav_icon"></i>
					<span class="nav-text">
					Admin? Login
					</span>
				</a>
			</li>
	
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
		
			<!-- //Search Bar -->

			<!-- Notification And Admin Image -->
			
					<!-- //Admin Pic -->

				</div>
			</div>
			<div class="clearfix"> </div>
			<!-- //Notification And Admin Image -->
		
		<!-- Logo, Search Bar, Notification and Admin Img -->
		<!-- //Website Title , Notification and Admin Image -->

		
			<!-- //BreadCrum -->

			
			
			<!-- Books , Users and Location Button -->
			<!-- Info Grid -->
			
			
			<!-- //Info Grid -->
			<!-- //Books , Users and Location Button -->
            
            <br><br><div class="alert alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong style="font-size:30px; color:black;">Howdy User!!!   Welcome to MFM Library-Management. Here are our available books <i class="fa fa-hand-o-down" aria-hidden="true"></i></strong></div>

            <table id="table">
                <thead>
                    <tr>
                        <th style="width:30%;">Title</th>
                        <th style="width:30%;">Author</th>
                        <th style="width:30%;">Number of copies</th>
                    </tr>
                </thead>
            </table>
			<?php
				  if (isset($_GET['pageno'])) {
				 $pageno = $_GET['pageno'];
			 } else {
				 $pageno = 1;
			 }
			 
			 $no_of_records_per_page = 20;
			 $offset = ($pageno-1) * $no_of_records_per_page;
	 
			
			
	 
			 $total_pages_sql = "SELECT COUNT(*) FROM justbooks";
			 $result = mysqli_query($connection,$total_pages_sql);
			 $total_rows = mysqli_fetch_array($result)[0];
			 $total_pages = ceil($total_rows / $no_of_records_per_page);
	 
			 $sql = "SELECT * FROM justbooks LIMIT $offset, $no_of_records_per_page";
			 $res_data = mysqli_query($connection,$sql);
				
				
				while ($row = mysqli_fetch_assoc($res_data)){ echo"
            <table>
                <tbody>
                    <tr>
                        <td style=\"width:30%;\">{$row['title']}</td>
                        <td style=\"width:30%;\">{$row['author']}</td>
                        <td style=\"width:30%;\">{$row['numberofbooks']}</td>	
                    </tr>
                </tbody>
            </table>
            ";}
			?>
			<div align='center'>
			<ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
	<div>
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