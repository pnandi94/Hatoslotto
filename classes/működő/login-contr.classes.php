<?php

class LoginContr extends Login{
	
	private $uid;
	private $pwd;

	public function __construct($uid, $pwd){
		$this->uid=$uid;
		$this->pwd=$pwd;
	}
	
	public function loginUser(){
		if(isset($_POST['uid']) && isset($_POST['pwd'])) {
			try {
				$sqlSelect = "select uid, email from users where uid = :uid and pwd = sha1(:pwd)";
				$sth = $this->connect()->prepare($sqlSelect);
				$sth->execute(array(':uid' => $_POST['uid'], ':pwd' => $_POST['pwd']));
				$row = $sth->fetch(PDO::FETCH_ASSOC);
				if($row) {
					$_SESSION['uid'] = $row['uid']; $_SESSION['email'] = $row['email'];
				}
			}
			catch (PDOException $e) {
				$errormessage = "Hiba: ".$e->getMessage();
			}      
		}
		else {
			header("Location: .");
		}
				
		//$this->getUser($this->uid, $this->pwd);
	}
}
?>
