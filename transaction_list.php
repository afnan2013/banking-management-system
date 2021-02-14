<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: Login.php");
}

?>

<?php

require 'db_connect.php';

$sql_tran = "SELECT t.tran_id,t.amount, a.acc_id, c.customer_id, c.f_name, t.tran_type,t.date,t.mode
				FROM (account_balance as a 
				       NATURAL JOIN transaction as t)
				      	join customer as c 
				        	on a.customer_id = c.customer_id
				            ORDER BY t.tran_id";

$read = mysqli_query($con, $sql_tran);
$read_acc = mysqli_query($con, $sql_tran);
$read_name = mysqli_query($con, $sql_tran);



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
		<div class="content-box-large">

			<div class="row">
  				<div class="col-sm-3">
  					<div class="form-group">
						<label>Account ID</label><br>
						<select name="acc_id" class="form-control" required>
							<option value="No Options Selected">Choose Option Below</option>

							<?php if($read_acc){ ?>
							<?php while($row = $read_acc->fetch_assoc()) {?>

								<option value="<?php echo $row['acc_id']; ?>"><?php echo $row['acc_id']." - ".$row['f_name']; ?></option>

							<?php } } ?>	
						</select>
								
					</div>
  				</div>
  				<div class="col-sm-3">
	  				<div class="form-group">
							<label>Acccount Holder Name</label><br>
							<select name="select_name" class="form-control" required>
								<option value="No Options Selected">Choose Option Below</option>

								<?php if($read_name){ ?>
								<?php while($row1 = $read_name->fetch_assoc()) {?>

									<option value="<?php echo $row1['acc_id']; ?>"><?php echo $row1['acc_id']." - ".$row1['f_name']; ?></option>

								<?php } } ?>	
							</select>
									
					</div>
				</div>

  				<div class="col-sm-3">
  					<div class="form-group">
						<label>Transaction Date</label>
						<input class="form-control" name="date" placeholder="date" type="date" required>
					</div>
  				</div>
  			</div>
  				

				<div class="panel-heading">
					<div class="panel-title text-center"><h2>Transaction List</h2></div>
				</div>

				<div class="row">
					<!--<div class="col-sm-4">
						<div class="form-group">
										<select class="form-control" placeholder = "Customer Name" id="Customer Id">
											<option>Amsterdam</option>
											
										</select> 

									</div>
								
					</div>
					<div class="col-sm-4">
						
					</div>
					<div class="col-sm-4">
						
					</div>-->
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
		                  <th>Mode</th>
		                  <th>Action</th>
		                  
		                </tr>
		              </thead>
		              <tbody>


		              	<?php if($read) { ?>
		              	<?php while($row = $read->fetch_assoc()){ ?>
			                <tr>
			                  <td><?php echo $row['tran_id']; ?></td>
			                  <td><?php echo $row['amount']; ?></td>
			                  <td><?php echo $row['acc_id']; ?></td>
			                  <td><?php echo $row['customer_id']; ?></td>
			                  <td><?php echo $row['f_name']; ?></td>
			                  <td><?php echo $row['tran_type']; ?></td>
			                  <td><?php echo $row['date']; ?></td>
			                  <td><?php echo $row['mode']; ?></td>
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

	<div class="container-fluid">
		<p class="text-center text-success">Welcome <?php echo $_SESSION['email']; ?></p>
		
	</div>

</body>
</html>