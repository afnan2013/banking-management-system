<?php



$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'bankdb';

$con = mysqli_connect($host, $user, $pass, $db_name);

if($con)
	echo "";
else
	echo "Connection error";

function select($con, $query){
	$result = mysqli_query($con, $query) or die();
	if(mysqli_num_rows($result)>0){
		return $result;
	}
	else{
		return false;
	}
}

function insert(){
	









	
}
/*$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "select * from login where email = '$email' && password='$pass'";

$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);

if($num==1){
	$_SESSION['email'] = $email;
	header("location: dashboard.php");
}
else{
	echo "User Invalid";
	header("location: Login.php");
}
*/

?>