<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

/**
* 
*/
class delfMain
{
	public $hostname = 'localhost';
	public $username = 'testuser';
	public $password = 'Test123test!';


	public function dbConnect(){
		$dbh = new PDO("mysql:host=$this->hostname;dbname=delf",$this->username,$this->password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $dbh;
	}

	public function createInstitution($request){
		$dbh = self::dbConnect();
		$school = $request->school;
		$address = $request->address;

		$stmt = $dbh->prepare("INSERT INTO school VALUES (null, :school, :address)");
		$stmt->bindParam(':school', $school, PDO::PARAM_STR);
		$stmt->bindParam(':address', $address, PDO::PARAM_STR);
		$stmt->execute();
		$id = $dbh->lastInsertId();

		return $id;
	}

	public function createUser($request,$inst_id){
		$dbh = $this->dbConnect();

		$password = $this->validatePassword($request->pass2);
		if($password == $request->pass2){
			$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
		}else{
			echo $password;
			exit();
		}
		$stmt = $dbh->prepare("INSERT INTO users VALUES (null, :email, :pass2, :inst_id)");
		$stmt->bindParam(':email', $request->email, PDO::PARAM_STR);
		$stmt->bindParam(':pass2', $passwordHashed, PDO::PARAM_STR);
		$stmt->bindParam(':inst_id',$inst_id, PDO::PARAM_INT);
		$stmt->execute();	
		$id = $dbh->lastInsertId();

		return $id;
	}

	function validatePassword($password){
		if(strlen($password) < 7){
			return 'Password is too short';
		}else{
			return $password;
		}
	}

}