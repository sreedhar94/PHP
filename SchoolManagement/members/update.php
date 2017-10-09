<?php 

include_once '../core/init.php';

if (checkMemberUserLogin() === FALSE) {
	header('location: login.php');
}
$muserdata = getMemberUserDataByUserId($_SESSION['mid']);
$mid = $muserdata['mid'];
global $connect;

if ($_POST) {
	$mfirstname = $_POST['mfirstname'];
	$mlastname = $_POST['mlastname'];
	$mdob = $_POST['mdob'];
	if (isset($_POST['mgender'])) {
		$mgender = $_POST['mgender'];
	} //isset
	$memailid = $_POST['memailid'];
	$musername = $_POST['musername'];
	$mpassword = $_POST['mpassword'];
	$mcpassword = $_POST['mcpassword'];
	$mparentname = $_POST['mparentname'];
	$mparentcontact = $_POST['mparentcontact'];
	$mstudentcontact = $_POST['mstudentcontact'];
	$maddress = $_POST['maddress'];

	if ($mfirstname && $mlastname && $mdob && $memailid && $musername && $mpassword && $mcpassword && $mparentname && $mparentcontact && $mstudentcontact && $maddress) {

		if ($mpassword == $mcpassword) {
			if (memberUserExist($musername) === TRUE) {
				$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"> </span> "'. $_POST['musername'].'"</strong> is already exists in the database. Please enter different username.</div> ';
			} else {
				if (registerMemberUser() === TRUE) {
					if (insToSbj()) {}
					if (memberUserProfilePicture($musername) === TRUE) {
					 	$messages[] = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"> </span> </strong>Successfully created the account in database and Profile picture stored locally.</div>';
					} else {
						$messages[] = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"> </span> </strong>Successfully created the account in database.</div>';
					}
				} else {
					$messages[] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"> </span> </strong> Something went wrong while creating the account.</div> ';
				} //register
			} //exist
		} //password equal
	} //ands
} //$_post

$connect->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>School Management | Members Details Update</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Datatables css -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap-datepicker3.min.css"/>

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

		<div class="col-md-12">
			<h1 class="username">Welcome <?php echo $muserdata['mfirstname']." ".$muserdata['mlastname']; ?></h1>
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
						<label for="mfirstname" class="col-md-4">Firstname</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="mfirstname" name="mfirstname" placeholder="Firstname" value="<?php if($_SESSION) {
								echo $muserdata['mfirstname'];
							} ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="mlastname" class="col-md-4">Lastname</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="mlastname" name="mlastname" placeholder="Lastname" value="<?php if($_SESSION) {
								echo $muserdata['mlastname'];
							} ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="mdob" class="col-md-4">Date of Birth</label>
						<div class="col-md-8">
							<div class="input-group date" data-date-format="yyyy-mm-dd" data-provide="datepicker">
							    <input type="text" class="form-control" placeholder="Date of birth" value="<?php if($_SESSION) {
									echo $muserdata['mdob'];
								} ?>">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-calendar"></span>
							    </div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="mgender" class="col-md-4">Gender</label>
						<div class="col-md-8">
							<div class="btn-group" id="radiobtn" data-toggle="buttons">
								<div class="btn btn-default">
									<input type="radio" class="btn btn-default" name="mgender" id="mgender" value="male">Male
								</div>
								<div class="btn btn-default">
									<input type="radio" class="btn btn-default" name="mgender" id="mgender" value="female">Female
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="memailid" class="col-md-4">Email Id</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="memailid" name="memailid" placeholder="Email Id" value="<?php if($_SESSION) {
								echo $muserdata['memailid'];
							} ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="musername" class="col-md-4">Username</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="musername" name="musername" placeholder="Username" value="<?php if($_SESSION) {
								echo $muserdata['musername'];
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


		<div class="row">
			<form class="form-horizontal col-md-12" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="createStudentDetails">
				<h2>Sudents Registration Form</h2>
				<div class="messages">
					<?php if (!empty($messages)) {?>					
					<?php foreach ($messages as $key => $value) {
						echo $value;
					} ?>					
					<?php } ?>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="mfirstname" class="col-md-4">Firstname</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="mfirstname" name="mfirstname" placeholder="Firstname">
						</div>
					</div>
					<div class="form-group">
						<label for="mlastname" class="col-md-4">Lastname</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="mlastname" name="mlastname" placeholder="Lastname">
						</div>
					</div>
					<div class="form-group">
						<label for="mdob" class="col-md-4">Date of Birth</label>
						<div class="col-md-8">
							<div class="input-group date" data-date-format="yyyy-mm-dd" data-provide="datepicker">
							    <input type="text" class="form-control" placeholder="Date of birth">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-calendar"></span>
							    </div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="mgender" class="col-md-4">Gender</label>
						<div class="col-md-8">
							<div class="btn-group" id="radiobtn" data-toggle="buttons">
								<div class="btn btn-default">
									<input type="radio" class="btn btn-default" name="mgender" id="mgender" value="male">Male
								</div>
								<div class="btn btn-default">
									<input type="radio" class="btn btn-default" name="mgender" id="mgender" value="female">Female
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="musername" class="col-md-4">Username</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="musername" name="musername" placeholder="Username">
						</div>
					</div>
					<div class="form-group">
						<label for="mpassword" class="col-md-4">Password</label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="mpassword" name="mpassword" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<label for="mcpassword" class="col-md-4">Confirm Password</label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="mcpassword" name="mcpassword" placeholder="Confirm Password">
						</div>
					</div>				
					<div class="form-group">
						<label for="mparentname" class="col-md-4">Parent Name</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="mparentname" name="mparentname" placeholder="Parent Name">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="mparentcontact" class="col-md-4">Parent Contact</label>
						<div class="col-md-8">
							<input type="number" class="form-control" id="mparentcontact" name="mparentcontact" placeholder="Parent Contact">
						</div>
					</div>
					<div class="form-group">
						<label for="mstudentcontact" class="col-md-4">Student Contact</label>
						<div class="col-md-8">
							<input type="number" class="form-control" id="mstudentcontact" name="mstudentcontact" placeholder="Student Contact">
						</div>
					</div>
					<div class="form-group">
						<label for="maddress" class="col-md-4">Address</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="maddress" name="maddress" placeholder="Address">
						</div>
					</div>
					<div class="form-group">
						<label for="mprofilepicture" class="col-md-4">Profile Picture</label>
						<div class="col-md-8">
							<div class="input-group image-preview">
								<input type="text" class="form-control image-preview-filename" name="mdp" placeholder="Profile Picture">
								<span class="input-group-btn">
									<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
										<span class="glyphicon glyphicon-remove"></span> Clear
									</button>
									<div class="btn btn-default image-preview-input">
										<span class="glyphicon glyphicon-folder-open"></span>
										<span class="image-preview-input-title"> Choose File</span>
										<input type="file" accept="image/png, image/jpeg, image/jpg, image/gif" id="mprofilepicture" name="mprofilepicture"/>
									</div>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-6" id="profile-picture-preview"></div>
					</div>
					<div class="form-group">
						<div class="col-md-12 sbmtBtn">
							<button type="submit" name="submit" class="btn btn-primary stdRegSubBtn"><span class="glyphicon glyphicon-registration-mark"></span> Create Account</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../custom/js/index.js" ></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="../assets/jquery/jquery.form.min.js"></script>
	<script type="text/javascript" src="members.js" ></script>

</body>
</html>