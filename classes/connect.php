<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<?php
include('dbh.php');
//szerver oldali ellenőrzés példa
$nev=$_POST['nev'];
$email=$_POST['email'];
$szoveg=$_POST['szoveg'];


if(!isset($nev) || strlen($nev) < 5)
{
	exit("Hibás név: ".$_POST['nev']);
}

$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
if(!isset($email) || !preg_match($re,$email))
{
	exit("Hibás email: ".$_POST['email']);
}

if(!isset($szoveg) || empty($szoveg))
{
	exit("Hibás szöveg: ".$_POST['szoveg']);
}
	/*	
	// MySQLi megoldás
			
	$conn = new mysqli("localhost", "root", "", "gazdit");

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO uzenetek (nev, email, szoveg)
	VALUES ('$nev', '$email', '$szoveg')";

	if ($conn->query($sql) === TRUE) {
		echo nl2br ("Üzenet elküldve! \n Név: ");
		echo $nev;
		echo nl2br ("\n Email: ");
		echo $email;
		echo nl2br ("\n Üzenet: ");
		echo $szoveg;
	} else {
		echo "Hiba: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	*/

$sqlInsert = "insert into uzenetek(nev, email, szoveg)
    values(:nev, :email, :szoveg)";
        
$stmt = $dbh->prepare($sqlInsert); 
$stmt->execute(array(':nev' => $nev, ':email' => $email, ':szoveg' => $szoveg)); 
		
echo nl2br ("Üzenet elküldve! \n Név: ");
echo $nev;
echo nl2br ("\n Email: ");
echo $email;
echo nl2br ("\n Üzenet: ");
echo $szoveg;
		
?>

	<form action=".././index.php" method="POST">
		<button type="submit" name="submit">Vissza a főoldalra</button>
	</form>
	</body>
</html>
