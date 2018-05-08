
<?php


session_start();

	
	//alert($_SESSION['islogin']);
	
    if(isset($_SESSION['islogin'])){
		// go to customer page
		if ($_SESSION['islogin'] == 1) {
			echo 1;
			exit(1);
		}

		// go to admin page
		if ($_SESSION['islogin'] == 2) {
			echo 2;
			exit(1);
		}
		
		if ($_SESSION['islogin'] == 0) {
			echo 0;
			exit(1);
		}
		
		echo 'failed';
		exit;
		
		

    }else{
        echo 0;
		exit(1);
    }


//echo "WWW";


?>