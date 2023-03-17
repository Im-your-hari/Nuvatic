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

$content = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
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
    .safepro1 {
        width: 100%;
    }

    .center {
        margin: auto;
        width: 95%;
    }

    .heading {
        width: 100%;
        height: 50px;
    }

    .head1 {
        float: center;
        justify-content : center;
        align-items : center;
        font-family:Cambria, Cochin, Georgia, Times, '.'Times New Roman'.', serif;
        font-size : 14px;
        
    }

    .head2 {
        float: right;
    }

    .contents {
        font-size: x-small;
        color: rgb(39, 39, 160);
    }


    hr {
        border: 1px solid;
        color: black;
    }

    .bluehead {
        background-color: #171a46;
        color: white;
        font-size: small;
        font-family: Arial, Helvetica, sans-serif;
    }

    .brdr {
        border: 2px solid black;
    }

    .brdr2 {
        border: 2px solid black;
        text-align: center;
        padding: 15px;
    }

    .brdr3 {
        border: 2px solid black;
        text-align: center;
        padding: 15px;
    }

</style>

<body>
    <page size="A4">
        <section class="safepro1 center contents">
            <div class="a1">
                <div class="heading" style="font-family:'.'Franklin Gothic Medium'.', '.'Arial Narrow'.', Arial, sans-serif">

                
                <div class="head1">
                <!--img src="logo.PNG" width="80px" height="80px"
                style="float:center;justify-content:center;"--><h1>NUVATIC ELECTRICAL EQUIPMENT TRADING</h1>
                        <!--div class="center" style="padding: 100px; width: auto;">
                                        
                                    </div-->
                    </div>
                    <div class="head2" style="margin-left:430px;">
                        <h2>LOCAL PURCHASE ORDER</h2>
                    </div>
                </div>
                <div class="">
                    <div class="table-up">
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <p style="height:10px;"><b>CUSTOMER</b>
                                        <p>
                                            <hr>
                                        <div class="t1">
                                            <table cellspacing="0" cellpadding="0" style="width: 100%; border: none;">
                                                <!--tr>
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
                                                </tr-->
                                                <tr>
                                                    <td>'.$addrow["customerAddress"].'</td>
                                                    <!--td>UAE</td-->
                                                </tr>
                                                <tr>
                                                    <td>Contact number : '.$addrow["customerPhone"].'</td>
                                                    <!--td>559456995</td-->
                                                </tr>
                                                <!--tr>
                                                    <td>Email :</td>
                                                    <td></td>
                                                </tr-->
                                            </table>
                                        </div>
                                </td>
                                <td  style="">
                                    <table class="kk"
                                        style=" border: 1px solid ;border-collapse: collapse; width: 70%; float: right;">
                                        <tr>
                                            <td class="brdr">DATE </td>
                                            <td class="brdr">'.date("d-m-Y").'</td>
                                        </tr>
                                        <tr>
                                            <td class="brdr">PAYMENT TERMS</td>
                                            <td class="brdr"></td>
                                        </tr>
                                        <tr>
                                            <td class="brdr">PO NUMBER</td>
                                            <td class="brdr"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="margin-bottom: 5px;"><b>SHIP TO</b></p>
                            <hr>
                            <div class="t2">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width:100%">ATTN: Name : ABHILASH SOMAN </td>
                                        <!--td style="width:75%">ABHILASH SOMAN </td-->
                                    </tr>
                                    <tr>
                                        <td>Company Name : NUVATIC ELECTRICAL EQUIPMENT TRADING </td>
                                        <!--td>NUVATIC ELECTRICAL EQUIPMENT TRADING </td-->
                                    </tr>
                                    <tr>
                                        <td>MUSSAFAH 44</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>ABU DHABI</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>PH : 02 6773688</td>
                                        <!--td>02 6773688</td-->
                                    </tr>
                                    <tr>
                                        <td>Email : <a>nuvatic@emirates.net.ae</a></td>
                                        <!--td><a>nuvatic@emirates.net.ae</a></td-->
                                    </tr>
                                    <tr>
                                        <td>TRN NO : 10054190470000</td>
                                        <!--td>100541904700003</td-->
                                    </tr>
                                </table>
                            </div>
                                </td>
                                <td>
                                    <div class="center" style="padding: 100px; width: auto;">
                                        <img src="logo.PNG" width="80px" height="80px"
                                            style="margin-top: -70px; margin-left: 70px;">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="btable">
                        <table class="kk" style="border-collapse: collapse; width: 100%;">
                            <tr>
                                <th class="bluehead brdr">DESCRIPTION</th>
                                <th class="bluehead brdr">SL NO.</th>
                                <th class="bluehead brdr">QTY</th>
                                <th class="bluehead brdr">UNIT</th>
                                <th class="bluehead brdr">UNIT PRICE</th>
                                <th class="bluehead brdr">TOTAL</th>
                            </tr>'
                            ;
                            $i=1;
                            while($row=mysqli_fetch_assoc($result)){
                            
                                $content.='
                            <tr>
                                <td class="brdr2">'.$i.'</td>
                                <td class="brdr2">'.$row['product'].'</td>
                                <td class="brdr2">'.$row['unit'].'</td>
                                <td class="brdr2">NOS</td>
                                <td class="brdr2">
                                    <div>
                                        <p class="head1">AED</p>
                                        <p class="head2">'.$row['price'].'</p>
                                    </div>
                                </td>
                                <td class="brdr2">
                                    <div>
                                        <p class="head1">AED</p>
                                        <p class="head2">'.($row['price']*$row['unit']).'</p>
                                    </div>
                                </td>
                            </tr>';
                            $total +=($row['price']*$row['unit']);
                            $vat += (($row['price']*$row['unit'])/100);
                            $i+=1;
                            }
                            $i=1;
                            
                            $content.='
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="brdr" style="text-align: center;">SUB TOTAL</td>
                                <td class="brdr">
                                    <div>
                                        <p class="head1">AED</p>
                                        <p class="head2">'.$total.'</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="brdr" style="text-align: center;">5%</td>
                                <td class="brdr">
                                    <div>
                                        <p class="head1">AED</p>
                                        <p class="head2">'.$vat.'</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="brdr" style="text-align: center;">TOTAL</td>
                                <td class="brdr">
                                    <div>
                                        <p class="head1">AED</p>
                                        <p class="head2">'.($total+$vat).'</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="ctable1" style="padding-top: 20px;">
                        <table class="kk brdr" style=" 
                        border-collapse: collapse; width: 100%;">
                            <tr>
                                <th class="brdr" style="text-align: left; padding-left: 20px; padding: 15px;">
                                    SPECIAL
                                    INSTRUCTION</th>
                            </tr>
                            <tr>
                                <td class="brdr">
                                    <div>
                                        <ol>
                                            <li>All Items Supplied Should Match Description As Above</li>
                                            <li>Material Delivery To Be Duly Obtained Acknowledge</li>
                                            <li>Original Delivery Notes or Time sheet and LPO To Be Submitted Along
                                                With
                                                Invoice</li>
                                            <li>Payments Only Against Original Invoice and Supporting Documents As
                                                Mentioned
                                                Above</li>
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
                                <td class="brdr3">'.date('d-m-Y').'</td>
                            </tr>
                        </table>
                    </div>
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