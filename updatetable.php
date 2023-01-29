//updatetable

<?php
	include("config.php");
	session_start();

	//$_SESSION['nuatic_login']="true";
	if($_SESSION['nuatic_login']!="true"){
		header("Location: login.php");
	}
	else{
		$bill_user = $_SESSION['nuatic_username'];
	}

	$table = $_GET['name'];


	//Update aakenda reethi nokknm...
	//$sql = ""
?>