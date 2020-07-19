<?php

include "assets/header.php";
include "assets/database.php";
$message='Add Client Information';
if(isset($_POST['add_client'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    //inserting into clients
    $query="INSERT INTO clients
             (name,email,phone,address)
    VALUES('$name','$email','$phone','$address')";
    $statement = $connect->prepare($query);
    $statement->execute();

    $message="Adding Client Successful !";

}
?>
            <div id="page-wrapper">
		<div class="graphs">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><i class="fa fa-users"></i> <a href="view_clients.php"> Clients</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="add_client.php"><i
								class="fa fa-user"></i> Add Client</a></li>
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
								<div class="col-md-6">
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client Name :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="name" id="" placeholder="Client Name"
												class="form-control" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client Email :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="emai;" name="email" id="" placeholder="Email"
												class="form-control" required>
										</div>
									</div>
									
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client Phone :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="phone" id="" class="form-control"
												placeholder="Phone Number(s)" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Client Address:</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="address" id="" class="form-control"
												placeholder="Address" required>
										</div>
									</div>


								</div>
								<div class="col-md-6">
									
									
								</div>
                            </div>
                            <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6"><input type="submit" name="add_client" id=""
										class="btn btn-primary" value="Add Client"></div>
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
</body>

</html>