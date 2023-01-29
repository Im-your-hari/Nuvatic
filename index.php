<?php
	include("config.php");

	if(isset($_POST['new'])){
		$tablename = $_POST["tablename"];

		$newtable = "create table ".$tablename."(product varchar(25),price int,unit int,date date)";
		$res = mysqli_query($conn,$newtable);
		if(!$res){
			echo "<script>alert('Provide a valid Billname..!');</script>";
			//sleep(2);
			//header("Location: index.php");
		}
		else{
			header("location: billpage.php?bill=".$tablename."");
		}
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	<title>Home</title>
</head>
<body>
	<div class="container">
		<hr>
		<h1 class="text-center text-info">Nuvatic : Home</h1>
		<hr>
		<a href="admin.php">
				<button class="btn btn-info ml-auto">ADMIN</button>
		</a>
		<hr>
	</div>

	<div class="container ">

		<div class="col-md-" id="alert-box">
			
		</div>

		<div class="col-md-">
			<form class="insert-form" method="post" action="">
				<label for="tablename">Invoice Name :</label>
				<input class="form-control" type="text" name="tablename" id="tablename" placeholder="Eg : Nuvatic1001">
				<center>
					<button class="btn btn-success m-3" type="submit" name="new">Create</button>
				</center>
			</form>
		</div>
		
		
	</div>




	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>