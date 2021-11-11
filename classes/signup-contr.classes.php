<?php

class SignupContr extends Signup{
	
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
	
	public function signupUser(){
		if($this->emptyInput()==false){
			echo("Hiányos mező");
			header("location: ../index.php?error=emptyinput");
			exit();
		}
		if($this->invalidUid()==false){
			echo("Nem megfelelő a felhasználónév");
			header("location: ../index.php?error=username");
			exit();
		}		
		if($this->invalidEmail()==false){
			echo("Nem megfeleő email cím");
			header("location: ../index.php?error=email");
			exit();
		}		
		if($this->pwdMatch()==false){
			echo("A megadott jelszavak nem egyeznek");
			header("location: ../index.php?error=passwordmatch");
			exit();
		}
		if($this->uidTakenCheck()==false){
			echo("Foglalt felhasználónév vagy email cím");
			header("location: ../index.php?error=useroremailtaken");
			exit();
		}

		$this->setUser($this->uid, $this->pwd, $this->email);
	}
	
	private function emptyInput(){
		$result;
		if(empty($this->uid) || empty($this->pwd) || empty($this->pwdr) || empty($this->email)){
			$result = false;
		}
		else {
			$result=true;
		}
		return $result;
	}
	
	private function invalidUid(){
		$result;
		if(!preg_match("/^[a-zA-Z0-9]*/", $this->uid)){
			$result=false;
		}
		else {
			$result=true;
		}
		return $result;
	}
	
	private function invalidEmail(){
		$result;
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$result=false;
		}
		else {
			$result=true;
		}
		return $result;
	}
	
	private function pwdMatch(){
		$result;
		if($this->pwd !== $this->pwdr){
			$result=false;
		}
		else {
			$result=true;
		}
		return $result;
	}
	
		private function uidTakenCheck(){
		$result;
		if(!$this->checkUser($this->uid, $this->email)){
			$result=false;
		}
		else {
			$result=true;
		}
		return $result;
	}
}
?>
