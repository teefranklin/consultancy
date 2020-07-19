<?php

include "assets/header.php";
include "assets/database.php";

$query ="SELECT * FROM user_info";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
			<div id="page-wrapper">
				<div class="graphs">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
							<li class="breadcrumb-item"><i class="fa fa-users"></i> Users</li>
							<li class="breadcrumb-item active" aria-current="page"><a href="jobs.php"><i
										class="fa fa-users"></i> View Users</a></li>
						</ol>
					</nav>
					<div class="md">
						<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}"
							data-widget-static="">
							<div class="panel-heading">
								<h2>All Users</h2>
								<div class="panel-ctrls" data-actions-container=""
									data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span
										class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>User ID</th>
											<th>Full Name</th>
											<th>Role</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($result as $row) : ?>
											<tr>
												<td><?php echo $row['userid']; ?></td>
												<td><?php echo $row['firstname']. " ".$row['lastname'] ; ?></td>
												
												<?php
														$query ="SELECT * FROM login_details WHERE userid='".$row['userid']."'";
														$statement = $connect->prepare($query);
														$statement->execute();
														$result2 = $statement->fetchAll();
														$status='';
														$user_role='';
														foreach($result2 as $r){
															$user_role=$r['role'];
															$status=$r['status'];
															
														}


												?>
												<td><?php echo $user_role; ?></td> 
												<td><?php echo $status; ?></td>
												<td>
													<a href="user_profile.php?id=<?php echo $row['userid']; ?>" class="badge badge-primary">view</a> &nbsp; 
													<a href="edit_user.php?id=<?php echo $row['userid']; ?>" class="badge badge-primary">edit</a> &nbsp; 
													<a href="delete_user.php?id=<?php echo $row['userid']; ?>" class="badge badge-primary">delete</a>
												</td>
											</tr>
										<?php endforeach ; ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>