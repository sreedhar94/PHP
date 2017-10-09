<?php
include_once '../core/init.php';

if (checkMemberUserLogin() === FALSE) {
	header('location: login.php');
}
$muserdata = getMemberUserDataByUserId($_SESSION['mid']);
$mid = $muserdata['mid'];

$sub_res = check_reg();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"> -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> -->
</head>
<body>
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="../index.php"> <span class="glyphicon glyphicon-education"></span>  School Management</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
							<li><a href="#">Link</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span>  <?php echo $muserdata['musername']; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="update.php">Update Details</a></li>
								</ul>
							</li>
							<li><a href="logout.php"> <span class="glyphicon glyphicon-off"></span>  Logout</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h2 class="username">Welcome <?php echo $muserdata['mfirstname']; ?></h2>
			<h3>Available courses</h3>
		</div>
	</div>
	<div class="container subjects">
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="../assets/images/java.jpg" alt="java">
				<div class="caption">
					<h3>JAVA</h3>
					<p class="content">
						<?php 
						$subject = "java";
						$result = sub_content();
						echo $result['sub_description'];
						 ?>
					</p>
					<button class="btn btn-primary" data-target=".sub_reg" onclick="javaReg()" id="java_reg">Subscribe</button>
					<button class="btn btn-primary" data-target=".sub_reg" onclick="javaReg()" id="java_unreg">Un-Subscribe</button>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="../assets/images/php.jpg" alt="php">
				<div class="caption">
					<h3>PHP</h3>
					<p class="content">
						<?php 
						$subject = "php";
						$result = sub_content();
						echo $result['sub_description'];
						 ?>
					</p>
					<button class="btn btn-primary" data-target=".sub_reg" onclick="phpReg()" id="php_reg">Subscribe</button>
					<button class="btn btn-primary" data-target=".sub_reg" onclick="phpReg()" id="php_unreg">Un-Subscribe</button>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="../assets/images/angularjs.jpg" alt="angular js">
				<div class="caption">
					<h3>Angular JS</h3>
					<p class="content">
						<?php 
						$subject = "AngularJS";
						$result = sub_content();
						echo $result['sub_description'];
						 ?>
					</p>
					<button class="btn btn-primary" data-target=".sub_reg" onclick="angReg()" id="ang_reg">Subscribe</button>
					<button class="btn btn-primary" data-target=".sub_reg" onclick="angReg()" id="ang_unreg">Un-Subscribe</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade reg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="close_register">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Registration</h4>
				</div>
				<div class="modal-body">
					<p></p>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="../custom/js/index.js" ></script>
	<script type="text/javascript" src="members.js" ></script>

	<?php 

	subscribe_button_check();

	?>
</body>
</html>