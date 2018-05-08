<?php

session_start();

require_once('./DatabaseAdaptor.php');


	
if (isset ( $_POST ['action'] ) && isset ( $_POST ['itemID'] )) {
	
	
	$action = $_POST ['action'];
	$itemID = $_POST ['itemID'];
	
	if ('increase'=== $action) {
	    
	    //console.log('increase');
	    
		$theDBA->increaseItemInCart($_SESSION['name'], $itemID, 1);
	}
	if ('decrease' === $action) {
	    
	    //console.log('decrease');
	    
		$theDBA->decreaseItemInCart($_SESSION['name'], $itemID, 1);
		
		// check if the quantity is zero
		
		$theDBA->cleanZeroItemInCart();
		
	}
	
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

	header ( "Location: ./cart.php" );
}
	


?>