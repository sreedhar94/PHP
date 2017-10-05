<?php 
  
  if($_POST['action'] == 'call_this') {
  // call removeday() here
  	echo "You win";
	
	
	 $attach = "";
            if(!empty($password)) {
              $attach = ", password='".$password."'";
            }
            
            $sql = "update users set username='".$username."', firstname='".$firstname."', lastname='".$lastname."', email='".$email."'".$attach." where email='".$email."'"; 
}
 ?>

