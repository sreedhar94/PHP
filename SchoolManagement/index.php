<?php 

include_once 'core/init.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>School Management | Home</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="custom/css/style.css">
</head>
<body>
	<?php require_once 'navigation_bar.php'; ?>
	<div class="container">
		<h3>Available courses</h3>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="assets/images/java.jpg" alt="java">
				<div class="caption">
					<h3>JAVA</h3>
					<p class="content">
						<?php 
						$subject = "java";
						$result = sub_content();
						echo $result['sub_description'];
						 ?>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="assets/images/php.jpg" alt="php"">
				<div class="caption">
					<h3>PHP</h3>
					<p class="content">
						<?php 
						$subject = "php";
						$result = sub_content();
						echo $result['sub_description'];
						 ?>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="assets/images/angularjs.jpg" alt="angular js">
				<div class="caption">
					<h3>Angular JS</h3>
					<p class="content">
						<?php 
						$subject = "AngularJS";
						$result = sub_content();
						echo $result['sub_description'];
						 ?>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery plugin -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js" ></script>

</body>
</html>