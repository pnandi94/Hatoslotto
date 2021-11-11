<?php

class Login extends Dbh {
	
	protected function getUser($uid, $pwd){
		$stmt = $this->connect()->prepare('SELECT pwd FROM users WHERE
			uid = ? OR email = ?;');	
		
		if($stmt->execute(array($uid, $pwd))){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		
		if($stmt->rowCount()==0){
			$stmt=null;
			header("location: ../index.php?error=usernotfound");
			exit();
		}
		
		$pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$checkPwd = password_verify($pwd, $pwdHashed[0]["user_pwd"]);
		
		if($checkPwd==false){
			$stmt=null;
			header("location: ../index.php?error=wrongpasswod");
			exit();
		}
		elseif($checkPwd==true){
			$stmt = $this->connect()->prepare('SELECT * FROM users WHERE 
				uid = ? OR email = ? AND pwd = ?;');
				
			if($stmt->execute(array($uid, $uid, $pwd))){
				$stmt = null;
				header("location: ../index.php?error=stmtfailed");
				exit();
			}
		
			if($stmt->rowCount()==0){
				$stmt = null;
				header("location: ../index.php?error=usernotfound");
				exit();
			}
			
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
			session_start();
			$_SESSION["uid"]=$user[0]["uid"];
			$_SESSION["email"]=$user[0]["email"];
		}
		
		$stmt = null;
	}
}
?>
