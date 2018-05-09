<?php

session_start();

require_once('./DatabaseAdaptor.php');



if($_POST){
	
    //$username = $_POST ["searchBarInput"];

	$productArray = $theDBA->getAllItemTagName();
	
	$productInfoArray = array();
	
	
	if ($productArray != null) {
		
		foreach ($productArray as $productInfo) {
			array_push($productInfoArray, $productInfo['itemTagName']);
		}		
		echo json_encode($productInfoArray);
	}
	else{
		echo 0;
	}
}



?>