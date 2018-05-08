<?php

session_start();

require_once('./DatabaseAdaptor.php');

if($_POST){
	// check if the username already exists
	$username = $_POST ["username"];
    $password = $_POST ["password"];
	$userExist = $theDBA -> checkingCustomer($username);
	
	if ($userExist == true) {
		echo 0;
		exit;
	}
	
	// set the login status
    $_SESSION['islogin'] = 1;
	
	// set the session variable name
    $_SESSION['name'] = $_POST['username'];
	
	// add the user into database
	$theDBA -> addUser($username, $password);
	
	echo 1;
	
	exit;
}


?>