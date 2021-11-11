<?php
class Signup extends Dbh {
	
	private $uid;
	private $pwd;
	private $pwdr;
	private $email;
	
	public function __construct($uid, $pwd, $pwdr, $email){
		$this->uid=$uid;
		$this->pwd=$pwd;
		$this->pwdr=$pwdr;
		$this->email=$email;
	}

	protected function checkUser($uid, $email){
		$stmt = $this->connect()->prepare('SELECT uid FROM 
			users WHERE uid = ? OR email = ?;');
		
		if(!$stmt->execute(array($uid, $email))){
			$stmt = null;
			header("location: ../index.php?error=stmtfailer");
			exit();
		}
		
		$resultCheck;
		if($stmt->rowCount() > 0){
			$resultCheck=false;
		}
		else{
			$resultCheck=true;
		}
		return $resultCheck;
	}
	
		
	public function setUser($uid, $pwd, $email){
		try {
			$sqlSelect = "select id from users where uid = :uid";
			$sqlInsert = "insert into users(id, uid, email, pwd) values(0, :uid, :email, :pwd)";
			$stmt = $this->connect()->prepare($sqlInsert); 
			$stmt->execute(array(':uid' => $_POST['uid'], ':email' => $_POST['email'],':pwd' => sha1($_POST['pwd']))); 
		}
		catch (PDOException $e) {
			$uzenet = "Hiba: ".$e->getMessage();
			$ujra = true;
		}      
	}
}
?>