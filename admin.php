<!--Admin page-->



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bills : Nuvatic</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>
<body>


	<div class="container">
		<hr>
		<h1 class="text-center text-info">Nuvatic : Admin</h1>
		<hr>
		<a href="index.php">
			<button class="btn btn-info ml-auto">HOME</button>
		</a>
		
		<hr>
	<center>
		<div class="col-lg-12 col-md-12">
		<table class="container table table-striped" align="center">
			<tr>
				<th>INVOICE NAME</th>
				<th>#</th>
				<th>#</th>
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

					$sql = "show tables";
					$result = mysqli_query($conn,$sql);
					if ($result) {
						while($row=mysqli_fetch_assoc($result)){
							if($row['Tables_in_nuvatic']=='products' || $row['Tables_in_nuvatic']=='users' || $row['Tables_in_nuvatic']=='customeraddress'){
								continue;
							}else{
								echo "<tr>";
								echo "<td>".$row['Tables_in_nuvatic']."<br></td>";
								
								echo "<td>
								<a href='viewbill.php?name=".$row['Tables_in_nuvatic']."'>
								<input type='button' class='btn btn-info text-white' name='view' id='view' value='VIEW'></a></td>";

								echo "<td>
								<a href='updatetable.php?name=".$row['Tables_in_nuvatic']."'>
								<input type='button' class='btn btn-warning text-white' name='update' id='update' value='UPDATE'></a></td>";

								echo "<td>
								<a href='deletetable.php?name=".$row['Tables_in_nuvatic']."'>
								<input type='button' class='btn btn-danger text-white' name='delete' id='delete' value='DELETE'></a></td>";
								echo "</tr>";
							}
							
						}
					}
				?>


</table>
		</div>
	</div>

</center>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>