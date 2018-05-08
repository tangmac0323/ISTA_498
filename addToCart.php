<?php

session_start();

require_once('./DatabaseAdaptor.php');

if($_POST) {
	if ($_SESSION['islogin'] == 2) {
		echo 2;
		exit;
	}
	$itemTag = $_POST["itemTagName"];
	$itemColor = $_POST["itemColor"];
	$username = $_POST["username"];
	$itemSize = $_POST["itemSize"];
	$quantity = $_POST["quantity"];
	
	$itemID = $theDBA -> getItemIDbyInfo($itemColor, $itemSize, $itemTag);
	
	$itemID_real = $itemID['itemID'];
	
	// add into cart
	$verify = $theDBA -> addItem2Cart($username, $itemID_real, $quantity);
	
	if (isset($_SESSION['name'])){
		$totalQuantity = $theDBA->summaryCartQuantity($_SESSION['name']);
		if ($totalQuantity != 0){
			$_SESSION['CartNum'] =  $totalQuantity['total'];
		}
		else{
			$_SESSION['CartNum'] =  0;
		}
	}
	else{
		$_SESSION['CartNum'] =  0;
	}
	
	

	echo 1;
	

}
?>