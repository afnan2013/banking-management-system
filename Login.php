<?php

session_start();

require "db_connect.php";

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$sql = "select * from user where name = '$email' && pass='$pass'";

	//$result = mysqli_query($con, $sql) or die();
	//$num = mysqli_num_rows($result);
	$result = select($con, $sql);
	$num = mysqli_num_rows($result);

if($num==1){
	$_SESSION['email'] = $email;
	header("location: dashboard.php");
}
else{
	echo "User Invalid";
	header("location: Login.php");
}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Banking Management System</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid bg">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<form action=Login.php class="form-container1" method="post">       <!--https://www.cssmatic.com  (for box shadow)  -->
				<h1 class="header">Login</h1>
				<div class="form-group">
					<label for="inputEmail">Email</label>
					<input type="email" class="form-control" name="email" id="inputEmail" placeholder="enter email" required>
				</div>
				<div class="form-group">
					<label for="inputPassword">Password</label>
					<input type="password" class="form-control" name="password" id="inputPassword" placeholder="enter password" required>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox"> Remember me
					</label>
				</div>
				<button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
				
			</form>
			<form action="registration.php" class="form-container2">
				<label class="lb1">Not a user? Please sign up here</label>
				<button type="Sign Up" class="btn btn-primary btn-block">Sign Up</button>
			</form>	
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
	</div>
</div>
</body>
</html>