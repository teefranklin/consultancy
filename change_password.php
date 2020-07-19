<?php

include "assets/header.php";
include "assets/database.php";
$message='Change User Password';
$userid= $_GET['id'];

if(isset($_POST['update_password'])){
    $p1=$_POST['p1'];
    $cp=$_POST['cp'];

    $password=password_hash($p1,PASSWORD_DEFAULT);

    if($cp == $p1){
        $query="UPDATE login_details SET
        password='$password' 
        WHERE userid='$userid'";
        
        $statement = $connect->prepare($query);
        $statement->execute();


        $message="Password Update Successful !";

    }else{
        $message="Passwords Do Not match !";
    }

}
?>
            <div id="page-wrapper">
		<div class="graphs">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="view_users.php"><i class="fa fa-users"></i>  Users</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="#"><i
								class="fa fa-user"></i>Change Password</a></li>
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
								<div class="col-md-8">
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b> New Password :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="password" name="p1" id="" placeholder="Password"
												class="form-control" >
										</div>
									</div>
									<br>
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-4">
											<p id="txt"><b>Confirm New Password :</b> </p>
										</div>
										<div class="col-md-6">
											<input type="password" name="cp" id="" placeholder="Confirm Password"
												class="form-control" >
										</div>
									</div>


								</div>
								<div class="col-md-6">
									
									
								</div>
                            </div>
                            <br>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6"><input type="submit" name="update_password" id=""
										class="btn btn-primary" value="Update Password"></div>
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