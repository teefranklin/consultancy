<?php

include "assets/header.php";
include "assets/database.php";
$message='Edit Client Information';
$client_id= $_GET['id'];

$query ="SELECT * FROM clients WHERE client_id='$client_id'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
}
if(isset($_POST['edit_client'])){
    $name=$_POST['name'];

    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    //updating client
    $query="UPDATE clients SET
            name='$name',
            email='$email',
            phone='$phone',
            address='$address' WHERE client_id='$client_id'";
    $statement = $connect->prepare($query);
    $statement->execute();

    
    $message="Editing Client Successful !";

}
?>
            <div id="page-wrapper">
		<div class="graphs">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><i class="fa fa-users"></i> Clients</li>
					<li class="breadcrumb-item active" aria-current="page"><a href="#"><i
								class="fa fa-user"></i>Edit Client</a></li>
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
												class="form-control" value="<?php echo $name; ?>">
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
												class="form-control" value="<?php echo $email; ?>">
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
												placeholder="Phone Number(s)" value="<?php echo $phone; ?>">
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
												placeholder="Address" value="<?php echo $address; ?>">
										</div>
									</div>


								</div>
								<div class="col-md-6">
									
									
								</div>
                            </div>
                            <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6"><input type="submit" name="edit_client" id=""
										class="btn btn-primary" value="Edit Client"></div>
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