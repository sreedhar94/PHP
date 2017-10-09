<?php  

require_once '../core/init.php';
global $connect;

if (checkAdminUserLogin() === TRUE) {
	header('location: dashboard.php');
}

if ($_POST) {
	$ausername = $_POST['ausername'];
	$apassword = $_POST['apassword'];

	if ($ausername && $apassword) {
		if (adminUserExist($ausername)) {
			if (adminUserLogin($ausername, $apassword)) {
				$auserdata = auserdata($ausername);
				$_SESSION['aid'] = $auserdata['aid'];
				header('location: dashboard.php');
				exit();
			} else {
				$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-exclamation-sign"> </span> The combination is not matching, please login using valid username and password.</div> ';
			}
		} else {
			$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"> </span> '. $_POST['ausername'].'</strong> is not exists in the database. Please enter different valid username.</div> ';
		}
	}
}
$connect->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>School Management | Admin Login</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Datatables css -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap-datepicker3.min.css"/> -->
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
							<li><a href="#"> <span class="glyphicon glyphicon-user"></span>  Login</a></li>
							<li><a href="#"> <span class="glyphicon glyphicon-off"></span>  Logout</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-registration-mark"></span>  Sign Up <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="../admin/registration.php">Admin</a></li>
									<li><a href="../members/registration.php">Student</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<form class="form-horizontal col-md-6 col-md-offset-3" id="adminUserLogin" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<h2>Admin user Login</h2>
				<div class="messages">
					<?php if (!empty($messages)) {?>					
					<?php foreach ($messages as $key => $value) {
						echo $value;
					} ?>					
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="ausername" class="col-md-3">Username</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="ausername" name="ausername" placeholder="Username" value="<?php
						if ($_POST) {
							echo $_POST['ausername'];
						}?>">
					</div>
				</div>
				<div class="form-group">
					<label for="apassword" class="col-md-3">Password</label>
					<div class="col-md-9">
						<input type="password" class="form-control" id="apassword" name="apassword" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" name="submit" class="btn btn-primary admUsrLgn"><span class="glyphicon glyphicon-lock"> </span> Sign in</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- jQuery plugin -->
	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="../custom/js/index.js" ></script>
	<script type="text/javascript" src="adminuser.js"></script>

</body>
</html>