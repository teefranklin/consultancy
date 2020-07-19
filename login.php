<?php include 'assets/database.php'; ?>
<?php 
session_start();

$message = 'Please Login Here !';
if(isset($_SESSION['userid'])){
    header('Location:index.php'); 
}
if(!isset($_SESSION['password_tries'])){
	$_SESSION['password_tries']=1;
}
if(isset($_POST['login'])){
    if($_SESSION['password_tries']==3){
		$_SESSION['password_tries']=1;
		$query ="UPDATE login_details  SET status='deactivated' 
		WHERE userid= :userid";

		$statement = $connect->prepare($query);
		$statement -> execute(
			array(
				':userid' => $_POST['userid']
			)
		);
		
		$message="Account Is Deactivated !";
		
	}else{
		$query ="SELECT * FROM login_details 
		WHERE userid= :userid";

		$statement = $connect->prepare($query);
		$statement -> execute(
			array(
				':userid' => $_POST['userid']
			)
		);
		$count= $statement -> rowCount();

		if($count>0){
			$query ="SELECT * FROM login_details 
			WHERE userid= :userid and status= 'active'";
			
			$statement = $connect->prepare($query);
			$statement -> execute(
				array(
					':userid' => $_POST['userid']
				)
			);
			$count= $statement -> rowCount();
			if($count>0){
				$result = $statement -> fetchAll();
				foreach($result as $row){
					if(password_verify($_POST['password'],$row['password'])){
						$_SESSION['userid'] = $row['userid'];
						$_SESSION['role'] = $row['role'];

						$squery ="SELECT * FROM user_info where userid='".$_SESSION['userid']."'";
						
						$statement = $connect->prepare($squery);
						$statement->execute();
						$pipo = $statement->fetchAll();
						foreach($pipo as $info){
							$_SESSION['fullname']=$info['firstname'] . ' ' .$info['lastname'];
							$_SESSION['position']=$info['position'];
						}
											
						header('Location:index.php');
					}else{
						$message="Wrong Password !";
						$_SESSION['password_tries']++;
						echo $alert;
					}
				}
			}else{
				$message="Account Is Deactivated !";
			}
			
		}else{
			$message="Wrong Username !";
		}
	}
}

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Consultancy</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/login.css" rel='stylesheet' type='text/css' />
	
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext" rel="stylesheet">
</head>

<body>
	<h1>Welcome To Radical Systems </h1>
	<div class="login box box--big">
	
		<form action="" method="post">
		<div class="alert alert-info" style="width:100%"><?php echo $message; ?></div>
		<br>
			<div class="div-txt">
				<label>
					<i class="fa fa-user" aria-hidden="true"></i> User ID </label>
				<input type="text" name="userid" placeholder="Enter your User ID " required />
			</div>
			<div class="div-txt">
				<label>
					<i class="fa fa-envelope" aria-hidden="true"></i> password </label>
				<input type="password" name="password" placeholder="Enter your password "  id="password" required/>
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Show password</label>
				</div>
			</div>
			<!-- script for show password -->
			<script>
				function myFunction() {
					var x = document.getElementById("password");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //script ends here -->
			<div class="div-btn">
				<div class="form-end">
				<input type="submit" value="LOGIN" class="btn btn-info" name="login">
				</div>
				<div class="clearfix"></div>
			</div>
		</form>
	</div>

</body>

</html>