<?php

session_start();

require_once('./DatabaseAdaptor.php');

if($_POST){
	
    $itemTagName = $_POST ["searchTarget"];

	$verify = $theDBA -> checkItemTagExist($itemTagName);
		
	if ($verify == 1) {
		// get the category and info
		$category = $theDBA->getCateByItemTag($itemTagName);
		
		//$categoryStr = JSON_encode($category['category']);
		echo JSON_encode($category['category']);
		//header("Location: show.php?itemTag=".$itemTagName."&cate=".$categoryStr);
		//echo 1;
		//exit();	
	}
	else{
		echo 0;
	}
}



?>