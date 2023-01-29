<?php
	session_start();

	$_SESSION['nuatic_login']="false";
	$_SESSION['nuatic_username']="";
	header("Location: login.php");
?>