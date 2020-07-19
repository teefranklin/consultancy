<?php

include "assets/header.php";
include "assets/database.php";

$query ="SELECT * FROM clients";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
			<div id="page-wrapper">
				<div class="graphs">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
							<li class="breadcrumb-item"><i class="fa fa-users"></i> Clients</li>
							<li class="breadcrumb-item active" aria-current="page"><a href="view_clients.php"><i
										class="fa fa-users"></i> View Clients</a></li>
						</ol>
					</nav>
					<div class="md">
						<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}"
							data-widget-static="">
							<div class="panel-heading">
								<h2>All Clients</h2>
								<div class="panel-ctrls" data-actions-container=""
									data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span
										class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>Client ID</th>
											<th>Full Name</th>
                                            <th>Address</th>
                                            <th>Contact Details</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($result as $row) : ?>
										<tr>
											<td><?php echo $row['client_id']; ?></td>
											<td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
											<td><a href="edit_client.php?id=<?php echo $row['client_id']; ?>" class="badge badge-primary">edit</a> &nbsp; <a href="delete_client.php?id=<?php echo $row['client_id']; ?>" class="badge badge-primary">delete</a></td>
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