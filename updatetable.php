<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Bill : Nuvatic</title>
</head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<body>
<div class="container">
		<hr>
		<h1 class="text-center text-info">Nuvatic : View Bills</h1>
		<hr>
		<a href="admin.php">
			<button class="btn btn-info ml-auto">BACK</button>
		</a>
		
		<hr>
	<center>
		<table class="table table-striped">
			<tr>
				<th>PRODUCTS</th>
				<th>PRICE</th>
				<th>UNIT</th>
				<th>DATE</th>
				<th>#</th>
			</tr>





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


	$sql = "select * from ".$table;
	$result = mysqli_query($conn,$sql);
	if ($result) {
		
		while($row=mysqli_fetch_assoc($result)){

			echo "<tr>";
			echo "<td>".$row['product']."<br></td>";
			echo "<td>".$row['price']."<br></td>";
			echo "<td>".$row['unit']."<br></td>";
			echo "<td>".$row['date']."<br></td>";
			echo "<td>
					<a href='updateitem.php?name=$table&product=".$row['product']."'>
					<input type='button' class='btn btn-warning text-white' name='edit' id='edit' value='EDIT'></a></td>";
			
			echo "</tr>";
			
		}

		

	}else{
		echo "something went wrong";
	}
?>




	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
