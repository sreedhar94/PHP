<?php

// Admin
// password encryption for admin user
function asalt($length) {
	return mcrypt_create_iv($length);
}
function makeAPassword($apassword, $asalt) {
	return hash('sha256', $apassword.$asalt);
}
// check admin user in the database
function adminUserExist($ausername) {
	global $connect;
	$ausername = $_POST['ausername'];
	$sql = "SELECT * FROM admin WHERE ausername = '$ausername'";
	$query = $connect -> query($sql);
	if ($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}
	$connect->close();
}
// admin user registration
function registerAdminUser() {
	global $connect;
	$aname = $_POST['aname'];
	$aactivationcode = $_POST['aactivationcode'];
	$aemail = $_POST['aemail'];
	$ausername = $_POST['ausername'];
	$apassword = $_POST['apassword'];
	$asalt = asalt(32);
	$anewPassword = makeAPassword($apassword, $asalt);
	if ($anewPassword) {
		$sql = "INSERT INTO admin (aname, aactivationcode, aemail, ausername, apassword, asalt, aactive) VALUES ('$aname', '$aactivationcode', '$aemail', '$ausername', '$anewPassword', '$asalt', '1')";
		$query = $connect -> query($sql);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	}
	$connect->close();
}
// admin userdata
function auserdata($ausername) {
	global $connect;
	$sql = "SELECT * FROM admin WHERE ausername = '$ausername'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if ($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}
	$connect->close();
}
// admin user login
function adminUserLogin($ausername, $apassword) {
	global $connect;
	$auserdata = auserdata($ausername);
	if ($auserdata) {
		$anewPassword = makeAPassword($apassword, $auserdata['asalt']);
		if ($anewPassword) {
			$sql = "SELECT * FROM admin WHERE ausername = '$ausername' AND apassword = '$anewPassword'";
			$query = $connect->query($sql);
			if (($query->num_rows) == 1) {
				return true;
			} else {
				return false;
			}
		}
	}
	$connect->close();
}
// get admin details by id
function getAdminUserDataByUserId($aid) {
	global $connect;
	$sql = "SELECT * FROM admin WHERE aid = '$aid'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;
	
	$connect->close();
}
// check admin user login
function checkAdminUserLogin() {
	if (isset($_SESSION['aid'])) {
		return true;
	} else {
		return false;
	}
}
// check admin user not login
function checkAdminUserNotLogin() {
	if (isset($_SESSION['aid']) === FALSE) {
		return true;
	} else {
		return false;
	}
}
// admin user logout
function checkAdminUserlogout() {
	if (checkAdminUserLogin() === TRUE) {
		//remove all session variables
		session_unset();
		//destroy the session
		session_destroy();
		header('location: login.php');
	}
}
// check admin user password
function checkpassword($aid) {
	global $connect;
	$aid = $_SESSION['aid'];
	$ausername = $_POST['ausername'];
	$acrpassword = $_POST['acrpassword'];
	$auserdata = auserdata($ausername);
	$anewPassword = makeAPassword($acrpassword, $auserdata['asalt']);
	if ($anewPassword) {
		$sql = "SELECT * FROM admin WHERE ausername = '$ausername' AND apassword = '$anewPassword'";
		$query = $connect->query($sql);
		if (($query->num_rows) == 1) {
			return true;
		} else {
			return false;
		}
	}
	$connect->close();
}
// update admin details
function updateadmin($aid) {
	global $connect;
	$aname = $_POST['aname'];
	$aemail = $_POST['aemail'];
	$ausername = $_POST['ausername'];
	$acrpassword = $_POST['acrpassword'];
	$anpassword = $_POST['anpassword'];
	$auserdata = auserdata($ausername);
	$aid = $_SESSION['aid'];
	$attach = "";
	if (!empty($anpassword)) {
		$anewPassword = makeAPassword($anpassword, $auserdata['asalt']);
		$attach = ", apassword = '".$anewPassword."'";
	}
	$sql = "UPDATE admin SET aname = '$aname', aemail = '$aemail', ausername = '$ausername'".$attach." WHERE aid = '$aid'";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
	$connect->close();
}
// /Admin

// ===================================================================================================================================

// Members

