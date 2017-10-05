<?php

	$connect = mysqli_connect("localhost", "root", "", "sclmngmt");

	if (!$connect) {
		die("Connection failed");
	} else {
		// echo "Successfully connected.";
	}

?>