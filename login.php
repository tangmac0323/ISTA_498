<?php
session_start();
if($_POST){
    if($_POST['name']='abc@163.com' && $_POST['pass']='123456'){
        $_SESSION['name'] = 'abc@163.com';
        $_SESSION['islogin'] = 1;
        echo 1;
        exit;
    }else{
        echo 2;
        exit;
    }
}