<?php 


session_start();

require_once('./DatabaseAdaptor.php');


if($_POST){
		
	
	$itemCategory = $_POST ["itemCategory"];
	$itemTagName = $_POST ["itemTagName"];
	$itemDescription = $_POST ["itemDescription"];
	$itemPrice = $_POST ["itemPrice"];
	$itemSize = $_POST ["itemSize"];
	$itemColor = $_POST ['itemColor'];
	
	
	// check if tag name exist
	$tagVerify = $theDBA->checkItemTag($itemTagName);
	
	// add new tag if not exist
	if ($tagVerify != true) {
		$theDBA->addNewItemTag($itemTagName, $itemDescription, $itemCategory, $itemPrice, $itemSize, $itemColor);
		echo 1;
		exit;
	}
	else{
		// check if itemcolor and item size are empty
		if ($itemColor != "N/A" && $itemSize != "N/A") {
			// check if the combination exist in db
			$itemVerify = $theDBA->checkItemByItemTag($itemTagName, $itemColor, $itemSize);
			
			// insert new item if not there
			if ($itemVerify != true) {
				$theDBA->addNewSubItem($itemTagName, $itemSize, $itemColor);
				
				echo 1;
				exit;
			}						
		}
		
		//update the rest blank if the blank is empty stay the original value
		$itemTagInfoArray = $theDBA->getItemTagInfoByTag($itemTagName);
		if ($itemDescription == "N/A") {
			$itemDescription = $itemTagInfoArray[0]['itemDescription'];
		}
		
		if ($itemPrice == 0) {
			$itemPrice = $itemTagInfoArray[0]['itemPrice'];
		}
		
		if ($itemPrice == "N/A") {
			$itemCategory = $itemTagInfoArray[0]['category'];
		}
		
		$theDBA->updateItemTagDescription($itemTagName, $itemDescription, $itemCategory, $itemPrice);
		
		
	}
	
	// Count total files
	
	/*
	if (isset($_FILES['inputGroupFile01'])){
		$countfiles = count($_FILES['inputGroupFile01']['name']);
	 
		// Looping all files
		for( $i = 0;$i < $countfiles;$i++ ){
			$filename = $_FILES['inputGroupFile01']['name'][$i];
			
			
			// as preview
			if ($i == 0) {
				move_uploaded_file($_FILES['file']['tmp_name'][$i],'C:/xampp/htdocs/images/Storage/'.$itemCategory.'/'.$filename);
			}
			else{
				// Upload file
				move_uploaded_file($_FILES['file']['tmp_name'][$i],'C:/xampp/htdocs/images/Storage/'.$itemCategory.'/'.$itemTagName.'/'.$filename);
			}
		}
	}
	*/
	echo 1;
	
} 
?>