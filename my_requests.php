<?php

include "assets/header.php";
include "assets/database.php";

$query ="SELECT * FROM travel_request where userid='".$_SESSION['userid']."' and status !='approved' and status !='rejected'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
			<div id="page-wrapper">
				<div class="graphs">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
							<li class="breadcrumb-item"><i class="lnr lnr-bus"></i> Travel Request</li>
							<li class="breadcrumb-item active" aria-current="page"><a href="my_requests.php"><i
										class="lnr lnr-bus"></i> My Pending Requests</a></li>
						</ol>
					</nav>
					<div class="md">
						<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}"
							data-widget-static="">
							<div class="panel-heading">
								<h2>My Requests</h2>
								<div class="panel-ctrls" data-actions-container=""
									data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span
										class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>Request ID</th>
											<th>Description</th>
											<th>Travel Date</th>
											<th>Type</th>
											<th>Assigned To</th>
											<th>Status</th>
											<th>Action</th>
                                            
										</tr>
									</thead>
									<tbody>
										<?php foreach($result as $row) : ?>
											<tr>
												<td><?php echo $row['travel_id']; ?></td>
												<td><?php echo 'Travel to '.$row['destination']; ?></td>
												<td><?php echo $row['travel_date']; ?></td>
												<td><?php echo $row['travel_type']; ?></td>
												<?php
											
													$query ="SELECT * FROM user_info where userid='".$row['assigned_to']."'";
													$statement = $connect->prepare($query);
													$statement->execute();
													$names = $statement->fetchAll();

													$person="";

													foreach($names as $name){
														$person=$name['firstname']." ".$name['lastname'];
													}

												?>
												<td><?php echo $person; ?></td>
												<td><a class="badge badge-success"><?php echo $row['status']; ?></a></td>
												<td><a href="view_travel.php?id=<?php echo $row['travel_id'] ?>" class="btn btn-primary"><i class="fa fa-search"></i> View</a></td>
												
											</tr>
										<?php endforeach ; ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php
						$query ="SELECT * FROM travel_request where userid='".$_SESSION['userid']."' and status ='Approved'";
						$statement = $connect->prepare($query);
						$statement->execute();
						$result = $statement->fetchAll();
					?>

					<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}"
							data-widget-static="">
							<div class="panel-heading">
								<h2>Approved Requests</h2>
								<div class="panel-ctrls" data-actions-container=""
									data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span
										class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>Request ID</th>
											<th>Description</th>
											<th>Travel Date</th>
											<th>Type</th>
											<th>Assigned To</th>
											<th>Status</th>
											<th>Action</th>
                                            
										</tr>
									</thead>
									<tbody>
										<?php foreach($result as $row) : ?>
											<tr>
												<td><?php echo $row['travel_id']; ?></td>
												<td><?php echo 'Travel to '.$row['destination']; ?></td>
												<td><?php echo $row['travel_date']; ?></td>
												<td><?php echo $row['travel_type']; ?></td>
												<?php
											
													$query ="SELECT * FROM user_info where userid='".$row['assigned_to']."'";
													$statement = $connect->prepare($query);
													$statement->execute();
													$names = $statement->fetchAll();

													$person="";

													foreach($names as $name){
														$person=$name['firstname']." ".$name['lastname'];
													}

												?>
												<td><?php echo $person; ?></td>
												<td><a class="badge badge-success"><?php echo $row['status']; ?></a></td>
												<td><a href="view_travel.php?id=<?php echo $row['travel_id'] ?>" class="btn btn-primary"><i class="fa fa-search"></i> View</a></td>
												
											</tr>
										<?php endforeach ; ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<br><br>

					<?php
						$query ="SELECT * FROM travel_request where userid='".$_SESSION['userid']."' and status ='rejected'";
						$statement = $connect->prepare($query);
						$statement->execute();
						$result = $statement->fetchAll();
					?>
					<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}"
							data-widget-static="">
							<div class="panel-heading">
								<h2>Rejected Requests</h2>
								<div class="panel-ctrls" data-actions-container=""
									data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span
										class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>Request ID</th>
											<th>Description</th>
											<th>Travel Date</th>
											<th>Type</th>
											<th>Assigned To</th>
											<th>Status</th>
											<th>Action</th>
                                            
										</tr>
									</thead>
									<tbody>
										<?php foreach($result as $row) : ?>
											<tr>
												<td><?php echo $row['travel_id']; ?></td>
												<td><?php echo 'Travel to '.$row['destination']; ?></td>
												<td><?php echo $row['travel_date']; ?></td>
												<td><?php echo $row['travel_type']; ?></td>
												<?php
											
													$query ="SELECT * FROM user_info where userid='".$row['assigned_to']."'";
													$statement = $connect->prepare($query);
													$statement->execute();
													$names = $statement->fetchAll();

													$person="";

													foreach($names as $name){
														$person=$name['firstname']." ".$name['lastname'];
													}

												?>
												<td><?php echo $person; ?></td>
												<td><a class="badge badge-success"><?php echo $row['status']; ?></a></td>
												<td><a href="view_travel.php?id=<?php echo $row['travel_id'] ?>" class="btn btn-primary"><i class="fa fa-search"></i> View</a></td>
												
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