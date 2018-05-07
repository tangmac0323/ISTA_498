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
            $exist=false;
            if (! $check){
                $exist=true;
            }
            return $exist;
        }
		
		// insert new user to customer table
		public function addUser($username, $password, $fullname, $email, $address, $telNo){
			$stmt = $this->DB->prepare ("INSERT INTO Customer (userName, hashpw, firstName, lastName, email, address, telNo)
										VALUES(:username, PASSWORD(:password), :firstname, :lastname, :email, :address, :telNo)");
            $stmt->bindParam ( 'username', $username );
            $stmt->bindParam ( 'password', $password );
			$stmt->bindParam ( 'firstname', $firstname );
			$stmt->bindParam ( 'lastname', $lastname );
			$stmt->bindParam ( 'email', $username);
			$stmt->bindParam ( 'address', $address);
			$stmt->bindParam ( 'telNo', $telNo);
			$stmt->excute();
		}
		
		// update user info
		public function updateUserInfo($username, $fullname, $email, $address, $telNo){
			$stmt = $this->DB->prepare ("UPDATE Customer 
										SET country=:country, fullName=:fullname, email=:email, address=:address, telNo=:telNo
										WHERE userName=:username");
            $stmt->bindParam ( 'username', $username );
			$stmt->bindParam ( 'fullname', $fullname );
			$stmt->bindParam ( 'email', $username);
			$stmt->bindParam ( 'address', $address);
			$stmt->bindParam ( 'telNo', $telNo);
			$stmt->excute();
		}
		
		// extract info from customer table
		public function getUserInfo($username) {
		}
    }

/*	
	//$verify = $theDBA -> verifyAdmin ('zhangyifan@hotmail.com', 'woyemeibanfa');
	$verify = $theDBA -> verifyCustomer ('a@hotmail.com', 'a');
	
	if ($verify === true){
		echo 4;
	}else {
		echo 2;
	}
	*/
	

?>	