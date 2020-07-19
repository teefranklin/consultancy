<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('Location:login.php'); 
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Consultancy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<script src="js/Chart.js"></script>
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic'
		rel='stylesheet' type='text/css'>
	<script src="js/jquery-1.10.2.min.js"></script>

</head>

<body class="sticky-header left-side-collapsed" onload="initMap()">
	<section>
		<!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php"><span>Consultancy</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
				<ul class="nav nav-pills nav-stacked custom-nav">

					<li class="menu-list">
						<a href="#"><i class="lnr lnr-cog"></i>
							<span>Jobs</span></a>
						<ul class="sub-menu-list">
							<li><a href="jobs.php">Jobs History</a> </li>
                            <li><a href="assigned_jobs.php">My Assigned Jobs</a></li>
                            <?php if($_SESSION['role']=='admin') : ?>
                                <li><a href="add_job.php">Add Job</a></li>
                            <?php endif; ?>
						</ul>
					</li>
					<li class="menu-list"><a href="#"><i class="lnr lnr-bus"></i> <span>Travel Requests</span></a>
						<ul class="sub-menu-list">
							<li><a href="travel_request.php">Create New Travel Request</a> </li>
							<li><a href="my_requests.php">My Requests</a> </li>
							<?php if($_SESSION['position']=='consultancy manager') : ?>
                                <li><a href="assigned_travels.php">Assigned Requests</a></li>
                            <?php endif; ?>
						</ul>
                    </li>
                    <?php if($_SESSION['role']=='admin') : ?>
                    <li class="menu-list"><a href="#"><i class="fa fa-user"></i> <span>Users</span></a>
						<ul class="sub-menu-list">
							<li><a href="add_user.php">Add User</a> </li>
							<li><a href="view_users.php">View Users</a> </li>
						</ul>
                    </li>
                    <li class="menu-list"><a href="#"><i class="fa fa-users"></i> <span>Clients</span></a>
						<ul class="sub-menu-list">
							<li><a href="add_client.php">Add Client</a> </li>
							<li><a href="view_clients.php">View Clients</a> </li>
						</ul>
					</li>
                    <?php endif; ?>
				</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->

		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">

				<!--toggle button start-->
				<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
				<!--toggle button end-->

				<!--notification menu start -->
				<div class="menu-right">
					<div class="user-panel-top">
						<div class="profile_details_left">
							
						</div>
						<div class="profile_details">
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<div class="profile_img">
											<span class="fa fa-user" style="font-size:35px;"> </span>
											<div class="user-name">
												<p><?php echo $_SESSION['userid']; ?><span><?php echo $_SESSION['role']; ?></span></p>
											</div>
											<i class="lnr lnr-chevron-down"></i>
											<i class="lnr lnr-chevron-up"></i>
											<div class="clearfix"></div>
										</div>
									</a>
									<ul class="dropdown-menu drp-mnu">
										<li> <a href="user_profile.php?id=<?php echo $_SESSION['userid']; ?>"><i class="fa fa-user"></i>Profile</a> </li>
										<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
									</ul>
								</li>
								<div class="clearfix"> </div>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!--notification menu end -->
			</div>
			<!-- //header-ends -->