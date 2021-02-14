<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: Login.php");
}

?>

<?php

require 'db_connect.php';



if(isset($_POST['submit'])){

	$acc_id = $_POST['acc_id'];
	$amount = $_POST['amount'];
	$tran_type = $_POST['tran_type'];
	$date = $_POST['date'];
	$pay_type = $_POST['pay_type'];

	$q_balance = "SELECT balance FROM account_balance where acc_id = '$acc_id'";

	$read_balance = mysqli_query($con, $q_balance);
	$single = $read_balance->fetch_assoc();



	if($single['balance'] > $amount || $tran_type == "DEPOSIT"){

		if($tran_type == "DEPOSIT"){
			$update_balance = $single['balance'] + $amount;
		}
		else{
			$update_balance = $single['balance'] - $amount;
		}
		

		$update = "UPDATE account_balance 
					SET balance = '$update_balance'
						WHERE acc_id = '$acc_id'";

		$r = mysqli_query($con, $update);

		$sql_insert = "INSERT INTO transaction (tran_type, amount, mode, date, acc_id) 
							VALUES ('$tran_type', '$amount', '$pay_type', '$date', '$acc_id')";

		$result = mysqli_query($con, $sql_insert);
		if($result){
			echo 'Transaction Successful';
		}
		else{
			echo 'Transaction error';
		}

	}

	else{
		echo "Your Account Balance cross the limit...";
	}	

}


$sql_tran = "SELECT t.tran_id,t.amount, a.acc_id, c.customer_id, c.f_name, t.tran_type,t.date
				FROM (account_balance as a 
				       NATURAL JOIN transaction as t)
				      	join customer as c 
				        	on a.customer_id = c.customer_id
				            ORDER BY t.tran_id desc
				            LIMIT 5";

$read_tran = mysqli_query($con, $sql_tran);

$sql_acc = "SELECT a.acc_id as 'id',c.f_name as 'name' FROM account_balance as a 
				join customer as c 
					on a.customer_id = c.customer_id
			        	ORDER BY a.acc_id";

