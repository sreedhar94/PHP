<?php 

include_once '../core/init.php';

if (checkAdminUserNotLogin() === TRUE) {
	header('location: login.php');
}
$auserdata = getAdminUserDataByUserId($_SESSION['aid']);
if ($_GET) {
	$mid = $_GET['mid'];
	global $memberDetails;
	$sql = "SELECT * FROM members WHERE mid = '$mid'";
	$query = $connect->query($sql);
	$memberDetails = $query->fetch_assoc();
	$musername = $memberDetails['musername'];
	global $sub_subjects;
	$sub_sql = "SELECT * FROM subjects WHERE musername = '$musername'";
	$sub_query = $connect->query($sub_sql);
	$sub_subjects = $sub_query->fetch_assoc();

} else {
	header('location: dashboard.php');
}

$connect->close();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Member Details</title>
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span>  <?php echo $auserdata['ausername']; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Update Details</a></li>
									<li><a href="#">Change Password</a></li>
								</ul>
							</li>
							<li><a href="logout.php"> <span class="glyphicon glyphicon-off"></span>  Logout</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>

	<?php
	if ($_GET) {
		if ($memberDetails) { ?>
		<div class="container">
			<div class="row">
				<h2 class="btn-primary btn-lg btn-block">Member Full Details</h2>
				<div class="col-md-3" align="center">
					<?php
					$dir = "../profilepictures/".$memberDetails['musername']."/images";
					if (is_dir($dir)) {
						$file = 0;
						$handle = opendir($dir);
						$open = opendir($dir);
						while (($file = readdir($open))!= FALSE) {
							if ( $file!="." && $file!=".." && $file!="Thumbs.db" ) {
								echo "<img class='profPic dashboadPic' src='$dir/$file'/>";
							}
						}
					}
					?>
					<ul class="list-group">
						<li class="list-group-item active">Subscribed subjects</li>
						<?php if($sub_subjects['sjava'] == 1) { ?>
						<li class="list-group-item">
							<?php echo "JAVA"; } ?>				  		
						</li>
						<?php if($sub_subjects['sphp'] == 1) { ?>
						<li class="list-group-item">
							<?php echo "PHP"; } ?>				  		
						</li>
						<?php if($sub_subjects['sangularjs'] == 1) { ?>
						<li class="list-group-item">
							<?php echo "Angular JS"; } ?>				  		
						</li>
					</ul>
				</div>
				<div class="col-md-offset-1 col-md-6">
					<h3 class="person_name"><?php echo $memberDetails['mfirstname']." ".$memberDetails['mlastname'];?></h3>
					<table class="table table-user-information">
						<!-- <tr>
							<td class="col-md-3">First Name</td>
							<td class="col-md-3"><?php echo $memberDetails['mfirstname'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Last Name</td>
							<td class="col-md-3"><?php echo $memberDetails['mlastname'];?></td>
						</tr> -->
						<tr>
							<td class="col-md-3">Date of Birth</td>
							<td class="col-md-3"><?php echo $memberDetails['mdob'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Gender</td>
							<td class="col-md-3"><?php echo $memberDetails['mgender'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Email id</td>
							<td class="col-md-3"><a href="mailto:<?php echo $memberDetails['memailid'];?>"><?php echo $memberDetails['memailid'];?></a></td>
						</tr>
						<tr>
							<td class="col-md-3">Username</td>
							<td class="col-md-3"><?php echo $memberDetails['musername'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Parent Name</td>
							<td class="col-md-3"><?php echo $memberDetails['mparentname'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Parent Contact</td>
							<td class="col-md-3"><?php echo $memberDetails['mparentcontact'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Student Contact</td>
							<td class="col-md-3"><?php echo $memberDetails['mstudentcontact'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Address</td>
							<td class="col-md-3"><?php echo $memberDetails['maddress'];?></td>
						</tr>
						<tr>
							<td class="col-md-3">Active</td>
							<td class="col-md-3"><?php echo $memberDetails['mactive'];?></td>
						</tr>
						<tr>
							<td>
								<button type="submit" name="submit" class="btn btn-primary member_details_back_button" onclick="history.back()"><span class="glyphicon glyphicon-chevron-left"></span> Go back!</button>
							</td>
							<td></td>
						</tr>
					</table>
				</div>						
			</div>
		</div>
		<?php }
	}
	?>

	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../custom/js/index.js" ></script>
	<script type="text/javascript" src="../assets/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="adminuser.js"></script>
</body>
</html>