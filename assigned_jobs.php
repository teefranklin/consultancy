<?php

include "assets/header.php";
include "assets/database.php";

$query ="SELECT * FROM jobs where assigned_to='".$_SESSION['userid']."' and status='pending'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
            <div id="page-wrapper">
                <div class="graphs">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><i class="fa fa-tasks"></i> Jobs</li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="assigned_jobs.php"><i class="fa fa-tasks"></i> Assigned Jobs</a></li>
                        </ol>
                    </nav>
                    <div class="md">
                        <div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}"
                            data-widget-static="">
                            <div class="panel-heading">
                                <h2>Assigned Jobs</h2>
                                <div class="panel-ctrls" data-actions-container=""
                                    data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span
                                        class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
                            </div>
                            <div class="panel-body no-padding" style="display: block;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="warning">
                                            <th>Job ID</th>
                                            <th>Job Description</th>
                                            <th>Client Name</th>
                                            <th>Date Posted</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($result as $row) : ?>
										<tr>
											<td><?php echo $row['job_id']; ?></td>
											<?php
											
												$query ="SELECT * FROM clients where client_id='".$row['client_id']."'";
												$statement = $connect->prepare($query);
												$statement->execute();
												$clients = $statement->fetchAll();

												$company_name="";

												foreach($clients as $client){
													$company_name=$client['name'];
												}

											?>
											
											<td><?php echo $row['description']; ?></td>
											<td><?php echo $company_name; ?></td>
											<td><?php echo $row['date_started']; ?></td>
											<td><?php echo $row['type']; ?></td>
											<td><a class="badge badge-success"><?php echo $row['status']; ?></a></td>
											<td>
                                                <a href="add_work_report.php?job_id=<?php echo $row['job_id']; ?>" class="badge badge-primary">Add Work Report</a>
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