<?php 

require_once '../core/init.php';
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
	<title>School Management | Admin Registration</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Datatables css -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../custom/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap-datepicker3.min.css"/>

</head>
<body>
	<?php include_once '../navigation_bar.php'; ?>

	<div class="container">
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
						<!-- <div class="col-md-8 inner-addon right-addon">
							<input type="text" class="form-control" id="mdob" name="mdob" placeholder="Date of Birth" value="">
							<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
						</div> -->
						<div class='input-group date' id='datetimepicker1'>
		                    <input type='text' class="form-control" />
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
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
							<input type="text" class="form-control" id="memailid" name="memailid" placeholder="Email Id">
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

	<!-- jQuery plugin -->
	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="../custom/js/index.js" ></script>

	<!-- <script type="text/javascript" src="https://github.com/uxsolutions/bootstrap-datepicker.git"></script> -->

	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="../assets/jquery/jquery.form.min.js"></script>

</body>
</html>