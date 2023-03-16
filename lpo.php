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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      /* ********A4******** */

      body {
            background: rgb(204, 204, 204);
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }
        body[size="A4"] {
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
      .safepro1{
        width: 100%;
      }
      .center {
        margin: auto;
        width: 95%;
      }
      .a{
        width: 100%;
        height: 560px;
      }
      .heading{
        width: 100%;
        height: 50px;
      }
      .head1{
        float: left;
      }
      .head2{
        float: right;
      }
      .grid-container {
        width: 100%;
        height: 100%;
        display: grid;
        grid-template-columns: 50% 20% 30% ;
      }
      .contents{
        font-size: smaller;
        color: rgb(39, 39, 160);
      }
      .b{
        margin-top: -120px;
        width: 100%;
        height: 360px;
      }
      .c{
        width: 100%;
        height: 600px;
      }
      hr{
        border: 1px solid;
        color: black;
      }
      .bluehead{
        background-color: #171a46;
        color: white;
        font-size:small;
        font-family:Arial, Helvetica, sans-serif;
      }
      .brdr{
        border: 2px solid black;
      }
      .brdr2{
        border: 2px solid black; text-align: center; padding: 30px;
      }
      .brdr3{
        border: 2px solid black; text-align: center; padding: 20px;
      }
    </style>
</head>
<body>
  <page size="A4">
  <section class="safepro1 center contents">
    <div class="a">
      <div class="a1">
        <div class="heading" style="font-family:'.'Franklin Gothic Medium'.','. 'Arial Narrow'.', Arial, sans-serif">
          <div class="head1"><h2>NUVATIC ELECTRICAL EQUIPMENT TRADING</h2></div>
          <div class="head2"><h2>PURCHASE ORDER</h2></div>
        </div>
        <div class="grid-container ">
          <div class="aleft item1">
            <div class="">
              <div>
                <p style="height:10px;"><b>CUSTOMER</b><p>
                <hr>
                <div class="t1">
                  <table cellspacing="0" cellpadding="0" style="width: 100%; border: none;">
                    <tr>
                      <td style="width:25%">ATTN: Name :</td>
                      <td style="width:75%">DINESH</td>
                    </tr>
                    <tr>
                      <td>Company Name :</td>
                      <td colspan="2">SAFEPRO</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>ABU DHABI</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>UAE</td>
                    </tr>
                    <tr>
                      <td>Contact number :</td>
                      <td>559456995</td>
                    </tr>
                    <tr>
                      <td>Email Address :</td>
                      <td></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div style="padding-top: 20px;">
                <p style="margin-bottom: 5px;"><b>SHIP TO</b></p>
                <hr>
                <div class="t2">
                  <table style="width: 100%;">
                    <tr>
                      <td style="width:25%">ATTN: Name :</td>
                      <td style="width:75%">ABHILASH SOMAN </td>
                    </tr>
                    <tr>
                      <td>Company Name :</td>
                      <td>NUVATIC ELECTRICAL EQUIPMENT TRADING </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>MUSSAFAH 44</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>ABU DHABI</td>
                    </tr>
                    <tr>
                      <td>PH :</td>
                      <td>02 6773688</td>
                    </tr>
                    <tr>
                      <td>Email Address  :</td>
                      <td><a>nuvatic@emirates.net.ae</a></td>
                    </tr>
                    <tr>
                      <td>TRN NO :</td>
                      <td>100541904700003</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="acenter item2 center" >
          
          </div>
          <div class="aright item3">
            <div class="t3">
              <table class="kk" style=" border: 1px solid ;  
              border-collapse: collapse; width: 100%;">
                <tr>
                  <td class="brdr">DATE :</td>
                  <td class="brdr">26-12-2022</td>
                </tr>
                <tr>
                  <td class="brdr">PAYMENT TERMS</td>
                  <td class="brdr"></td>
                </tr>
                <tr>
                  <td class="brdr">PO NUMBER</td>
                  <td class="brdr">P.O. NO. 4255 DEC  22</td>
                </tr>
              </table>
            </div>
            <div class="center" style="padding: 100px;">
              <img src="logo.PNG" width="100px" height="100px">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="b">
      <div class="btable">
              <table class="kk" style="border-collapse: collapse; width: 100%;">
                <tr>
                  <th class="bluehead brdr">DESCRIPTION</th>
                  <th class="bluehead brdr">SL NO.</th>
                  <th class="bluehead brdr">QTY</th>
                  <th class="bluehead brdr">UNIT</th>
                  <th class="bluehead brdr">UNIT PRICE</th>
                  <th class="bluehead brdr">TOTAL</th>
                </tr>
                <tr>
                  <td class="brdr2">1</td>
                  <td class="brdr2">REMOTE CONTROL PARKING LOCK</td>
                  <td class="brdr2">2</td>
                  <td class="brdr2">NOS</td>
                  <td class="brdr2"><div>
                    <p class="head1" >AED</p>
                    <p class="head2">285.00</p>
                  </div></td>
                  <td  class="brdr2"><div>
                    <p class="head1">AED</p>
                    <p class="head2">570.00</p>
                  </div></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="brdr" style="text-align: center;" >SUB TOTAL</td>
                  <td class="brdr" ><div>
                    <p class="head1">AED</p>
                    <p class="head2">570.00</p>
                  </div></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="brdr" style="text-align: center;" >5%</td>
                  <td class="brdr" ><div>
                    <p class="head1">AED</p>
                    <p class="head2">28.50</p>
                  </div></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="brdr" style="text-align: center;" >TOTAL</td>
                  <td class="brdr" ><div>
                    <p class="head1">AED</p>
                    <p class="head2">598.00</p>
                  </div></td>
                </tr>
              </table>
      </div>
    </div>
    <div class="c">
      <div class="ctable1">
        <table class="kk brdr" style=" 
              border-collapse: collapse; width: 100%;">
                <tr>
                  <th  class="brdr" style="text-align: left; padding-left: 20px; padding: 15px;">SPECIAL INSTRUCTION</th>
                </tr>
                <tr>
                  <td class="brdr" >
                    <div>
                      <ol>
                        <li>All Items Supplied Should Match Description As Above</li>
                        <li>Material Delivery To Be Duly Obtained Acknowledge</li>
                        <li>Original Delivery Notes or Time sheet and LPO To Be Submitted Along With Invoice</li>
                        <li>Payments Only Against Original Invoice and Supporting Documents As Mentioned Above</li>
                      </ol>
                    </div>
                  </td>
                </tr>
              </table>
      </div>
      <div class="ctable2" style="padding-top: 20px;">
        <table class="kk" style=" border: 2px solid black;  
              border-collapse: collapse; width: 100%; ">
                <tr>
                  <th class="brdr3">APPROVING PARTY</th>
                  <th class="brdr3">APPROVING PARTY SIGNATURE</th>
                  <th class="brdr3">DATE</th>
                </tr>
                <tr>
                  <td class="brdr3"></td>
                  <td class="brdr3"></td>
                  <td class="brdr3">12-26-2022</td>
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
$file= trim($tablename)."_lpo".'.pdf';
$mpdf->output($file,'D');
?>