<?php
    // DataBaseAdaptor.php
    $theDBA = new DatabaseAdaptor;
    class DatabaseAdaptor {
        // The instance variable used in every one of the functions in class DatbaseAdaptor
        private $DB;
        public function __construct() {
            $db = 'mysql:dbname=ISTA498;host=127.0.0.1';
            $user = 'root';
            $password = '';
            try {
                $this->DB = new PDO ( $db, $user, $password );
                $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            } catch ( PDOException $e ) {
                echo ('Error establishing Connection');
                exit ();
            }
        }
		
		// Function to verify customer account
        public function verifyCustomer ($username, $password) {
            $stmt = $this->DB->prepare ( "SELECT hashpw FROM Customer WHERE userName=:username and hashpw=PASSWORD(:password)");
            $stmt->bindParam ( 'username', $username );
			$stmt->bindParam ( 'password', $password );
            $stmt->execute ();
            $passwordArray = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            if (count($passwordArray) > 0){
				return true;
            }
            return false;
        }

		// Function to verify manager account
        public function verifyAdmin($username, $password) {
            $stmt = $this->DB->prepare ( "SELECT hashpw FROM Admininster WHERE userName=:username and hashpw=PASSWORD(:password)");
            $stmt->bindParam ( 'username', $username );
			$stmt->bindParam ( 'password', $password );
            $stmt->execute ();
            $passwordArray = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            if (count($passwordArray) > 0){
				return true;
            }
            return false;
        }
		
		
        public function checkingCustomer($username){
            $stmt = $this->DB->prepare ( "SELECT * FROM Customer WHERE userName=:username");
            $stmt->bindParam ( 'username', $username );
            $stmt->execute ();
            $check = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            if ($check){
                return true;
            }
            return false;
        }
		
		// insert new user to customer table
		public function addUser($username, $password){
			$stmt = $this->DB->prepare ("INSERT INTO Customer (userName, hashpw, email)
										VALUES(:username, PASSWORD(:password), :username)");
            $stmt->bindParam ( 'username', $username );
            $stmt->bindParam ( 'password', $password );
			//$stmt->bindParam ( 'fullname', $fullname );
			$stmt->bindParam ( 'email', $username);
			//$stmt->bindParam ( 'address', $address);
			//$stmt->bindParam ( 'telNo', $telNo);
			$stmt->execute();
		}
		
		// update user info
		public function updateUserInfo($username, $fullname, $email, $address, $telNo, $state){
			$stmt = $this->DB->prepare ("UPDATE Customer 
										SET stateName=:state, fullName=:fullname, email=:email, address=:address, telNo=:telNo
										WHERE userName=:username");
            $stmt->bindParam ( 'username', $username );
			$stmt->bindParam ( 'fullname', $fullname );
			$stmt->bindParam ( 'email', $username);
			$stmt->bindParam ( 'address', $address);
			$stmt->bindParam ( 'telNo', $telNo);
			$stmt->bindParam ( 'state', $state);
			$stmt->execute();
		}
		
		// extract info from customer table
		public function getUserInfo($username) {
            $stmt = $this->DB->prepare ( "SELECT * FROM Customer WHERE userName=:username");
            $stmt->bindParam ( 'username', $username );
            $stmt->execute ();	
			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );				
		}
		
		// get item info
		public function getItemInfo($itemID) {
			$stmt = $this->DB->prepare ("SELECT * FROM ItemInfo WHERE itemID=:itemID");
			$stmt->bindParam('itemID', $itemID);
			
			$stmt->execute();			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );				
		}
		
		
		public function checkItemInCart($username, $itemID) {
			$stmt = $this->DB->prepare ("SELECT * FROM ShoppingCart WHERE username=:username AND itemID=:itemID");
			$stmt->bindParam ( 'username', $username);
			$stmt->bindParam ( 'itemID', $itemID);
			
			$stmt->execute ();	

			$check = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            if ($check){
                return true;
            }
            return false;
		}
		
		public function increaseItemInCart($username, $itemID, $quantity) {
			$stmt = $this->DB->prepare( "UPDATE ShoppingCart SET quantity=quantity+:quantity WHERE username=:username AND itemID=:itemID" );
			$stmt->bindParam ( 'username', $username);
			$stmt->bindParam ( 'itemID', $itemID);
			$stmt->bindParam ( 'quantity', $quantity);
			
			$stmt->execute ();	
		}
		
		public function decreaseItemInCart($username, $itemID, $quantity) {
			$stmt = $this->DB->prepare( "UPDATE ShoppingCart SET quantity=quantity-:quantity WHERE username=:username AND itemID=:itemID" );
			$stmt->bindParam ( 'username', $username);
			$stmt->bindParam ( 'itemID', $itemID);
			$stmt->bindParam ( 'quantity', $quantity);
			
			$stmt->execute ();	
		}
		
		public function updateItemInCart($username, $itemID, $quantity) {
			$stmt = $this->DB->prepare( "UPDATE ShoppingCart SET quantity=:quantity WHERE username=:username AND itemID=:itemID" );
			$stmt->bindParam ( 'username', $username);
			$stmt->bindParam ( 'itemID', $itemID);
			$stmt->bindParam ( 'quantity', $quantity);
			
			$stmt->execute ();	
		}
		
		
		// add item into shopping cart
		public function addItem2Cart($username, $itemID, $quantity) {
			
			// check if the item is already in cart
			$stmt = $this->DB->prepare ("SELECT * FROM ShoppingCart WHERE username=:username AND itemID=:itemID");
			$stmt->bindParam ( 'username', $username);
			$stmt->bindParam ( 'itemID', $itemID);
			
			$stmt->execute ();	
			$check = $stmt->fetchAll ( PDO::FETCH_ASSOC );
			
			if ($check == false){
				$stmt = $this->DB->prepare ("INSERT INTO ShoppingCart (userName, itemID, quantity) VALUES(:username, :itemID, :quantity)");
				$stmt->bindParam ( 'username', $username);
				$stmt->bindParam ( 'itemID', $itemID);
				$stmt->bindParam ( 'quantity', $quantity);
			
				$stmt->execute ();
			}
			else{
				$stmt = $this->DB->prepare( "UPDATE ShoppingCart SET quantity=quantity+:quantity WHERE username=:username AND itemID=:itemID" );
				$stmt->bindParam ( 'username', $username);
				$stmt->bindParam ( 'itemID', $itemID);
				$stmt->bindParam ( 'quantity', $quantity);
				
				$stmt->execute ();	
			}
			
		}
		
		
		public function cleanZeroItemInCart() {
			$stmt = $this->DB->prepare ("DELETE FROM ShoppingCart WHERE quantity=0");			
			$stmt->execute ();	
		}
		
		public function checkoutCart($username) {			
			$stmt = $this->DB->prepare ("DELETE FROM ShoppingCart WHERE userName=:username");
			$stmt->bindParam ( 'username', $username);
			
			$stmt->execute();
		}
		
		public function recordOrder($username) {
			$stmt = $this->DB->prepare ("INSERT INTO CustOrder (userName) VALUES(:username)");
			$stmt->bindParam ('username', $username);			
			$stmt->execute();
			
			// get the order ID
			$stmt = $this->DB->prepare ("SELECT * 
										FROM CustOrder 
										WHERE userName=:username 
										AND 
										orderID = (SELECT MAX(orderID) 
													FROM CustOrder 
													WHERE username=:username)");
			$stmt->bindParam ('username', $username);										
			$stmt->execute();
			
			return $stmt->fetch ( PDO::FETCH_ASSOC );
			
		}
		
		public function getOrderInfoByUser($username) {
			$stmt = $this->DB->prepare ( "SELECT * 
										FROM CustOrder
										WHERE username=:username
										ORDER BY CustOrder.orderID DESC" );
			$stmt->bindParam ('username', $username);
			
			$stmt->execute();
			
			return $stmt->fetchAll ( PDO::FETCH_ASSOC );
			
		}
		
		public function getOrderInfoByOrder($orderID, $username) {
			$stmt = $this->DB->prepare ( "SELECT * FROM CustOrder
													INNER JOIN ItemSold
													ON ItemSold.orderID=CustOrder.orderID
													INNER JOIN ItemInfo
													ON ItemSold.itemID=ItemInfo.itemID
													WHERE CustOrder.username=:username
													AND CustOrder.orderID=:orderID
													ORDER BY CustOrder.orderID DESC" );
			$stmt->bindParam ('username', $username);
			$stmt->bindParam ('orderID', $orderID);
			
			$stmt->execute();
			
			return $stmt->fetchAll ( PDO::FETCH_ASSOC );
			
		}
		
		public function addItemToOrder($itemID, $orderID, $quantity) {
			$stmt = $this->DB->prepare ("INSERT INTO ItemSold 
										VALUES(:itemID, :orderID, :quantity)");
			$stmt->bindParam ('itemID', $itemID);
			$stmt->bindParam ('orderID', $orderID);
			$stmt->bindParam ('quantity', $quantity);
			
			$stmt->execute();
		}
		
		
		public function summaryCartCost($username) {
			$stmt = $this->DB->prepare ("SELECT SUM(itemTotalCost) as 'totalCost'
										FROM (
										SELECT (itemPrice * quantity) as 'itemTotalCost'
										FROM ShoppingCart
										INNER JOIN ItemInfo
										ON ShoppingCart.itemID=ItemInfo.itemID
										INNER JOIN ItemTagDescription
										ON ItemTagDescription.itemTagName=ItemInfo.itemTagName
										WHERE username=:username) AS SUBTABLE1");
										
			$stmt->bindParam('username', $username);

			
			$stmt->execute();			
			return $stmt->fetch( PDO::FETCH_ASSOC );								
		}
		
		public function summaryCartQuantity($username) {
			$stmt = $this->DB->prepare ("SELECT SUM(quantity) as 'total'
										FROM ShoppingCart
										INNER JOIN ItemInfo
										ON ShoppingCart.itemID=ItemInfo.itemID
										INNER JOIN ItemTagDescription
										ON ItemTagDescription.itemTagName=ItemInfo.itemTagName
										WHERE username=:username") ;
										
			$stmt->bindParam('username', $username);	
			$stmt->execute();			
			$check = $stmt->fetch( PDO::FETCH_ASSOC );	
            if ($check){
                return $check;
            }
            return 0;			
		}
		
		
		public function getOrderAsArray($username) {
			$stmt = $this->DB->prepare ("SELECT * FROM CustOrder WHERE username=:username");
			$stmt->bindParam('username', $username);
			
			$stmt->execute();
			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );
		}
		
		public function getItemByOrderAsArray($orderID) {
			$stmt = $this->DB->prepare ("SELECT * FROM ItemSold WHERE orderID=:orderID");
			$stmt->bindParam('orderID', $orderID);
			
			$stmt->execute();
			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );		
		}
		
		// get the info of the shopping cart
		public function getCartInfo($username) {
			$stmt = $this->DB->prepare ("SELECT itemTagName, itemSize, itemColor, quantity, ItemInfo.itemID 
										FROM ShoppingCart 
										INNER JOIN ItemInfo 
										ON ShoppingCart.itemID=ItemInfo.itemID 
										WHERE ShoppingCart.username=:username");
			$stmt->bindParam('username', $username);
			
			$stmt->execute();			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );					
		}
		
		public function getItemTagAsArrayByCategory($category) {
			$stmt = $this->DB->prepare ("SELECT * FROM ItemTagDescription WHERE category=:category");
			$stmt->bindParam('category',$category);
			
			$stmt->execute();			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );	
		}
		
		public function getItemTagInfoByTag($itemTag) {
			$stmt = $this->DB->prepare ("SELECT * FROM ItemTagDescription WHERE itemTagName=:itemTag");
			$stmt->bindParam('itemTag',$itemTag);			
			$stmt->execute();			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );				
		}
		
		public function getItemInfoByID($itemID) {
			$stmt = $this->DB->prepare("SELECT * FROM ItemInfo WHERE itemID=:itemID");
			$stmt->bindParam('itemID',$itemID);			
			$stmt->execute();			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );					

		}
		
		public function getSizeArrayByColorAndItemTag($itemTag, $itemColor) {
			$stmt = $this->DB->prepare ("SELECT itemSize FROM ItemInfo WHERE itemTagName=:itemTag AND itemColor=:itemColor");
			$stmt->bindParam('itemColor', $itemColor);
			$stmt->bindParam('itemTag', $itemTag);			
			$stmt->execute();
			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );	
		}
		
		public function getSizeArrayByItemTag($itemTag) {
			$stmt = $this->DB->prepare ("SELECT DISTINCT itemSize FROM ItemInfo WHERE itemTagName=:itemTag");
			$stmt->bindParam('itemTag', $itemTag);			
			$stmt->execute();
			
			return $stmt->fetchAll( PDO::FETCH_ASSOC );	
		}
		
		public function getItemIDbyInfo($itemColor, $itemSize, $itemTagName) {
			$stmt = $this->DB->prepare ("SELECT itemID FROM ItemInfo WHERE (itemColor=:itemColor AND itemSize=:itemSize AND itemTagName=:itemTagName)");
			$stmt->bindParam('itemTagName', $itemTagName);
			$stmt->bindParam('itemColor', $itemColor);
			$stmt->bindParam('itemSize', $itemSize);
			
			$stmt->execute();			
			return $stmt->fetch( PDO::FETCH_ASSOC );	
		}
		
		public function checkItemTag($itemTagName) {
			// Check if the item tag already exist
			$stmt = $this->DB->prepare ( "SELECT * FROM ItemTagDescription WHERE itemTagName=:itemTagName" );
			$stmt->bindParam('itemTagName', $itemTagName);
			
			$stmt->execute();
			
			$check = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            if ($check){
                return true;
            }
            return false;			
		}
		
		public function addNewItemTag($itemTagName, $itemDescription, $category, $itemPrice, $itemSize, $itemColor) {
			$stmt = $this->DB->prepare ( "INSERT INTO ItemTagDescription (itemTagName, itemDescription, category, itemPrice)
											VALUES(:itemTagName, :itemDescription, :category, :itemPrice)" );
			$stmt->bindParam('itemTagName', $itemTagName);
			$stmt->bindParam('itemDescription', $itemDescription);
			$stmt->bindParam('itemPrice', $itemPrice);							
			$stmt->bindParam('category', $category);
			$stmt->execute();
			
			// add item info
			
			$stmt = $this->DB->prepare ( "INSERT INTO ItemInfo (itemColor, itemSize, itemTagName)
											VALUES(:itemColor, :itemSize, :itemTagName)" );
			$stmt->bindParam('itemTagName', $itemTagName);
			$stmt->bindParam('itemSize', $itemSize);							
			$stmt->bindParam('itemColor', $itemColor);			
			$stmt->execute();			
		}
		
		public function updateItemTagDescription($itemTagName, $itemDescription, $category, $itemPrice) {
			$stmt = $this->DB->prepare ( "UPDATE ItemTagDescription 
											SET itemDescription=:itemDescription, category=:category, itemPrice=:itemPrice
											WHERE itemTagName=:itemTagName" );
			$stmt->bindParam('itemTagName', $itemTagName);
			$stmt->bindParam('itemDescription', $itemDescription);
			$stmt->bindParam('itemPrice', $itemPrice);							
			$stmt->bindParam('category', $category);
			
			$stmt->execute();
		}
		
		public function checkItemByItemTag($itemTagName, $itemColor, $itemSize) {
			$stmt = $this->DB->prepare ( "SELECT * FROM ItemInfo
											WHERE itemTagName=:itemTagName
											AND itemColor=:itemColor
											AND itemSize=:itemSize" );
			$stmt->bindParam('itemTagName', $itemTagName);
			$stmt->bindParam('itemSize', $itemSize);							
			$stmt->bindParam('itemColor', $itemColor);			
			$stmt->execute();	

			$check = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            if ($check){
                return true;
            }
            return false;	
		}
		
		public function addNewSubItem($itemTagName, $itemSize, $itemColor) {
			$stmt = $this->DB->prepare ( "INSERT INTO ItemInfo (itemColor, itemSize, itemTagName)
											VALUES(:itemColor, :itemSize, :itemTagName)" );
			$stmt->bindParam('itemTagName', $itemTagName);
			$stmt->bindParam('itemSize', $itemSize);							
			$stmt->bindParam('itemColor', $itemColor);			
			$stmt->execute();				
		}
	}
	/*
	$theDBA->close();
	*/
	/*	
	//$verify = $theDBA -> verifyAdmin ('zhangyifan@hotmail.com', 'woyemeibanfa');
	$verify = $theDBA -> verifyCustomer ('a@hotmail.com', 'a');
	
	if ($verify === true){
		echo 4;
	}else {
		echo 2;
	}
	*/
	
	/*
	$userExist = $theDBA -> checkingCustomer('b@hotmail.com');
	if ($userExist === true){
		echo 1;
	}else {
		echo 0;
	}
	*/
	
	/*
	$userInfoArray = $theDBA -> getUserInfo('a@hotmail.com');
	print_r($userInfoArray[0]["telNo"]);
	foreach ($userInfoArray as $info) {
		echo $info['fullName'];
	}
	*/
	
	/*
	$userInfoArray = $theDBA -> getItemIDbyInfo('BLACK', '36', 'ItemA');
	print_r($userInfoArray['itemID']);
	*/
	

?>	