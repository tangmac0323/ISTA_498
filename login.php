<?php

/*
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
*/

session_start();

require_once('./DatabaseAdaptor.php');



if($_POST){
	
    $username = $_POST ["username"];
    $password = $_POST ["password"];
	$logintype = $_POST ["logintype"];
	
	//debug_to_console($username);
	//debug_to_console($password);
	//debug_to_console($logintype);
					
	// Check the userID/PW combo
	if ($logintype == "customer") {

		$verify = $theDBA -> verifyCustomer ($username, $password);
		//$verify = $theDBA -> verifyCustomer ('a@hotmail.com', 'a');		
		if ($verify == true){
			$_SESSION['islogin'] = 1;
			$_SESSION['name'] = $username;
			echo 1;
		}else {
			$_SESSION['islogin'] = 0;
			echo 0;
		}

	}
	elseif ($logintype == "admin") {

		$verify = $theDBA -> verifyAdmin ($username, $password);
		if ($verify == true){
			$_SESSION['islogin'] = 2;
			$_SESSION['name'] = $username;			
			echo 2;
		}else {
			$_SESSION['islogin'] = 0;
			echo 0;
		}

	}else {
		echo 0;
	}
	exit;
}



?>