<?php
    include("config.php");
	session_start();

    require('vendor/autoload.php');


	//$_SESSION['nuatic_login']="true";
	if($_SESSION['nuatic_login']!="true"){
		header("Location: login.php");
	}
	else{
		$bill_user = $_SESSION['nuatic_username'];
	}

	$tablename = $_GET['name'];
    $total = 0;

	$sql = "select * from ".$tablename;
	$result = mysqli_query($conn,$sql);

    $custAddress = "select customerAddress,customerPhone from customeraddress where tablename='$tablename'";
    $res = mysqli_query($conn,$custAddress);
    $addrow=mysqli_fetch_assoc($res);
    //echo $addrow['customerAddress'];

    $content = '<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <title>Nuatic : Invoice</title>
        <style>
            body{
                background-color: #ffffff; 
                margin: 0;
                padding: 0;
            }
            h1,h2,h3,h4,h5,h6{
                margin: 0;
                padding: 0;
            }
            p{
                margin: 0;
                padding: 0;
            }
            .container{
                width: 100%;
                margin-right: auto;
                margin-left: auto;
            }
            .brand-section{
               background-color: #0d1033;
               padding: 10px 40px;
            }
            .logo{
                padding-top: 6px;
                width: 30%;
                border-radius: 32px;
            }
    
            .row{
                display: flex;
                flex-wrap: wrap;
            }
            .col-6{
                width: 50%;
                flex: 0 0 auto;
            }
            .text-white{
                color: #fff;
            }
            .company-details{
                float: right;
                text-align: right;
            }
            .body-section{
                padding: 16px;
                border: 1px solid #0d1033;
            }
            .heading{
                font-size: 20px;
                margin-bottom: 08px;
            }
            .sub-heading{
                color: #262626;
                margin-bottom: 05px;
            }
            table{
                background-color: #fff;
                width: 100%;
                border-collapse: collapse;
            }
            table thead tr{
                border: 1px solid #111;
                background-color: #e0ecff;
            }
            table td {
                vertical-align: middle !important;
                text-align: center;
            }
            table th, table td {
                padding-top: 08px;
                padding-bottom: 08px;
            }
            .table-bordered{
                box-shadow: 0px 0px 5px 0.5px #e0ecff;
            }
            .table-bordered td, .table-bordered th {
                border: 1px solid #dee2e6;
            }
            .text-right{
                text-align: end;
            }
            .w-20{
                width: 20%;
            }
            .float-right{
                float: right;
            }
        </style>
    </head>
    <body>
    
        <div class="container">
            <div class="brand-section">
                <div class="row">
                    <div class="col-6">
                        <!--h1 class="text-white">Nuvatic</h1-->
                        <img src="nuvatic.jpg" class="logo">
                        
                    </div>
                    <div class="col-6">
                        <div class="company-details">
                            <h2 class="text-white">Nuvatic Electrical Equipments Company</h2>
                            <h3 class="text-white">Address line</h3>
                            <h3 class="text-white">UAE</h3>
                            <h3 class="text-white">+91 888555XXXX</h3>
                            <h3 class="text-white">contact@nuvatic.ae</h3>
                            <h3 class="text-white">Reg No.: Ae1235</h3>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="body-section">
                <div class="row">
                    <div class="col-6">
                        <h2 class="heading">Invoice Name :'.$tablename.'</h2>
                        <p class="sub-heading">Order Date: 20-20-2021 </p>
                        
                    </div>
                    <div class="col-6">
                        <!--p class="sub-heading"><b>Full Name :</b>  Customer name</p-->
                        <p class="sub-heading"><b>Address :</b>  '.$addrow["customerAddress"].' </p>
                        <p class="sub-heading"><b>Phone Number :</b>  '.$addrow["customerPhone"].'</p>
                        <!--p class="sub-heading"><b>City,State,Pincode :</b>  </p-->
                    </div>
                </div>
            </div>
    
    ';

    $content.='<div class="body-section">
    <h3 class="heading">Ordered Items</h3>
    <br>
    <table class="table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th class="w-20">Price</th>
                <th class="w-20">Quantity</th>
                <th class="w-20">Grandtotal</th>
            </tr>
        </thead>
        <tbody>';
            
        while($row=mysqli_fetch_assoc($result)){

            $content.="<tr>
            <td>".$row['product']."</td>
            <td>".$row['price']."</td>
            <td>".$row['unit']."</td>
            <td>".($row['price']*$row['unit'])."</td>
        </tr>";
        $total +=($row['price']*$row['unit']);

        }
            
            
            
            $content.='<tr>
                <td colspan="3" class="text-right">Sub Total</td>
                <td>'.$total.'</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right">Tax Total %1X</td>
                <td> 2</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right">Grand Total</td>
                <td> '.$total.'.XX</td>
            </tr>
        </tbody>
    </table>
    <br>
    <h3 class="heading">Payment Status: Paid</h3>
    <h3 class="heading">Payment Mode: Cash on Delivery</h3>
</div><div class="body-section">
<center>
<h3 style="color:gray;">Thanks, Visit again</h3>
</div>      
</div>      

</body>
</html>
';


        //echo $content;
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($content);
        //$file=time().'.pdf';
        $file= trim($tablename)."_Invoice".'.pdf';
        $mpdf->output($file,'D');
?>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuatic : Invoice</title>
    <style>
        body{
            background-color: #ffffff; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            padding-top: 6px;
            width: 30%;
            border-radius: 32px;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid #0d1033;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #e0ecff;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px #e0ecff;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <!--h1 class="text-white">Nuvatic</h1--><!--
                    <img src="nuvatic.jpg" class="logo">
                    
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <h2 class="text-white">Nuvatic Electrical Equipments Company</h2>
                        <h3 class="text-white">Address line</h3>
                        <h3 class="text-white">UAE</h3>
                        <h3 class="text-white">+91 888555XXXX</h3>
                        <h3 class="text-white">contact@nuvatic.ae</h3>
                        <h3 class="text-white">Reg No.: Ae1235</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice Name : </h2>
                    <!--p class="sub-heading">Tracking No. fabcart2025 </p--><!--
                    <p class="sub-heading">Order Date: 20-20-2021 </p>
                    <p class="sub-heading">Email Address: customer@gfmail.com </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading"><b>Full Name :</b>  Customer name</p>
                    <p class="sub-heading"><b>Address :</b>  Customer Address </p>
                    <p class="sub-heading"><b>Phone Number :</b>  +91 8157096325</p>
                    <p class="sub-heading"><b>City,State,Pincode :</b>  </p>
                </div>
            </div>
        </div>
        <!-- next part --><!--
        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product Name</td>
                        <td>10</td>
                        <td>1</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td> 10.XX</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Tax Total %1X</td>
                        <td> 2</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td> 12.XX</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
        </div>
        <!--Next section--><!--
        <div class="body-section">
            <center>
            <h3 style="color:gray;">Thanks, Visit again</h3>
        </div>      
    </div>      

</body>
</html>
