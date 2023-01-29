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

	/*if(isset($_POST['new'])){
		$tablename = $_POST["tablename"];
		$newtable = "create table ".$tablename."(product varchar(25),price int,unit int,date date)";
		$res = mysqli_query($conn,$newtable);
		if(!$res){
			//header("Location: index.php");
			echo "Error..!";
		}
	}*/

	$tablename = $_GET["bill"];

	//$newtable = "create table ".$tablename."(product varchar(25),price int,unit int,date date)";
	//$res = mysqli_query($conn,$newtable);
	//if(!$res){
		//header("Location: index.php");
	//	echo "Error..!";
	//}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<title>Bill : Nuatic</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function () {

		var html = '<tr><th><input type="text" class="form-control" name="product[]" required></th><th><input type="number" class="form-control" name="price[]" required></th><th><input type="number" class="form-control" name="unit[]" required></th><th><input type="date" class="form-control" name="date[]" required></th><th><input type="button" class="btn btn-danger text-white" name="remove" id="remove" value="REMOVE"></th></tr>';

		var x = 1;

		$("#addButton").click(function(){
			$("#table_field").append(html)
		});

		$("#table_field").on('click','#remove',function(){
			$(this).closest('tr').remove()
		});

		
	});
</script>


</head>
<body>
	<div class="container">
		<hr>
		<h1 class="text-center text-info">Nuatic Billing</h1>
		<hr>
		<a href="index.php">
				<button class="btn btn-info ml-auto">HOME</button>
		</a>
		<?php
		//echo $tablename;
		echo '<form class="insert-form" id="insert_form" method="post" action="insert.php?bill='.$tablename.'">';
		//echo $tablename;
			?>
			<hr>
			<div class="input-field">
				<!--label><?php echo $tablename; ?></label-->
				<table class="table table-bordered" id="table_field">
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Unit</th>
						<th>Date</th>
						<th>#</th>
					</tr>

					<?php
						
						/*
						if(isset($_POST['save'])){

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
									header("Location: billpage.php");
									//header("Location: index.php"); Ithaanu main page
								}
								else{
									echo "<div class='alert alert-danger' role='alert'>Error while adding items..Try again..!</div>";
									sleep(2);
									header("Location: billpage.php");
								}
							}

							

						}*/

					?>


					<tr>
						<th><input type="text" class="form-control" name="product[]" required></th>
						<th><input type="number" class="form-control" name="price[]" required></th>
						<th><input type="number" class="form-control" name="unit[]" required></th>
						<th><input type="date" class="form-control" name="date[]" required></th>
						<th><input type="button" class="btn btn-warning text-white" name="add" id="addButton" value="ADD"></th>
					</tr>
				</table>
				<center>
					<input type="hidden" name="tablename" value="<?php $tablename; ?>">
					<th><input type="submit" class="btn btn-success text-white" name="save" id="save" value="Submit"></th>
					<th><input type="reset" class="btn btn-dark text-white" name="reset" id="reset" value="Reset"></th>
				</center>
			</div>

		</form>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>


</html>

