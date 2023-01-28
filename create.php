<?php
	include("config.php");

	$tablename = $_POST["tablename"];

	$newtable = "create table ".$tablename."(product varchar(25),price int,unit int,date date)";
	$res = mysqli_query($conn,$newtable);
	if(!$res){
		//header("Location: index.php");
		echo "Error..!";
	}
	else{
		header("location: billpage.php?bill=".$tablename."");
	}
?>