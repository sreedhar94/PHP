<?php 
include_once '../core/init.php';
$mid = $_SESSION['mid'];
function javaReg($mid) {

	global $connect;
	$sql = "UPDATE subjects SET sjava='1' WHERE mid='$mid'";
	$query = $connect->query($sql);
	if ($query === TRUE) {
		echo "success";
		// return true;
	} else {
		echo "fail";
		// return false;
	}
}
javaReg($mid);

 ?>