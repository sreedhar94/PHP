<?php 
require_once '../core/init.php';
global $connect;

if ($_POST) {
	$aname = $_POST['aname'];
	$aemail = $_POST['aemail'];
	$ausername = $_POST['ausername'];
	$aactivationcode = $_POST['aactivationcode'];
	$apassword = $_POST['apassword'];
	$acpassword = $_POST['acpassword'];

	if ($aname && $aemail && $ausername && $aactivationcode && $apassword && $acpassword) {
		if ($apassword == $acpassword) {
			if (adminUserExist($ausername) === TRUE) {
				$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"> </span> "'. $_POST['ausername'].'"</strong> is already exists in the database. Please enter different username.</div> ';
			} else {
				if (registerAdminUser() === TRUE) {
					$messages[] = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"> </span> </strong>Successfully created the account in database.</div>';
				} else {
					$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"> </span> </strong> Something went wrong while creating the account.</div> ';
				}
			}
		}		
	}
}
$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>School Management | Admin Registration</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Datatables css -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">

</head>
<body>
	<?php include_once '../navigation_bar.php'; ?>

	<div class="container">
		<div class="row">
			<form class="form-horizontal col-md-6 col-md-offset-3" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="createAdminUser">
				<h2>Admin User Registration Form</h2>
				<div class="messages">
					<?php if (!empty($messages)) {?>					
					<?php foreach ($messages as $key => $value) {
						echo $value;
					} ?>					
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="aname" class="col-md-4">Name</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="aname" name="aname" placeholder="Name">
					</div>
				</div>
				<div class="form-group">
					<label for="aactivation" class="col-md-4">Activation Code</label>
					<div class="col-md-8">
						<input type="password" class="form-control" id="aactivationcode" name="aactivationcode" placeholder="Activation Code">
					</div>
				</div>
				<div class="form-group">
					<label for="aemail" class="col-md-4">Email</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="aemail" name="aemail" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="ausername" class="col-md-4">Username</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="ausername" name="ausername" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label for="apassword" class="col-md-4">Password</label>
					<div class="col-md-8">
						<input type="password" class="form-control" id="apassword" name="apassword" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label for="acpassword" class="col-md-4">Confirm Password</label>
					<div class="col-md-8">
						<input type="password" class="form-control" id="acpassword" name="acpassword" placeholder="Confirm Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-4 col-md-8">
						<button type="submit" name="submit" class="btn btn-primary adminUsrRegSubBtn"><span class="glyphicon glyphicon-registration-mark"></span> Create Account</button>
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