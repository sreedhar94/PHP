<?php

include_once '../core/init.php';

if (checkAdminUserNotLogin() === TRUE) {
	header('location: login.php');
}

$auserdata = getAdminUserDataByUserId($_SESSION['aid']);
global $connect;
global $x;
global $row;
$sql = "SELECT * FROM members";
$query = $connect->query($sql);
$x=1;
$mactive = '';

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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span>  <?php echo $auserdata['ausername']; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="update.php">Update Details</a></li>
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

	<div class="container">
		<div class="row">
			<h1 class="username">Welcome <?php echo $auserdata['aname']; ?></h1>
			<br><br>
			<table class="table table-hover table-bordered" id="membersData">
		        <thead>
		            <tr>
		                <!-- <th>S.NO</th> -->
		                <th>S.No</th>
		                <th>Id</th>
		                <th>First Name</th>
		                <th>Last Name</th>
		                <th>Username</th>
		                <th>Student Contact</th>
		                <th>Active</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        <?php 
		        while ($row = mysqli_fetch_array($query)) {
		        	if ($row['mactive'] == 1) {
						$mactive = '<label class="label label-success">Active</label>';
					} else {
						$mactive = '<label class="label label-danger">Deactive</label>';
					}
					$mactionButton = '<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Action <span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
									    	<li><a type="button" href="memberDetails.php?mid='.$row['mid'].'"><span class="glyphicon glyphicon-edit"></span> Full Details </a></li>
										    <li><a type="button" onclick="editMember('.$row['mid'].')" ><span class="glyphicon glyphicon-edit"></span> Edit </a></li>
										    <li><a type="button" onclick="removeMember('.$row['mid'].')" ><span class="glyphicon glyphicon-trash"></span> Delete </a></li>
										</ul>
									</div>';
		        	echo '<tr>
			                <td>'.$x.'</td>
			                <td>'.$row['mid'].'</td>
			                <td>'.$row['mfirstname'].'</td>
			                <td>'.$row['mlastname'].'</td>
			                <td>'.$row['musername'].'</td>
			                <td>'.$row['mstudentcontact'].'</td>
			                <td>'.$mactive.'</td>
			                <td>'.$mactionButton.'</td>
			            </tr>';
		        	$x++;
		        }
		        ?>
		        </tbody>
		    </table>
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
	<script type="text/javascript" src="../assets/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="index.js"></script>

	
</body>
</html>
