
<?php


session_start();

if($_POST){
	
	//alert($_SESSION['islogin']);
	
    if(isset($_SESSION['islogin'])){
		// go to customer page
		if ($_SESSION['islogin'] == 1) {
			echo 1;
			exit;
		}

		// go to admin page
		if ($_SESSION['islogin'] == 2) {
			echo 2;
			exit;
		}
		
		if ($_SESSION['islogin'] == 0) {
			echo 0;
			exit;
		}

    }else{
        echo 0;
        exit;
    }
}


?>