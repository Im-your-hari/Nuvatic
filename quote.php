<?php
    include("config.php");
    include("ainwords.php");
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

    $custAddress = "select customerAddress,customerPhone,deliveryNote from customeraddress where tablename='$tablename'";
    $res = mysqli_query($conn,$custAddress);
    $addrow=mysqli_fetch_assoc($res);
    //echo $addrow['customerAddress'];

    
    $content='<!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
        /* ********A4******** */
    
        body {
          background: rgb(255, 255, 255);
        }
    
        page {
          background: white;
          display: block;
          margin: 0 auto;
          margin-bottom: 0.5cm;
        }
    
        page[size="A4"] {
          width: 21cm;
          height: 29.7cm;
        }
    
        @media print {
    
          body,
          page {
            margin: 0;
            box-shadow: 0;
          }
        }
    
        /* ********A4******** */
        .quot {
          width: 100%;
          height: 1000px;
        }
    
        .center {
          margin: auto;
          width: 95%;
        }
    
        .header {
          width: 100%;
          text-align: center;
          height: 50px;
          color: #181d61;
        }
    
        .head1 {
          float: left;
        }
    
        .head2 {
          float: right;
        }
    
    
        .brdr {
          border: 2px solid black;
          width: 400px;
          height: auto;
        }
    
    
        .brdr2 {
          border: 2px solid black;
          width: 100%;
          height: auto;
        }
    
        .brdr4 {
          border: 2px solid black;
          width: 100%;
          height: auto;
        }
    
        .brdr0 {
          border: 2px solid black;
          text-align: center;
        }
    
        .bluehead {
          background-color: #181d61;
          color: white;
          font-size: x-small;
          font-family: Arial, Helvetica, sans-serif;
        }
    
        .contents {
          font-size: x-small;
          color: rgb(39, 39, 160);
        }
    
        .img {
          align-items: center;
        }
      </style>
    </head>
    
    <body>
      <page size="A4">
        <section class="quot center ">
          <div>
            <div class="header" style="padding-bottom: 30px;">
              <h3 class="">NUVATIC ELECTRICAL EQUIPMENT TRADING </h3>
              <h4 style="margin: -20px;">TEL: 02 677 3688 P.O BOX NUMBER : 133189 MUSSFAH 44 ABU DHABI</h4>
            </div>
            <div class="table1 contents">
              <table style="width: 100%; border-spacing: 0px 60px;">
                <tr>
                  <td style="text-align: center;">
                    <img src="logo.PNG" width="85px" height="85px">
                  </td>
                  <td style="position: relative;">
                    <div class="table1" style="position:absolute;
                    top:0;
                    right:0; width: 50%;">
                      <table class="brdr " style="float: right; border-collapse: collapse; width:100%;">
                        <tr>
                          <td style="border-right: 2px solid black;">Date</td>
                          <td>'. date("d-m-Y") .'</td>
                        </tr>
                        <tr>
                          <td style="border-right: 2px solid black;">Valid Until</td>
                          <td>'. date('d-m-Y', strtotime('+15 days')) .'</td>
                        </tr>
                        <tr>
                          <td style="border-right: 2px solid black;">Quote #</td>
                          <!--td>EE - 465</td-->
                        </tr>
                        <tr>
                          <td style="border-right: 2px solid black;">Customer ID</td>
                          <!--td>EE - 949</td-->
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="table2 ">
                      <table class="brdr" style="border-collapse: collapse; width: 100%; min-height: 130px; height: 130px;">
                        <tr>
                          <th class="brdr bluehead">Customer</th>
                        </tr>
                        <tr rowspan=5>
                          <td>'.$addrow["customerAddress"].'</td>
                        </tr>
                        <!--tr>
                          <td>M/S:EMARAT EUROPE FACTORY</td>
                        </tr>
                        <tr>
                          <td>ABU DHABI</td>
                        </tr>
                        <tr>
                          <td>UAE</td>
                        </tr>
                        <tr>
                          <td>PH: (+971) 2 5500700</td>
                        </tr-->
                      </table>
                    </div>
                  </td>
                  <td>
                    <div class="table3 ">
                      <table class="brdr2" style="border-collapse: collapse;width: 100%; height: 130px;">
                        <tr>
                          <th class="brdr bluehead">Quote/Project Description</th>
                        </tr>
                        <tr>
                          <td style="height: 105px;"></td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            
                <div class="table4 contents">
                  <table class="brdr4" style="border-collapse: collapse">
                    <tr>
                      <th class="bluehead brdr0">SL NO.</th>
                      <th class="bluehead brdr0">DESCRIPTION</th>
                      <th class="bluehead brdr0">UNIT</th>
                      <th class="bluehead brdr0">QTY</th>
                      <th class="bluehead brdr0">U.PRICE</th>
                      <th class="bluehead brdr0">AMOUNT</th>
                      <th style="width: 125px;" class="bluehead brdr0">EXW avaliable by</th>
                    </tr>
                    <!--tr>
                      <td class="brdr0">1</td>
                      <td class="brdr0">FLEXIBLE HOSE 3FEET</td>
                      <td class="brdr0">NOS</td>
                      <td class="brdr0">8</td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">8.00</p>
                        </div>
                      </td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">64.00</p>
                        </div>
                      </td>
                      <td class="brdr0">EX STOCK </td>
                    </tr>
                    <tr>
                      <td class="brdr0">2</td>
                      <td class="brdr0">FLEXIBLE HOSE 2 FEET </td>
                      <td class="brdr0">NOS</td>
                      <td class="brdr0">8</td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">7.00</p>
                        </div>
                      </td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">56.00</p>
                        </div>
                      </td>
                      <td class="brdr0">EX STOCK </td>
                    </tr-->'
                    ;
                    $i=1;
                    while($row=mysqli_fetch_assoc($result)){
                    
                        $content.='
                    <tr>
                      <td class="brdr0">'.$i.'</td>
                      <td class="brdr0">'.$row['product'].'</td>
                      <td class="brdr0">NOS</td>
                      <td class="brdr0">'.$row['unit'].'</td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">'.$row['price'].'</p>
                        </div>
                      </td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">'.($row['price']*$row['unit']).'</p>
                        </div>
                      </td>
                      <td class="brdr0">'.$row['available'].'</td>
                    </tr>';
                    $total +=($row['price']*$row['unit']);
                    $vat += (($row['price']*$row['unit'])/100);
                    $i+=1;
                    }
                    $i=1;
                    
                    $content.='
                    <tr>
                      <th class="bluehead" colspan="4">Special Notes and Instructions</th>
                      <td class="brdr0" style="text-align: center;">SUB TOTAL</td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">'.$total.'</p>
                        </div>
                      </td>
                      <td class="bluehead"></td>
                    </tr>
                    <tr>
                      <td class="" colspan="4">Payment details :60 DAYS</td>
                      <td class="brdr0" style="text-align: center; height: 50px;">VAT</td>
                      <td class="brdr0" style="text-align: center;">5%</td>
                      <td class="bluehead"></td>
                    </tr>
                    <tr>
                      <td class="" colspan="4">Delivery Lead Time: 2-3 working days after confirmation</td>
                      <td class="brdr0" style="text-align: center;">VAT RATE</td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">'.$vat.'</p>
                        </div>
                      </td>
                      <td class="bluehead"></td>
                    </tr>
                    <tr>
                      <td class="" colspan="4">Prices are based on delivery at site with in UAE</td>
                      <td class="brdr0" style="text-align: center;">Total</td>
                      <td class="brdr0">
                        <div>
                          <p class="head1">AED</p>
                          <p class="head2">'.($total+$vat).'</p>
                        </div>
                      </td>
                      <td class="bluehead"></td>
                    </tr>
                    <tr>
                      <td colspan="7" class="bluehead" style="text-align: center;">If you have any questions about this
                        price quote ,please contact RAVEENA ,phone:0551423029,Email:nuvatic@emirates.net.ae</td>
                    </tr>
                    <tr>
                      <td colspan="7" class="bluehead" style="text-align: center;">Thank you for your business!</td>
                    </tr>
                  </table>
                </div>
          </div>
        </section>
      </page>
    </body>
    
    </html>';

$mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($content);
        //$file=time().'.pdf';
        $file= trim($tablename)."_invo".'.pdf';
        $mpdf->output($file,'D');
?>