<h2>Üdvözöllek a Hatoslottó főoldalán</h2>
<img src="./images/money.jpg">
<?php
include('././classes/dbh.classes.php');
$result=new DbhQuery();
$result->legutobbi();
$result->legnagyobb();
?>
<h3>A céljaink</h3>
<p>A Hatoslottó.hu célja bemutatni az elmúlt idők legnagyobb nyereményeit.</p>
