<?php

include "assets/header.php";
include "assets/database.php";
$message='Add Job Information';

$query ="SELECT * FROM clients";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

if(isset($_POST['add_job'])){
    $description=$_POST['description'];
    $client_name=$_POST['client_name'];
    $type=$_POST['type'];
	$assigned_to=$_POST['assigned_to'];
	$today=date('Y-m-d H:i:s');

    //inserting job info
    $query="INSERT INTO jobs
             (description,client_id,type,assigned_to,assigned_by,date_started,status)
    VALUES('$description','$client_name','$type','$assigned_to','".$_SESSION['fullname']."','$today','pending')";
    $statement = $connect->prepare($query);
    $statement->execute();

    $message="Adding Job Successful !";

}
?>
            <div id="page-wrapper">
		<div class="graphs">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><i class="fa fa-tasks"></i> <a href="jobs.php"> Jobs</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="add_user.php"><i
								class="fa fa-tasks"></i> Add Job</a></li>
				</ol>
			</nav>
			<div class="container">
				<div class="panel-group">
					<div class="panel panel-primary">
						<br>
						<form action="" method="post">
						<div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><div class="alert alert-success" style="width:100%"><h4 align="center"><?php echo $message; ?></h4></div></div>
                            </div>
							<div class="row">
								<div class="row container">
									<div class="col-md-1"></div>
										<div class="col-md-2">
											<p id="txt"><b>Problem Description :</b> </p>
										</div>
										<div class="col-md-9">
											<input type="text" name="description" id="" placeholder="Problem Description"
												class="form-control" required>
										</div>
									</div>
									<br>
								<div class="col-md-6">
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client:</b> </p>
										</div>
										<div class="col-md-6">
											<select name="client_name" id="client_name" class="form-control" >
											<option value="#">Choose Client</option>
											<?php foreach($result as $row) : ?>
												<option value="<?php echo $row['client_id']; ?>"><?php echo $row['name']; ?></option>
											<?php endforeach ; ?>
                                                
											</select>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Job Type :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="type" id="" class="form-control"
												placeholder="Job Problem Type" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Assigned To:</b> </p>
										</div>
										<div class="col-md-6">
										<?php
											
											$query ="SELECT * FROM user_info";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();

										?>
											<select name="assigned_to" id="" class="form-control" required>
											<?php foreach($result as $row) : ?>
												<option value="<?php echo $row['userid']; ?>"><?php echo $row['firstname']." ".$row['lastname']; ?></option>
											<?php endforeach ; ?>
											</select>
										</div>
									</div>


								</div>
								<div class="col-md-6">
									<div class="row ">
										<div class="col-md-1"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client Email :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="email" name="email" id="email" placeholder="email"
												class="form-control" disabled>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-1"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client Phone Number(s) :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="phone" id="phone" placeholder="Phone Number"
                                                class="form-control" disabled>
                                                
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-1"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client Address:</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="address" id="address" placeholder="123 Rhodesville, Harare"
												class="form-control" disabled>
										</div>
									</div>
									
								</div>
                            </div>
                            <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6"><input type="submit" name="add_job" id=""
										class="btn btn-primary" value="Add Job"></div>
							</div>
						</form>

						<br>
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
	<script>
		function search(id){
			$.ajax({
				type: "POST", // The method of sending data can be with GET or POST
				url: "search.php", // Fill in url / php file path to destination
				data: {id : id}, // data to be sent to the process file
				dataType: "json",
				success: function(response){ // When the submission process is successful
						
						if(response.status == "success"){ // If the content of the status array is success
							$("#email").val(response.email);
							$("#phone").val(response.phone); // set textbox with id phone
							$("#address").val(response.address); // set textbox with id address
						}else{ // If the contents of the status array are failed
							alert("undefined");
						}
				},
				error: function (xhr, ajaxOptions, thrownError) { // When there is an error
					alert(xhr.responseText);
				}
			});	
		}
		$(document).ready(function(){
				$("#client_name").change(function(){ // When the user clicks the Search button
					var id=$("#client_name").val();
					search(id); // Call search function 
				});
			
		});
	
	</script>

  
  

</body>

</html>