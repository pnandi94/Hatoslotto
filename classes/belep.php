<?php
include('dbh.classes.php');
include('login.classes.php');
include('login-contr.classes.php');

$login=new LoginContr($_POST['uid'], $_POST['pwd']);
$login->loginUser();
?>
