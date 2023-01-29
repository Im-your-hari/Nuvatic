<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>
<body>



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

							$tablename = trim($_GET['bill']);
							echo "this is".$tablename."table";
//if(isset($_POST['save'])){


							$product = $_POST['product'];
							$price = $_POST['price'];
							$unit = $_POST['unit'];
							$date = $_POST['date'];

							//Ivide demo database change aaki new table varanam..Ath bill number aavanam...

							foreach ($product as $key => $value) {
								$save = "insert into ".$tablename." values(
										'".$value."','".$price[$key]."','".$unit[$key]."','".$date[$key]."')";

								$query = mysqli_query($conn,$save);
								if($query){
									//Ivide 3 pdf export cheyyanulla codes add cheyyanm from database using select * from tablename and while and row fetch_assoc
									echo "<div class='alert alert-info' role='alert'>Products Added Succesfull..!</div>";
									sleep(2);
									//header("Location: billpage.php");
									header("Location: index.php"); //Ithaanu main page
								}
								else{
									echo "<div class='alert alert-danger' role='alert'>Error while adding items..Try again..!</div>";
									sleep(2);
									header("Location: billpage.php?bill=".$tablename."");
								}
							}

							

						//}

?>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>