<?php

session_start();

require_once('./DatabaseAdaptor.php');


	
if (isset ( $_POST ['checkout'] ) && isset ( $_SESSION ['name'] )) {
		
	// check if there is anything in cart
	$totalQuantity = $theDBA->summaryCartQuantity($_SESSION['name']);
	
	if ($totalQuantity != 0) {
		// create a new order
		$orderID = $theDBA->recordOrder($_SESSION['name']);
		
		// add item from cart into order table
		$itemArray = $theDBA->getCartInfo($_SESSION['name']);
		
		foreach ($itemArray as $item) {
			$theDBA->addItemToOrder($item['itemID'], $orderID['orderID'], $item['quantity']);
		}
		
		// clean cart
		$theDBA->checkoutCart($_SESSION['name']);
		
		// update quantity
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
	}
	
	header ( "Location: ./cart.php" );
}
	


?>