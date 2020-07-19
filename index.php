<?php

include "assets/header.php";

?>
			<div id="page-wrapper">
				<div class="graphs">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
						</ol>
					</nav>
					<div class="row container">
						<div class="col-md-3">
							<a href="travel_request.php">
							<div class="new-things">
								<i class="lnr lnr-rocket push-left" style="font-size:200px;"></i>
								<br>
								<br>
								<h3 align="center"> My Travel Request</h3>
							</div>
							</a>
						</div>
						<div class="col-md-3">
							<a href="travel_request.php">
							<div class="new-things">
								<i class="lnr lnr-bus push-left" style="font-size:200px;"></i>
								<br>
								<br>
								<h3 align="center"> New Travel Request</h3>
							</div>
							</a>
						</div>

						<div class="col-md-3">
							<a href="jobs.php">
							<div class="new-things">
								<i class="lnr lnr-cog push-left" style="font-size:200px;"></i>
								<br>
								<br>
								<h3 align="center"> View Jobs</h3>
							</div>
							</a>
						</div>

						<div class="col-md-3">
							<a href="assigned_jobs.php">
							<div class="new-things">
								<i class="lnr lnr-pencil push-left" style="font-size:200px;"></i>
								<br>
								<br>
								<h3 align="center"> My Assigned Jobs</h3>
							</div>
							</a>
						</div>
					</div>
<br><br>
					<?php if($_SESSION['role'] == "admin") : ?>
					<div class="row container">
						<div class="col-md-3">
							<a href="add_user.php">
							<div class="new-things">
								<i class="lnr lnr-user push-left" style="font-size:200px;"></i>
								<br>
								<br>
								<h3 align="center"> Add User</h3>
							</div>
							</a>
						</div>

						<div class="col-md-3">
							<a href="add_job.php">
							<div class="new-things">
								<i class="lnr lnr-cog push-left" style="font-size:200px;"></i>
								<br>
								<br>
								<h3 align="center"> Add Jobs</h3>
							</div>
							</a>
						</div>

						<div class="col-md-3">
							<a href="add_client.php">
							<div class="new-things">
								<i class="lnr lnr-users push-left" style="font-size:200px;"></i>
								<br>
								<br>
								<h3 align="center"> Add Clients</h3>
							</div>
							</a>
						</div>
					</div>
					<?php endif ; ?>
				</div>
			</div>

		<!-- main content end-->
	</section>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>