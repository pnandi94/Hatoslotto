<?php
class Dbh{
	
	public function connect(){
		try{
			$username="root";
			$password="";
			$host="localhost";
			$dbName="hatoslotto";
			$dbh=new PDO('mysql:host=localhost;dbname=hatoslotto', $username, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			//$dbh = new PDO('mysql:host=localhost;dbname=hatoslotto', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			//$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			return $dbh;
		}
		catch (PDOException $e){
			print "Error!: " . $e->getMessage(). "<br/>";
			die();
		}
	}
}
?>