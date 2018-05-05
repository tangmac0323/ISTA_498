<?php
session_start();
if($_SESSION['islogin']==1){
    echo 1;
    exit;
}else{
    echo 2;
    exit;
}

?>