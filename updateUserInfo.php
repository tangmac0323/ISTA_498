<?php

session_start();

require_once('./DatabaseAdaptor.php');

if($_POST){
	// check if the username already exists
	$username = $_POST ["username"];
	$fullname = $_POST ["fullname"];
	$address = $_POST ["address"];
	$email = $_POST ["email"];
	$telNo = $_POST ["telNo"];
	$stateName = $_POST ["stateName"];
	
	//$userExist = $theDBA -> checkingCustomer($username);
	
	/*
	if ($username == "a@hotmail.com") {
		echo 1;
		exit;
	}
	*/
	
	// set the login status
    //$_SESSION['islogin'] = 1;
	
	// set the session variable name
    //$_SESSION['name'] = $_POST['username'];
	
	// update the user info to database
	$theDBA -> updateUserInfo($username, $fullname, $email, $address, $telNo, $stateName);
	
	echo 1;
	
	exit;
}


?>