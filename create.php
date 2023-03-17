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

	$tablename = $_POST["tablename"];

	$newtable = "create table ".$tablename."(product varchar(25),price int,unit int,date date,available varchar(25))";
	$res = mysqli_query($conn,$newtable);
	if(!$res){
		//header("Location: index.php");
		echo "Error..!";
	}
	else{
		header("location: billpage.php?bill=".$tablename."");
	}
?>