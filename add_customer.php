<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: Login.php");
}

?>

<?php

require "db_connect.php";

if(isset($_POST['submit'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$n_id = $_POST['n_id'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$date = $_POST['date'];

	$sql = "select * from customer where f_name = '$fname' and email= '$email'";

	$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);

if($num==1){
	echo "Customer Already Exists...";
	header("location: add_customer.php");
	
}
else{
	$q = "INSERT INTO customer (f_name, l_name, national_id, email_id, date, phone, address, pass, username) VALUES('$fname', '$lname', '$n_id', '$email', '$date', '$phone', '$address', '$pass', '$user')";
	mysqli_query($con, $q);
	header("location: customer.php");
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!--<link href="css/style.css" type="text/css" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

	<link rel="stylesheet" href="css/template.css" type="text/css">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>


<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4"></div>

				<div class="col-sm-4">
					<div class="row">
						<div class="col-md-10">
							<div class="input-group form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button">Search</button>
								</span>
							</div>
						</div>
						<div class="col-md-2">
							<a href="logout.php"><button class="btn btn-primary" type="button">LOGOUT</button></a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--<div class="jumbotron text-center">
		<h1>Banking Management System</h1>
		<p>New World To Banking</p>
	</div> -->

	<div class="page-content">
    	<div class="row">
		  <div class="col-sm-3">
		  	<div class="sidebar content-box" style="display: block; ">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li class="current"><a href="customer.php"><i class="glyphicon glyphicon-calendar"></i> Customers</a></li>
                    <li><a href="account.php"><i class="glyphicon glyphicon-stats"></i> Accounts</a></li>
                    <li><a href="transaction.php"><i class="glyphicon glyphicon-stats"></i> Transactions</a></li>
                    <li><a href="withdrawal.php"><i class="glyphicon glyphicon-list"></i> Withdrawals</a></li>
                    <li><a href="deposit.php"><i class="glyphicon glyphicon-record"></i> Deposits</a></li>
                    <li><a href="account_type.php"><i class="glyphicon glyphicon-pencil"></i> Account Types</a></li>
                    <li><a href="loan.php"><i class="glyphicon glyphicon-tasks"></i> Loans</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>

		  <div class="col-sm-1">
		  	
		  </div>
		  
		  <div class="col-sm-5">
				<div class="content-box-large">
					<div class="panel-heading">
		            <div class="panel-title"><h3>Customer Registration Form</h3></div>
		          <!--
		            <div class="panel-options">
		              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		            </div>
		        -->
		        </div>
					<div class="panel-body" style="background: #FFE793;">
						<form action="add_customer.php" class="form-container" method="post">
						<fieldset>
							<div class="form-group">
								<label>First Name</label>
								<input class="form-control" name="fname" placeholder="first name" type="text" required>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input class="form-control" name="lname" placeholder="last name" type="text" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" name="email" placeholder="email" type="email" required>
							</div>
							<div class="form-group">
								<label>National ID</label>
								<input class="form-control" name="n_id" placeholder="national ID" type="text" required>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input class="form-control" name="address" placeholder="address" type="text" required>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input class="form-control" name="phone" placeholder="phone number" type="text" required>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" name="user" placeholder="username" type="text" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" name="pass" placeholder="password" type="password" required>
							</div>
							<div class="form-group">
								<label>Registration Date</label>
								<input class="form-control" name="date" placeholder="date" type="date" required>
							</div>
						</fieldset>
						<br>
						<div>

							<button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
							<br>
							<button class="btn btn-danger btn-block" type="reset">Reset</button> 
							<br>
							<a href="customer.php"><button class="btn btn-primary btn-block" type="button">Cancel</button></a>

						</div>

						
						</form>
					</div>
				</div>
  			</div>
	  				
		  </div>
		</div>
	</div>

	<div class="container">
		<p class="text-center text-success">Welcome <?php echo $_SESSION['email']; ?></p>
		
	</div>

</body>
</html>