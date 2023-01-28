
<?php
	include("config.php");

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