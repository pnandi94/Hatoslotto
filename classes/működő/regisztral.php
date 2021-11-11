<?php

include('dbh.classes.php');
include('signup.classes.php');
include('signup-contr.classes.php');

$signup=new SignupContr($_POST['uid'], $_POST['pwd'], $_POST['pwd'], $_POST['email']);
$signup->signupUser();
header("location: ././index.php?oldal=belepes");
?>