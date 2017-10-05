<?php 
// include_once('fns.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Functions</title>
</head>
<body>
	<button class="btn btn-default" id="btn1" onclick="myAjax()">Button1</button>
	<button class="btn btn-default" id="btn2">Button2</button>
	<button class="btn btn-default" id="btn3">Button3</button>
	<script type="text/javascript">
		
			function myAjax() {
				$.ajax({
					type: 'POST',
					url: 'fns.php',
					data:{
						action:'call_this'
					},
					success: function(data) {
	                    // document.write(data);
	                    // return true;
	                    // $("p").text(data);
                	}
				});
			}
		
	</script>
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