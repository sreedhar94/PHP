<?php

include_once '../core/init.php';

if (checkAdminUserNotLogin() === TRUE) {
	header('location: login.php');
}

$auserdata = getAdminUserDataByUserId($_SESSION['aid']);
global $connect;
if ($_POST) {
	$aid = $_SESSION['aid'];
	$aname = $_POST['aname'];
	$aemail = $_POST['aemail'];
	$ausername = $_POST['ausername'];
	$acrpassword = $_POST['acrpassword'];
	$anpassword = $_POST['anpassword'];
	$acpassword = $_POST['acpassword'];

	if ($aname && $aemail && $ausername && $acrpassword) {
		if (checkpassword($aid) === TRUE) {
			if (updateadmin($aid) === TRUE) {
				$messages[] = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"> </span> </strong>Successfully updated the details in database. Please refresh the page for updated results.</div>';
			} else {
				$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"> </span> </strong> Something went wrong while updating the details.</div> ';
			}
		} else {
			$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"> </span> </strong> Please enter valid password to update the details.</div> ';
		}
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>School Management | Admin Update</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Datatables css -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span>  <?php echo $auserdata['ausername']; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Update Details</a></li>
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
		<div class="col-md-12">
			<h1 class="username">Welcome <?php echo $auserdata['aname']; ?></h1>
			<br><br>
			<form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="updateadminuser">
				<div class="messages">
					<?php if (!empty($messages)) {?>					
					<?php foreach ($messages as $key => $value) {
						echo $value;
					} ?>					
					<?php } ?>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="aname" class="col-md-4">Name</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="aname" name="aname" placeholder="Name" value="<?php if($_SESSION) {
								echo $auserdata['aname'];
							} ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="aemail" class="col-md-4">Email</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="aemail" name="aemail" placeholder="Email" value="<?php if($_SESSION) {
								echo $auserdata['aemail'];
							} ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="ausername" class="col-md-4">Username</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="ausername" name="ausername" placeholder="Username" value="<?php if($_SESSION) {
								echo $auserdata['ausername'];
							} ?>">
						</div>
					</div>
				</div>
					<div class="col-md-6">
						<div class="form-group">
						<label for="acrpassword" class="col-md-4">Current Password</label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="acrpassword" name="acrpassword" placeholder="Current Password">
						</div>
					</div>
					<div class="form-group">
						<label for="anpassword" class="col-md-4">New Password</label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="anpassword" name="anpassword" placeholder="New Password">
						</div>
					</div>
					<div class="form-group">
						<label for="acpassword" class="col-md-4">Confirm Password</label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="acpassword" name="acpassword" placeholder="Confirm Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<button type="submit" name="submit" class="btn btn-primary updatebutton"><span class="glyphicon glyphicon-refresh"></span> Update Records</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../custom/js/index.js" ></script>
	<script type="text/javascript" src="../assets/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="adminuser.js"></script>

</body>
</html>