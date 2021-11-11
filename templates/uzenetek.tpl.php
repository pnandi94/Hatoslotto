<table>
    <caption>Beérkezett üzenetek</caption>
	<tr>
		<th>Név</th>
		<th>Email</th>
		<th>Üzenet</th>
<?php
$dbh = new PDO('mysql:host=localhost;dbname=gazdit', 'root', '',
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

$stmt = $dbh->query("SELECT * FROM uzenetek ORDER BY id DESC");

while ($row = $stmt->fetch()) {
    echo "<tr><td>". $row['nev']."</td><td>". $row['email'] ."</td><td>". $row['szoveg']."<br />\n";
}
?>
</table>
