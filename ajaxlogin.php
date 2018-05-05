		<!-- db checkout -->
<?php


session_start();
if($_POST){
    if(isset($_SESSION['islogin'])){
        echo 1;
        exit;
    }else{
        echo 2;
        exit;
    }
}


?>