
	
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
	<div class="header-right">
	<div class="profile_details_left">
		<h1>
		
		
			<p>
			Welcome <?php echo $_COOKIE['username'];?>
			</p>
		</h1>
		</div>
	</div>
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