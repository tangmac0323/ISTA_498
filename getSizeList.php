<?php
session_start();

require_once('./DatabaseAdaptor.php');

if($_GET) {
	$itemTag = $_GET["itemTagName"];
	$itemColor = $_GET["itemColor"];
	
	$result = $theDBA -> getSizeArrayByColorAndItemTag($itemTag, $itemColor);
	
	echo json_encode($result);
	
	exit;
}
?>