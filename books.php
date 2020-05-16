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

			<div class="agile-grids">

				<style type="text/css">
					.comments-icon i.fa.fa-plus{
					    font-size: 5em;
					    color: #FDA285;
					}
				</style>

				<!-- Add Book Button -->
				<a href="#" data-toggle="modal" data-target="#myModal">
				<div class="col-md-4 top-comment-grid">
					<div class="comments">
						<div class="comments-icon">
							<i class="fa fa-plus"></i>
						</div>
						<div class="comments-info">
							<h3>Add</h3>
							<a href="#">Book</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div></a>
				<!-- Add Book Button -->

				<!-- Add Book Modal -->
				<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="modal-header">
								Add Book
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i  class="fa fa-times"></i></span></button>	
							</div>

							<div class="modal-body">
								<div class="form-body">
									<form class="form-horizontal" action="books.php" method="post"> 

										<div class="form-group"> 
											<label for="Author" class="col-sm-2 control-label">Author</label> 
											<div class="col-sm-10"> 
												<input type="text" name="author" class="form-control" id="Author" placeholder="Author"  required> 
											</div>
										</div>

										<div class="form-group"> 
											<label for="Title" class="col-sm-2 control-label">Title</label> 
											<div class="col-sm-10"> 
												<input type="text" name="title" class="form-control" id="Title" placeholder="Book Title"  required> 
											</div>
										</div>


										<div class="form-group"> 
											<label for="Number of Pages" class="col-sm-4 control-label">Number of Pages</label> 
											<div class="col-sm-8"> 
												<input type="number" name="numberofpages" class="form-control" id="Number of Pages" placeholder="Number of Pages"  required> 
											</div>
										</div>

										<div class="form-group"> 
											<label for="Number of books" class="col-sm-4 control-label">Number of Books</label> 
											<div class="col-sm-8"> 
												<input type="number" name="numberofbooks" class="form-control" id="Number of books" placeholder="Number of books"  required> 
											</div>
										</div>

										<div class="form-group">
											<label for="Location" class="col-sm-2 control-label">Location</label> 
											<div class="col-sm-10">
												<select name="location" id="Location" class="form-control"  required>
												<option>Select a location</option>
																<?php 
																	$get_loc = "select * from location";
	
																	$run_loc = mysqli_query($connection, $get_loc);
	
																	while ($row_loc=mysqli_fetch_array($run_loc)){
	
																		$id = $row_loc['id']; 
																		$location = $row_loc['locationname'];
	
																			echo "<option value='$id'>$location</option>";
	
																							
																		}
								
																		?>
												</select>
												
												
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
				<!-- //Add Book Modal -->
			
			</div>

			<div class="agile-grids col-md-8">

				<form class="form-inline" action="books.php" method="post"> 
				<?php $name= null;
										if(isset($_POST["name"])){$name = $_POST["name"];} ?>
					<div class="form-group"> 
						<label for="Booksearch">Book Title:</label> 
						<?php
										$sql = mysqli_query($connection, "SELECT * FROM justbooks");
										echo'<input type="text" name="name" list="names" class="form-control" id="Booksearch" placeholder="Enter Book Title">';
										echo '<datalist id="names">';
   										 while ($row = mysqli_fetch_array($sql)) {
   										 echo "<option value='". $row['title']. "'>" . $row['author'] ."</option>";
   										 }
										echo '</datalist>';

						?>		
					
					</div> 
					<button type="submit" name="search" class="btn btn-default w3ls-button">Search</button> 
				</form>

				<div class="agile-tables">
					<div class="w3l-table-info">
					<?php
									 $author = null;
                                     $title = null;
                                    $numberofbooks = null;
                                     $numberofpages = null;
                                     
                                     $location = null;

                                     
                                    if(isset($_POST["author"])){$author = $_POST["author"];}
		             			    if(isset($_POST["title"])){$title = $_POST["title"];}
							        
								    if(isset($_POST["numberofbooks"])){$numberofbooks = $_POST["numberofbooks"];}
								    if(isset($_POST["numberofpages"])){$numberofpages = $_POST["numberofpages"];}
								     if(isset($_POST["location"])){$location_id = $_POST["location"];}


									
							
							
							if(isset($_POST['submit'])){
  
								
										$selectbook = "SELECT  title FROM justbooks WHERE title = '$title' AND author = '$author'";
										$collectbook = mysqli_query($connection, $selectbook);
										$collectedbook = mysqli_fetch_array($collectbook);
										
								if(!$collectedbook){
								$count = 0;
								while($count < $numberofbooks){ 
								$sqli = "INSERT INTO books( title, author, numberofpages,  dateadded,  status , location_id) 
 								 VALUES ('$title','$author', '$numberofpages', now() ,'Available', '$location_id')";

 								 $conn7 = mysqli_query($connection, $sqli);

 								 $count++;
 								}
 								

 								 $sql = "INSERT INTO justbooks( title, author, numberofbooks, numberofpages, location_id, dateadded) 
 								 VALUES ('$title','$author', '$numberofbooks','$numberofpages' , $location_id, now())";

								$conn2 = mysqli_query($connection, $sql); 

								if($conn2 && $conn7) {
                                  echo  "<div class=\"alert alert-success alert-dismissable\">
									<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									  <strong>Success!</strong><br/>Operation was successful  These are there serial numbers</div>";
									 
									  

									  

									  $show5 = "SELECT serialnumber FROM books WHERE dateadded = now()";
									  $showcase5 = mysqli_query($connection, $show5);
									 echo" <div class=\"alert alert-success alert-dismissable\">
										  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
										  
									  while($s5 = mysqli_fetch_assoc($showcase5)){
										  echo "<span style=\"padding-left:5px\">" .$s5['serialnumber']. "</span>"; 
									  }
									  echo "</div>";
									} else {

									echo "<div class=\"alert alert-danger alert-dismissable\">
									<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									<strong> Danger Operation was unsuccessful</strong>"."<br/></div>";
										}
									
								}else{
									$count = 0;
								while($count < $numberofbooks){ 
								$sqli1 = "INSERT INTO books( title, author, numberofpages,  dateadded,  status , location_id) 
 								 VALUES ('$title','$author', '$numberofpages', now() ,'Available', '$location_id')";

 								 $conn8 = mysqli_query($connection, $sqli1);

 								 $count++;
								 }
								 if($conn8) {
									$num = "SELECT COUNT(*) from books where title = '$title' AND author = '$author'";

									$nums = mysqli_query($connection, $num);
									$numbers = mysqli_fetch_array($nums);
									$Totals=array_shift($numbers);

									$update1 = "UPDATE `justbooks` SET `numberofbooks`='$Totals' WHERE `title`='$title' AND author = '$author'";
									$edit = mysqli_query($connection, $update1);

									

									echo  "<div class=\"alert alert-success alert-dismissable\">
									  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
										<strong>Success!</strong><br/>Operation was successful  These are there serial numbers</div>";
									   
										
										$show5 = "SELECT serialnumber FROM books WHERE dateadded = now()";
										$showcase5 = mysqli_query($connection, $show5);
									   echo" <div class=\"alert alert-success alert-dismissable\">
											<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
											
										while($s5 = mysqli_fetch_assoc($showcase5)){
											echo "<span style=\"padding-left:5px\">" .$s5['serialnumber']. "</span>"; 
										}
										echo "</div>";
									}
								}
							}
							
								?>
					<?php
                                          if(isset($_POST["search"])){
                                          $show1 = "SELECT * FROM justbooks WHERE title='$name'";
                                          $showcase1 = mysqli_query($connection, $show1);
										  $s1 = mysqli_fetch_assoc($showcase1);
										  if($s1){
                                          foreach ($showcase1 as $s1){
											$Id = $s1['justbook_id']; 
											$location = $s1['location_id'];
											
											$Querys="SELECT * FROM location WHERE id = '$location'";
											$ExecuteQuerys=mysqli_query($connection, $Querys);
											$ExactlocationToBeUpdated=mysqli_fetch_array($ExecuteQuerys);
												
											
										 echo "
					    <table id=\"table\">
						<thead>
						  <tr>
							<th>Title</th>
						    <th>Author</th>
						    <th>No. of pages</th>
						    <th>No. of books</th>
						    <th>Location</th>
						    <th>Action</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>{$s1['title']}</td>
							<td>{$s1['author']}</td>
							<td>{$s1['numberofpages']}</td>
							<td>{$s1['numberofbooks']}</td>
							<td>{$ExactlocationToBeUpdated['locationname']}</td>
							<td>
								<a  href=\"updatebook.php?Update=$Id\" title=\"Edit\"		class=\"btn btn-success\"><i 	class=\"icon-pencil icon-large\"></i></a>		
                                <a  href=\"deletebook.php?delete=$Id\" title=\"Delete\"	class=\"btn btn-danger\"><i 	class=\"icon-trash icon-large\"></i></a>
                            </td>
						  </tr>
						</tbody>
					  </table>";}
										}else{
											echo"<div class=\"alert alert-danger alert-dismissable\">
						<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
						<strong> Danger This book(s) do not exist or you might have deleted the book</strong>"."<br/></div>";;
										}
					}
					?>
					 
					 <?php echo Message();
		  echo SuccessMessage();
		  echo PrintMessage();
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
