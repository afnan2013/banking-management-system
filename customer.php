<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: Login.php");
}

require "db_connect.php";

$query = "SELECT * from customer";
$read = select($con, $query);

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                    <li class="current"><a href="customer.php"><i class="glyphicon glyphicon-calendar"></i> Customers</a></li>
                    <li><a href="account.php"><i class="glyphicon glyphicon-stats"></i> Accounts</a><li>
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

		  
		  <div class="col-sm-9">
		  		<div class="content-box-large">


		  			<div class="row">
		  				<div class="col-sm-2">
		  					<a href="add_customer.php"><button class="btn btn-success" type="button">Add Customer</button></a>
		  				</div>
		  			</div>



		  				<div class="panel-heading">
							<div class="panel-title text-center"><p>Customers Information</p></div>
							
							<!--<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>-->
						</div>
						<div class="row">
  				<div class="col-sm-3">
  					<div class="form-group">
						<label>Customer ID</label><br>
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
							<label>Customer Name</label><br>
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
						<label>Joining Date</label>
						<input class="form-control" name="date" placeholder="date" type="date" required>
					</div>
  				</div>
  			</div>
		  				<div class="panel-body">
		  					<table class="table table-hover" style=" font-size: 15px;">
				              <thead>
				                <tr>
				                  <th>Customer Id</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Username</th>
				                  <th>Address</th>
				                  <th>Email</th>
				                  <th>Phone</th>
				                  <th>Date</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>


				              	<?php if($read) { ?>
				              	<?php while($row = $read->fetch_assoc()){ ?>
					                <tr>
					                  <td><?php echo $row['customer_id']; ?></td>
					                  <td><?php echo $row['f_name']; ?></td>
					                  <td><?php echo $row['l_name']; ?></td>
					                  <td><?php echo $row['username']; ?></td>
					                  <td><?php echo $row['address']; ?></td>
					                  <td><?php echo $row['email_id']; ?></td>
					                  <td><?php echo $row['phone']; ?></td>
					                  <td><?php echo $row['date']; ?></td>
					                  <td><a href="update.php?id= <?php echo $row['customer_id']; ?>" >Edit</a></td>
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