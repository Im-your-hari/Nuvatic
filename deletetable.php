
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

	$sql = "drop table ".$table;
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('".$table." deleted successfully..!');<script>";
		header("location: admin.php");
	}
	else{
		echo "<script>alert('Something went wrong..!');<script>";
	}
?>