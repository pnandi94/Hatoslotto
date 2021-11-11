<?php

class Login extends Dbh {
	
	protected function getUser($uid, $pwd){
    try {
        // Felhsználó keresése
        $sqlSelect = "select uid, email from users where uid = :uid and pwd = sha1(:pwd)";
        $sth = $this->connect()->prepare($sqlSelect);
        $sth->execute(array(':uid' => $_POST['uid'], ':pwd' => $_POST['pwd']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['uid'] = $row['uid']; $_SESSION['email'] = $row['email'];
			header("location: ././index.php?sikeres_bejelentkezés");
        }
		else{
			header("location: ././index.php?sikertelen_bejelentkezés");
		}
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
		}   
	}
}
?>
