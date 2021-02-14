<?php 
require "db_connect.php";	

?>

<?php

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$sql = "select * from user where name = '$email'";

	$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);

if($num==1){
	
	header("location: registration.php");
	
}
else{
	$q = "insert into user(name,pass,salary) values('$email','$pass',12000)";
	mysqli_query($con, $q);
	header("location: Login.php");
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up - Banking Management System</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid bg_registration">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<form action="registration.php" class="form-container1" method="post">       <!--https://www.cssmatic.com  (for box shadow)  -->
				<h1 class="header">Sign Up</h1>
				<div class="form-group">
					<label for="inputEmail">Email</label>
					<input type="email" class="form-control" name="email" id="inputEmail" placeholder="enter email" required>
				</div>
				<div class="form-group">
					<label for="inputPassword">Password</label>
					<input type="password" class="form-control" name="pass" id="inputPassword" placeholder="enter password" required>
				</div>
				<br>
				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</form>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
	</div>
</div>
</body>



</html>

