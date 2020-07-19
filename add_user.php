<?php

include "assets/header.php";
include "assets/database.php";
$message='Add User Information';
if(isset($_POST['add_user'])){
    $userid=get_random_id($connect);
    $fname=$_POST['firstname'];
    $laname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $position=$_POST['position'];
    $role=$_POST['role'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $password="Default01";
    $password=password_hash($password,PASSWORD_DEFAULT);

    //inserting user info
    $query="INSERT INTO user_info
             (userid,firstname,lastname,gender,position,email,phone,address)
    VALUES('$userid','$fname','$laname','$gender','$position','$email','$phone','$address')";
    $statement = $connect->prepare($query);
    $statement->execute();


    //inserting login info
    $query="INSERT INTO login_details
             (userid,password,role)
    VALUES('$userid','$password','$role')";
    $statement = $connect->prepare($query);
    $statement->execute();
    $message="Adding User Successful !";

}
//generate random user id
function  get_random_id($connect){
    $q='R'.rand(1111111,1222222);
    $id=checkDB($q,$connect); 
    return $id;
}
function checkDB($id,$connect){
    $query ="SELECT * FROM user_info
	WHERE userid=$id";
			
	$statement = $connect->prepare($query);
	$statement -> execute();
    $count= $statement -> rowCount();
    if($count==0){
        return $id;
    }else{
        get_random_id($connect);
    }
}
?>
            <div id="page-wrapper">
		<div class="graphs">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><i class="fa fa-users"></i> <a href="view_users.php">Users</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="add_user.php"><i
								class="fa fa-user"></i> Add User</a></li>
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
											<p id="txt"><b>Firstname :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="firstname" id="" placeholder="Firstname"
												class="form-control" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Lastname :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="lastname" id="" placeholder="Lastname"
												class="form-control" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Gender:</b> </p>
										</div>
										<div class="col-md-6">
											<select name="gender" id="" class="form-control" required>
												<option value="female">Female</option>
												<option value="male">Male</option>
												<option value="other">Other</option>
											</select>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Position :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="position" id="" class="form-control"
												placeholder="Position" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Role:</b> </p>
										</div>
										<div class="col-md-6">
											<select name="role" id="" class="form-control" required>
												<option value="user">user</option>
												<option value="admin">admin</option>
											</select>
										</div>
									</div>


								</div>
								<div class="col-md-6">
									<div class="row ">
										<div class="col-md-1"></div>
										<div class="col-md-4">
											<p id="txt"><b>Email :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="email" name="email" id="" placeholder="email"
												class="form-control" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-1"></div>
										<div class="col-md-4">
											<p id="txt"><b>Phone :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="phone" id="" placeholder="Phone Number"
												class="form-control" required>
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-1"></div>
										<div class="col-md-4">
											<p id="txt"><b>Address:</b> </p>
										</div>
										<div class="col-md-6">
											<input type="text" name="address" id="" placeholder="123 Rhodesville, Harare"
												class="form-control" required>
										</div>
									</div>
									
								</div>
                            </div>
                            <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6"><input type="submit" name="add_user" id=""
										class="btn btn-primary" value="Add User"></div>
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