// check member user in the database
function memberUserExist($musername) {
	global $connect;
	$musername = $_POST['musername'];
	$sql = "SELECT * FROM members WHERE musername = '$musername'";
	$query = $connect->query($sql);

	if ($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}
// member user registration
function registerMemberUser() {
	global $connect;

	$mfirstname = $_POST['mfirstname'];
	$mlastname = $_POST['mlastname'];
	$mdob = $_POST['mdob'];
	if (isset($_POST['mgender'])) {
		$mgender = $_POST['mgender'];
	}
	$memailid = $_POST['memailid'];
	$musername = $_POST['musername'];
	$mpassword = $_POST['mpassword'];
	$mcpassword = $_POST['mcpassword'];
	$mparentname = $_POST['mparentname'];
	$mparentcontact = $_POST['mparentcontact'];
	$mstudentcontact = $_POST['mstudentcontact'];
	$maddress = $_POST['maddress'];
	$msalt = msalt(32);
	$mnewPassword = makeMPassword($mpassword, $msalt);

	if ($mnewPassword) {
		$sql = "INSERT INTO members (mfirstname, mlastname, mdob, mgender, memailid, musername, mpassword, mparentname, mparentcontact, mstudentcontact, maddress, msalt, mactive) VALUES ('$mfirstname', '$mlastname', '$mdob', '$mgender', '$memailid', '$musername', '$mnewPassword', '$mparentname', '$mparentcontact', '$mstudentcontact', '$maddress', '$msalt', '1')";
		$query = $connect->query($sql);

		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	}
	$connect->close();
}
// password encryption for member user
function msalt($length) {
	return mcrypt_create_iv($length);
}
function makeMPassword($mpassword, $msalt) {
	return hash('sha256', $mpassword.$msalt);
}
// member user file upload or member user profile picture
function memberUserProfilePicture($musername) {
	$mypic = $_FILES['mprofilepicture']['name'];
	$file_temp = $_FILES['mprofilepicture']['tmp_name'];
	$file_type = $_FILES['mprofilepicture']['type'];
	$musername = $_POST['musername'];

	$allowed_ext = array("jpeg", "jpg", "png");
	$ext = end(explode('.', $_FILES["mprofilepicture"]["name"]));

	if (in_array($ext, $allowed_ext)) {
		$directory = "../profilepictures/$musername/images/";
		mkdir($directory, 0777, true);
		$filename = $musername.'.'.$ext;
		$fileMoved = move_uploaded_file($file_temp, "../profilepictures/$musername/images/$filename");
		// echo "<img src=\"profilepictures/$musername/images/$mfilename\" border=\"1\" width=\"100\" height=\"100\" /> <br/>";
		if($fileMoved === TRUE) {
			return true;
		} else {
			return false;
		}
	}
}
// members userdata
function muserdata($musername) {
	global $connect;
	$sql = "SELECT * FROM members WHERE musername = '$musername'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if ($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}
	$connect->close();
}
// member user login
function memberUserLogin($musername, $mpassword) {
	global $connect;
	$muserdata = muserdata($musername);
	if ($muserdata) {
		$mnewPassword = makeMPassword($mpassword, $muserdata['msalt']);
		if ($mnewPassword) {
			$sql = "SELECT * FROM members WHERE musername = '$musername' AND mpassword = '$mnewPassword'";
			$query = $connect->query($sql);
			if (($query->num_rows) == 1) {
				return true;
			} else {
				return false;
			}
		}
	}
	$connect->close();
}
// get member details by id
function getMemberUserDataByUserId($mid) {
	global $connect;
	$sql = "SELECT * FROM members WHERE mid = '$mid' ";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;
	$connect->close();
}
// check member user login
function checkMemberUserLogin() {
	if (isset($_SESSION['mid'])) {
		return true;
	} else {
		return false;
	}

}
// check admin user logout
function checkMemberUserLogout() {
	if (checkMemberUserLogin() === TRUE) {
		//remove all session variables
		session_unset();
		//destroy the session
		session_destroy();
		header('location: login.php');
	}
}
// display members details in admin user
function memberUserDetailsInAdminDashboard() {
	global $connect;
	global $row;
	$sql = "SELECT mid, mfirstname, mlastname, musername, mstudentcontact, mactive FROM members";
	$query = $connect->query($sql);
	$row = $query->fetch_assoc();
	
	if ($row) {
		return true;
	} else {
		return false;
	}
	$connect->close();
}
// /Members

// Subjects
function insToSbj() {
	global $connect;
	$musername = $_POST['musername'];
	$sql = "INSERT INTO subjects (musername) VALUES ('$musername')";
	$query = $connect->query($sql);
	if ($query === TRUE) {
		return true;
	} else {
		return false;
	}
	$connect->close();
}
$functionName = filter_input(INPUT_GET, 'functionName');

if ($functionName == "javaReg") {
    javaReg();
} else if ($functionName == "phpReg") {
    phpReg();
} else if ($functionName == "angReg") {
    angReg();
}
function check_reg() {
	global $connect;
	$sub_res = array();
    $mid = $_SESSION['mid'];
    $sql = "SELECT * FROM subjects WHERE mid='$mid'";
    $query = $connect->query($sql);
    $sub_res = $query->fetch_assoc();
    if ($sub_res) {
    	return $sub_res;
    }  
}
function javaReg() {
	global $connect;
    $mid = $_SESSION['mid'];
    $sub_res = check_reg();
    if ($sub_res['sjava'] == 0) {
    	$sql = "UPDATE subjects SET sjava='1' WHERE mid='$mid'";
    	$query = $connect->query($sql);
		if ($query === TRUE) {
	    	echo "Successfully registered!";
		} else {
	    	echo "Error while registering the subject!";
		}
    } else {
    	$sql = "UPDATE subjects SET sjava='0' WHERE mid='$mid'";
    	$query = $connect->query($sql);
		if ($query === TRUE) {
	    	echo "Successfully un-registered!";
		} else {
	    	echo "Error while un-registering the subject!";
		}
    }
    $connect->close();
}
function phpReg() {
	global $connect;
    $mid = $_SESSION['mid'];
    $sub_res = check_reg();
    if ($sub_res['sphp'] == 0) {
    	$sql = "UPDATE subjects SET sphp='1' WHERE mid='$mid'";
    	$query = $connect->query($sql);
		if ($query === TRUE) {
	    	echo "Successfully registered!";
		} else {
	    	echo "Error while registering the subject!";
		}
    } else {
    	$sql = "UPDATE subjects SET sphp='0' WHERE mid='$mid'";
    	$query = $connect->query($sql);
		if ($query === TRUE) {
	    	echo "Successfully un-registered!";
		} else {
	    	echo "Error while un-registering the subject!";
		}
    }
    $connect->close();
}
function angReg() {
	global $connect;
    $mid = $_SESSION['mid'];
    $sub_res = check_reg();
    if ($sub_res['sangularjs'] == 0) {
    	$sql = "UPDATE subjects SET sangularjs='1' WHERE mid='$mid'";
    	$query = $connect->query($sql);
		if ($query === TRUE) {
	    	echo "Successfully registered!";
		} else {
	    	echo "Error while registering the subject!";
		}
    } else {
    	$sql = "UPDATE subjects SET sangularjs='0' WHERE mid='$mid'";
    	$query = $connect->query($sql);
		if ($query === TRUE) {
	    	echo "Successfully un-registered!";
		} else {
	    	echo "Error while un-registering the subject!";
		}
    }
    $connect->close();
}
// /Subjects
function subscribe_button_check() {
	global $connect;
    $mid = $_SESSION['mid'];
    $sub_res = check_reg();
    if ($sub_res['sjava'] == 0) {
    	echo '<script type="text/javascript">$("#java_unreg").hide();</script>';
    	echo '<script type="text/javascript">$("#java_reg").show();</script>';
    } else {
    	echo '<script type="text/javascript">$("#java_reg").hide();</script>';
    	echo '<script type="text/javascript">$("#java_unreg").show();</script>';
    }
    if ($sub_res['sphp'] == 0) {
    	echo '<script type="text/javascript">$("#php_unreg").hide();</script>';
    	echo '<script type="text/javascript">$("#php_reg").show();</script>';
    } else {
    	echo '<script type="text/javascript">$("#php_reg").hide();</script>';
    	echo '<script type="text/javascript">$("#php_unreg").show();</script>';
    }
    if ($sub_res['sangularjs'] == 0) {
    	echo '<script type="text/javascript">$("#ang_unreg").hide();</script>';
    	echo '<script type="text/javascript">$("#ang_reg").show();</script>';
    } else {
    	echo '<script type="text/javascript">$("#ang_reg").hide();</script>';
    	echo '<script type="text/javascript">$("#ang_unreg").show();</script>';
    }
    $connect->close();
}
// content
function sub_content() {
	global $connect;
	global $subject;
	$sql = "SELECT * FROM content WHERE sub_name='$subject'";
	$query = $connect->query($sql);
	$result = mysqli_fetch_array($query);
	return $result;

	$connect->close();
}

?>