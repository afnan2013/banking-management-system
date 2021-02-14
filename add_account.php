<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: Login.php");
}

?>

<?php

require "db_connect.php";


$sql = "SELECT customer_id as id,f_name as name from customer";
$sql_type = "SELECT type_id as 'id',acc_type as 'type' FROM account_type;";

$read = mysqli_query($con, $sql);
$read_type = mysqli_query($con, $sql_type);

if($read_type){
	var_dump($read);
}


if(isset($_POST['submit'])){

	$cust_id = $_POST['cust_id'];
	$balance = $_POST['balance'];
	$date = $_POST['date'];
	$acc_type = $_POST['acc_type'];
	

	
	$q = "INSERT INTO account_balance (balance, opening_date, customer_id, type_id) 
	VALUES('$balance', '$date', '$cust_id','$acc_type')";
	$result = mysqli_query($con, $q);

	if($result){
		header('location: account.php');
	}
	else{
		echo "Account Invalid";
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
                    <li><a href="customer.php"><i class="glyphicon glyphicon-calendar"></i> Customers</a></li>
                    <li  class="current"><a href="account.php"><i class="glyphicon glyphicon-stats"></i> Accounts</a></li>
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
		            <div class="panel-title"><h3>Account Registration Form</h3></div>
		          <!--
		            <div class="panel-options">
		              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		            </div>
		        -->
		        </div>
					<div class="panel-body">
						<form action="add_account.php" class="form-container" method="post">
						<fieldset>
							<div class="form-group">
								<label>Customer ID</label><br>
								<select name="cust_id" class="form-control" required>
									<option value="No Options Selected">Choose Option Below</option>

									<?php if($read){ ?>
									<?php while($row = $read->fetch_assoc()) {?>

										<option value="<?php echo $row['id']; ?>"><?php echo $row['id']." - ".$row['name']; ?></option>

									<?php } } ?>	
								</select>
								
							</div>
							<div class="form-group">
								<label>Balance</label>
								<input class="form-control" name="balance" placeholder="balance" type="number" required>
							</div>
							<div class="form-group">
								<label>Registration Date</label>
								<input class="form-control" name="date" placeholder="date" type="date" required>
							</div>
							
							<div class="form-group">
								<label>Account Type</label><br>
								<select name="acc_type" class="form-control" required>
									<option value="No Options Selected">Choose Option Below</option>

									<?php if($read_type){ ?>
									<?php while($row = $read_type->fetch_assoc()) {?>

										<option value="<?php echo $row['id']; ?>"><?php echo $row['id']; echo " - "; echo $row['type']; ?></option>

									<?php } } ?>	
								</select>
							</div>
							
							
						</fieldset>
						<br>
						<div>

							<button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
							<br>
							<button class="btn btn-danger btn-block" type="reset">Reset</button> 
							<br>
							<a href="account.php"><button class="btn btn-primary btn-block" type="button">Cancel</button></a>

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