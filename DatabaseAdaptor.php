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
                $exist = true;
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
		
		
		
		// add item into shopping cart
		public function addItem2Cart($username, $itemID, $quantity) {
			$stmt = $this->DB->prepare ("INSERT INTO ShoppingCart (userName, itemID, quantity) VALUES(:username, :itemID, :quantity)");
			$stmt->bindParam ( 'username', $username);
			$stmt->bindParam ( 'itemID', $itemID);
			$stmt->bindParam ( 'quantity', $quantity);
			
			$stmt->execute ();
		}
		
		public function checkoutCart($username) {			
			$stmt = $this->DB->prepare ("DELETE FROM ShoppingCart WHERE userName=:username");
			$stmt->bindParam ( 'username', $username);
			
			$stmt->execute();
		}
		
		public function checkoutOrder($username) {
			$stmt = $this->DB->prepare ("INSERT INTO CustOrder (userName) VALUES(:username)");
			$stmt->bindParam ('username', $username);
			
			$stmt->execute();
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
		
		public function getCartInfo($username) {
			$stmt = $this->DB->prepare ("SELECT * FROM ShoppingCart WHERE username=:username");
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

?>	