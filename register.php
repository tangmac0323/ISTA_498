<?php
session_start();
if($_POST){
    $_SESSION['islogin'] = 1;
    $_SESSION['name'] = $_POST['name'];
    echo 1;exit;
}


?>