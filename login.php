<?php
	include("config.php");
	session_start();


	if(isset($_POST['login'])){

		$username = $_POST['username'];
		$password = $_POST['password'];


		$sql = "select * from users";
		$result = mysqli_query($conn,$sql);
		if($result){
			$i=0;
			while($row=mysqli_fetch_assoc($result)){
				//Checking for correct username and password
				if($row['username']==$username && $row['password']==$password){
					//Login Success
					$_SESSION['nuatic_login']="true";
					$_SESSION['nuatic_username']=$username;
					$i=0;
					//echo $row['username']."->".$row['password']."<br>";
					header('Location: index.php');
					break;

				}else{
					$i++;
					$_SESSION['nuatic_login']="false";
				}
			}
			if($i>0){
				echo "<script>alert('Invalid username or password..!');</script>";
				header('Location: login.php');
			}

		}else{
			echo "Some error has occured..!";
		}

	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login : Nuvatic</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	<style type="text/css">
		.divider:after,
		.divider:before {
			content: "";
			flex: 1;
			height: 1px;
			background: #eee;
		}
		.h-custom {
			height: calc(100% - 73px);
		}
		@media (max-width: 450px) {
			.h-custom {
				height: 100%;
			}
		}
		.text-blue{
			color : #003399;
		}
		.btn-grad{
			background: linear-gradient(#3399ff,#003399);
			color : #ffcc00 ;
		}
		.btn-grad:hover{
			color: #ffff00;
		}
		.tfont{
			color : #003399;
			font-family:sans-serif;
			font-style: bold;
		}
	</style>


</head>
<body>
	<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="nuvatic.jpg"
          class="img-fluid" alt="Nuvatic" id="nuaimage">
        <label for="nuaimage" class="text-center text-blue tfont text-fluid"><h2>Nuvatic Electrical Equipments Trading : UAE<h2></label>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <!--h4 class="lead fw-normal mb-0 me-3">Sign In</h4-->
            <h4 class="fw-normal mb-0 me-3 text-blue">Sign In</h4>
            
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0"></p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
          	<label class="form-label" for="form3Example3">Username</label>
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter username" name="username" required />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password" required />
            
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0"></p>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-grad btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login" >LOGIN</button>
            
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
<br><br>
</body>
</html>