$read_acc = mysqli_query($con, $sql_acc);



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
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="logo">
	                 <h1><a href="dashboard.php">Banking Management System</a></h1>
	              </div>
				</div>
				

				<div class="col-sm-6">
				<div class="navigate">	
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-6">
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
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-sm-12">
					
				<div class="slider" style=" margin-bottom: 10px; ">
			
					<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2500">
						<ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						    <li data-target="#myCarousel" data-slide-to="3"></li>
						    <li data-target="#myCarousel" data-slide-to="4"></li>
						    <li data-target="#myCarousel" data-slide-to="5"></li>
						    <li data-target="#myCarousel" data-slide-to="6"></li>
						</ol>

						<div class="carousel-inner" >
						    <div class="item active">
						      <img src="css/images/slide.jpg" alt="Los Angeles">
						      <div class="carousel-caption">
								<h1>Banking Management System</h1>
								<p>New World To Banking</p>
							  </div>

						    </div>

						    <div class="item">
						      <img src="css/images/slide2.jpg" alt="Chicago" class="img-responsive">
						      <div class="carousel-caption">
								<h1>Banking Management System</h1>
								<p>New World To Banking</p>
							  </div>
						    </div>

						    <div class="item">
						      <img src="css/images/slide4.jpg" alt="New York">
						      <div class="carousel-caption">
								<h1>Banking Management System</h1>
								<p>New World To Banking</p>
							  </div>
						    </div>

						    <div class="item">
						      <img src="css/images/slide1.jpg" alt="New York">
						      <div class="carousel-caption">
								<h1>Banking Management System</h1>
								<p>New World To Banking</p>
							  </div>
						    </div>

						    <div class="item">
						      <img src="css/images/slide5.jpg" alt="New York">
						      <div class="carousel-caption">
								<h1>Banking Management System</h1>
								<p>New World To Banking</p>
							  </div>
						    </div>

						    <div class="item">
						      <img src="css/images/slide6.jpg" alt="New York">
						      <div class="carousel-caption">
								<h1>Banking Management System</h1>
								<p>New World To Banking</p>
							  </div>
						    </div>

						    
						    

						</div>

						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right"></span>
						    <span class="sr-only">Next</span>
						</a>

					</div>
				</div>
			</div>
		</div>



    	<div class="row">
		  <div class="col-sm-3">
		  	<div class="sidebar content-box" style="display: block; ">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="customer.php"><i class="glyphicon glyphicon-calendar"></i> Customers</a></li>
                    <li><a href="account.php"><i class="glyphicon glyphicon-stats"></i> Accounts</a></li>
                    <li class="current"><a href="transaction.php"><i class="glyphicon glyphicon-stats"></i> Transactions</a></li>
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

		
	

	<div class="col-sm-9">
		<div class="">
			<div class="row">
  				<div class="col-sm-2">
  					<a href="transaction_list.php"><button class="btn btn-success" type="button">Transaction List</button></a>
  				</div>
  			</div>
		</div>


		<div class="row">
			<div class="col-sm-3"></div>


			<div class="col-sm-6">
				<div class="content-box-large">
					<div class="panel-heading">
		            <div class="panel-title"><h3>Transaction Entry</h3></div>
		          <!--
		            <div class="panel-options">
		              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		            </div>
		        -->
		        	</div>
					<div class="panel-body">
						<form action="transaction.php" class="form-container" method="post">
						<fieldset>
							<div class="form-group">
								<label>Account ID</label><br>
								<select name="acc_id" class="form-control" required>
									<option value="No Options Selected">Choose Option Below</option>

									<?php if($read_acc){ ?>
									<?php while($row = $read_acc->fetch_assoc()) {?>

										<option value="<?php echo $row['id']; ?>"><?php echo $row['id']." - ".$row['name']; ?></option>

									<?php } } ?>	
								</select>
								
							</div>
							<div class="form-group">
								<label>Amount</label>
								<input class="form-control" name="amount" placeholder="transaction amount" type="number" required>
							</div>
							<div class="form-group">
								<label>Transaction Type</label><br>
								<select name="tran_type" class="form-control" required>
									<option value="No Options Selected">Choose Option Below</option>
									<option value="DEPOSIT">DEPOSIT</option>
									<option value="WITHDRAW">WITHDRAW</option>
								</select>
							</div>
							<div class="form-group">
								<label>Transaction Date</label>
								<input class="form-control" name="date" placeholder="date" type="date" required>
							</div>
							
							<div class="form-group">
								<label>Payment Mode</label><br>
								<select name="pay_type" class="form-control" required>
									<option value="No Options Selected">Choose Option Below</option>
									<option value="Cash">CASH</option>
									<option value="Cheque">CHEQUE</option>
									<option value="Bcash">Bcash</option>
									<option value="DBBL">DBBL</option>
								</select>
							</div>
							
							
						</fieldset>
						<br>
						<div>

							<button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
							<br>
							<button class="btn btn-danger btn-block" type="reset">Reset</button> 
							<br>
							<a href="transaction.php"><button class="btn btn-primary btn-block" type="button">Cancel</button></a>

						</div>

						
					</form>
				</div>
			</div>
			</div>


  			<div class="col-sm-3"></div>
  		</div>




		<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title text-center"><p>Recent Transactions</p></div>
				</div>

				
  				<div class="panel-body">
  					<table class="table table-hover" style=" font-size: 12px;">
		              <thead>
		                <tr>
		                  <th>Transaction Id</th>
		                  <th>Amount</th>	
		                  <th>Account Id</th>
		                  <th>Customer Id</th>
		                  <th>Customer Name</th>
		                  <th>Type</th>
		                  <th>Date</th>
		                  <th>Action</th>
		                  
		                </tr>
		              </thead>
		              <tbody>


		              	<?php if($read_tran) { ?>
		              	<?php while($row = $read_tran->fetch_assoc()){ ?>
			                <tr>
			                  <td><?php echo $row['tran_id']; ?></td>
			                  <td><?php echo $row['amount']; ?></td>
			                  <td><?php echo $row['acc_id']; ?></td>
			                  <td><?php echo $row['customer_id']; ?></td>
			                  <td><?php echo $row['f_name']; ?></td>
			                  <td><?php echo $row['tran_type']; ?></td>
			                  <td><?php echo $row['date']; ?></td>
			                  <td><a href="update.php?id= <?php echo $row['acc_id']; ?>" >Edit</a></td>
			                </tr>
			            <?php } ?>    
		                <?php } else { ?>

		                <?php } ?>
		              </tbody>
		            </table>
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