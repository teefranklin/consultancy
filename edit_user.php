<?php

include "assets/header.php";
include "assets/database.php";
$userid= $_GET['id'];
$message='Edit User Information';
$genders=array(
    'Female',
    'Male',
    'Other'
);

$roles=array(
    'admin',
    'user'
);

$query ="SELECT * FROM user_info WHERE userid='$userid'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $gender=$row['gender'];
    $position=$row['position'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
    $fullname=$firstname." ".$lastname;
}

$query ="SELECT * FROM login_details WHERE userid='$userid'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $role=$row['role'];
}

if(isset($_POST['edit_user'])){
    $fname=$_POST['firstname'];
    $laname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $position=$_POST['position'];

    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $password="Default01";
    $password=password_hash($password,PASSWORD_DEFAULT);

    //inserting user info
    $query="UPDATE user_info SET
            firstname='$fname',
            lastname='$laname',
            gender='$gender',
            position='$position',
            email='$email',
            phone='$phone',
            address='$address' WHERE userid='$userid'";
    $statement = $connect->prepare($query);
    $statement->execute();

if($_SESSION['role']=='admin'){
    $role=$_POST['role'];
    //inserting login info
    $query="UPDATE login_details
             SET role='$role'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
    
    $message="Editing User Successful !";

}
?>
            <div id="page-wrapper">
		<div class="graphs">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><i class="fa fa-users"></i> <a href="view_users.php">Users</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="edit_user.php?id=<?php echo $userid; ?>"><i
								class="fa fa-user"></i> Edit User</a></li>
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
												class="form-control" value="<?php echo $firstname; ?>">
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
												class="form-control" value="<?php echo $lastname; ?>">
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Gender:</b> </p>
										</div>
										<div class="col-md-6">
											<select name="gender" id="" class="form-control">
                                                <?php foreach($genders as $g) : ?>
                                                    <?php if($g==$gender) : ?>
                                                        <option value="<?php echo $gender; ?>" selected><?php echo $gender; ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $gender; ?>" ><?php echo $gender; ?></option>
                                                    <?php endif ; ?>
                                                <?php endforeach ; ?>
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
												placeholder="Position" value="<?php echo $position; ?>">
										</div>
									</div>
									<br>
                                    <?php if($_SESSION['role']=='admin') : ?>
                                        <div class="row ">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4">
                                                <p id="txt"><b>Role:</b> </p>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="role" id="" class="form-control">
                                                <?php foreach($roles as $r) : ?>
                                                    <?php if($role==$r) : ?>
                                                        <option value="<?php echo $r; ?>" selected><?php echo $r; ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $r; ?>" ><?php echo $r; ?></option>
                                                    <?php endif ; ?>
                                                <?php endforeach ; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif ; ?>


								</div>
								<div class="col-md-6">
									<div class="row ">
										<div class="col-md-1"></div>
										<div class="col-md-4">
											<p id="txt"><b>Email :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="email" name="email" id="" placeholder="email"
												class="form-control" value="<?php echo $email; ?>">
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
												class="form-control" value="<?php echo $phone; ?>">
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
												class="form-control" value="<?php echo $address; ?>">
										</div>
									</div>
									
								</div>
                            </div>
                            <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6"><input type="submit" name="edit_user" id=""
										class="btn btn-primary" value="Edit User"></div>
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