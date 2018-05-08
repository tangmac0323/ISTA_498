<?php
    session_start();
	if (isset($_GET['mode'])){
		session_destroy();
		//$.cookie("num",null);
		
		header("Location: ./index.php"); /* Redirect browser */
		exit();

	}
?>