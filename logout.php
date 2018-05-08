<?php
    session_start();
	if (isset($_GET['mode'])){
		session_destroy();
		
		header("Location: ./index.php"); /* Redirect browser */
		exit();

	}
?>