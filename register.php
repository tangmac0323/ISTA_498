<?php
session_start();
if($_POST){
	echo 2;
	
    $_SESSION['islogin'] = 1;
    $_SESSION['name'] = $_POST['name'];
    echo 1;
	exit;
}


?>