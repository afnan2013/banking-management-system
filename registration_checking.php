<!--<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'bankdb';

$con = mysqli_connect($host, $user, $pass, $db_name);

if($con)
	echo "Database connection successful..";
else
	echo "Connection error";

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



?>