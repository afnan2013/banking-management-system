<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: Login.php");
}

require "db_connect.php";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/template.css" type="text/css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

		
	

	

	<div class="page-content" style="margin-top: 10px;">
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
                    <li class="current">
                    	<a href="dashboard.php">
                    		<i class="glyphicon glyphicon-home"></i> Dashboard
                    	</a>
                    </li>
                    <li><a href="customer.php"><i class="glyphicon glyphicon-calendar"></i> Customers</a></li>
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

		  <div class="col-sm-9">
		  	
		  </div>

		</div>
	</div>
	
	<div class="container">
		<p class="text-center text-success">Welcome <?php echo $_SESSION['email']; ?></p>
		
	</div>

</body>
</html>