<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Bill : Nuvatic</title>
</head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<body>
<div class="container">
        <hr>
        <h1 class="text-center text-info">Nuvatic : Update Bills</h1>
        <hr>
        <a href="javascript:history.go(-1)">
            <button class="btn btn-info ml-auto">BACK</button>
        </a>
        <hr>
    <center>



<?php
    
    ////////////////////////////////////////////////////////////////

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
    $prod = $_GET['product'];

    //echo $table;
    //echo "<br>";
    //echo $prod;
    //echo "<br>";

    //$sql = "update $table "
    $sql = "select * from ".trim($table)." where product='".trim($prod)."'";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    if($result){
        $row = mysqli_fetch_array($result);
        //echo $row['product']."<br>".$row['price']."<br>".$row["unit"];
        //while($row = mysqli_fetch_array($result)){
          //  echo $row['product']."<br>".$row['price']."<br>".$row["unit"];
        //}
        echo "<form action='' method='post'>";
        echo "<input type='text' class='form-control' value=".$row['product']." name='uproduct' placeholder='Product' required><br>";
        echo "<input type='text' class='form-control' value=".$row['price']." name='uprice' placeholder='Price' required><br>";
        echo "<input type='text' class='form-control' value=".$row['unit']." name='uunit' placeholder='Unit' required><br>";
        echo "<input type='submit' class='btn btn-warning text-white' name='UPDATE' value='UPDATE'></form>";
        
    }else{
        echo "Some error occured";
        echo $result;
        header("location: admin.php");
    }

    if(isset($_POST['UPDATE'])){
        //echo "Update table";
        $updt = "update $table set product='".$_POST['uproduct']."',price=".$_POST['uprice'].",unit=".$_POST['uunit']." where product='".$row['product']."'";
        //echo "<br>";
        //echo $updt;
        $res = mysqli_query($conn,$updt);
        if($res){
            echo "<script>alert('Update Successfull..!');</script>";
            header("location: admin.php?<script>alert('Update Successfull..!');</script>");
        }else{
            echo "<script>alert('Update Failed..Try again..!');</script>";
            header("location: admin.php");
        }

    }



?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>