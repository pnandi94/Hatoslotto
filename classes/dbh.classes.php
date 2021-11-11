<?php
class Dbh{
	
	protected function connect(){
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
class DbhQuery extends Dbh{
	public function legutobbi(){
		$select= 'SELECT ev, max(het), ertek from nyeremeny INNER JOIN huzas ON huzasid=huzas.id WHERE ev=2013';
		$result = $this->connect()->prepare($select);
		$result->execute();
		$row=$result->fetch();
		$legutobbi="'<h3>A legutóbbi nyeremény $row[0]. $row[1]. hetében: $row[2] Ft";
		echo($legutobbi);
	}
	
	public function legnagyobb(){
		$select= 'SELECT ertek, ev, het from nyeremeny INNER JOIN huzas ON huzasid=huzas.id
			ORDER BY ertek DESC LIMIT 1';
		$result = $this->connect()->prepare($select);
		$result->execute();
		$row=$result->fetch();
		$legnagyobb="<br>Az eddigi legnagyobb nyereményt: $row[0] Ft-ot, $row[1]. $row[2]. hetében sorsolták ki.</h3>";
		echo($legnagyobb);
	}
}	
?>