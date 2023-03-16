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

    
    $content='<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
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
        .invo {
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            height: 1500px;
            font-size: x-small
        }

        .center {
            margin: auto;
            width: 95%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;

        }

        td {
            white-space: nowrap;
        }

        .no_br {
            border-top: none;
            border-bottom: none;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            width: 80%;
        }
    </style>
</head>

<body>
    <page size="A4">
        <section class="invo center">
            <div class="header" style="text-align: center; padding: 15px;">
                <div class="image" style="display: inline-block; "><img style="margin-bottom: -40px;" src="logo.PNG"
                        width="80px" height="80px"></div>
                <div class="heading" style="display: inline-block;">
                    <h5
                        style="color: rgb(40, 40, 117); font-size: 25px; font-family:Cambria, Cochin, Georgia, Times, '.'Times New Roman'.', serif">
                        Nuvatic Electrical Equipment Trading</h5>
                </div>
            </div>
            <div style="width: 100%; text-align: center; padding-bottom: 10px; margin-bottom: -20px;" class="tableName">
                <h4>Tax Invoice</h6>
            </div>
            <div class="table1" style="width: 100%;">
                <table style="width:100%">
                    <tr>
                        <td colspan="2" rowspan="3">
                            <p>
                                <b>Nuvatic Electrical Equipment Trading</b><br>
                                Po Box: 12536, Mussafah 44<br>
                                Tel: +97126773688<br>
                                Emirate: Abu Dhabi<br>
                                TRN: 100541904700003
                            </p>
                        </td>
                        <td>
                            <p>Invoice Name<br><b>'.$tablename.'</b></p>
                        </td>
                        <td>
                            <p>Dated<br><b>'.date("d-m-Y").'</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Delivery Note<br><b>'.$addrow["deliveryNote"].'</b></p>
                        </td>
                        <td>
                            <p>Mode/Terms of Payment<br><b>30 Days</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 60px;">
                            <p style="margin-top: -1px;">Supplier'."'".'s Ref</p>
                        </td>
                        <td>
                            <p style="margin-top: -1px;">Other References(s)</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="4">
                            <p style="margin-top: -100px;">Buyer</p>
                            <p><br>
                                <b>'.$addrow["customerAddress"].'<br>
                                
                            <div style="margin-top: -10px;">
                                <div class="grid-container">
                                    <div>Emirate : Dubai</div>
                                    <!--div>: Dubai</div-->
                                    <div>Country : UAE</div>
                                    <!--div>: UAE</div-->
                                    <div>TRN : 10031362210003</div>
                                    <!--div>: 10031362210003</div-->
                                    <div>Place of supply : UAE, Abu Dhabi</div>
                                    <!--div>: UAE, Abu Dhabi</div-->
                                </div>
                            </div>
                            </p>
                        </td>
                        <td>
                            <p>Buyer'."'".'s Order No.<br><b>2400120034</b></p>
                        </td>
                        <td>
                            <p>Dated<br><b>'. date("d-m-Y") .'</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-top: -5px;">Despatch Document No.</p>
                        </td>
                        <td>
                            <p>Delivery Note Date<br><b>27-Jan-23</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 60px;">
                            <p style="margin-top: -1px;">Despatched through</p>
                        </td>
                        <td>
                            <p style="margin-top: -1px;">Destination</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height: 120px;">
                            <p style="margin-top: -60px;">Terms of Delivery</p>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;" class="no_br">
                    <tr>
                        <th>SL<br>No</th>
                        <th>Description of Goods</th>
                        <th>Quality</th>
                        <th>Rate</th>
                        <th>per</th>
                        <th>VAT<br>%</th>
                        <th>Amount</th>
                        <th>Taxable<br>Vlaue(AED)</th>
                        <th>VAT<br>(AED)</th>
                    </tr>'
                    ;
                    $i=1;
                    while($row=mysqli_fetch_assoc($result)){
                    
                        $content.='<tr>
                        <td class="no_br">'.$i.'</td>
                        <td class="no_br"><b>'.$row['product'].'</b></td>
                        <td class="no_br"><b>'.$row['unit'].'</b></td>
                        <td class="no_br">'.$row['price'].'</td>
                        <td class="no_br">NOS</td>
                        <td class="no_br">5 %</td>
                        <td class="no_br"><b>'.($row['price']*$row['unit']).'</b></td>
                        <td class="no_br">'.($row['price']*$row['unit']).'</td>
                        <td class="no_br">'.(($row['price']*$row['unit'])/100).'</td>
                    </tr>';
                    $total +=($row['price']*$row['unit']);
                    $vat += (($row['price']*$row['unit'])/100);
                    $i+=1;
                    }
                    $i=1;
                    
                    $content.='<tr>
                        <!-- for spacing need only-->
                        <td class="no_br" style="height: 60px;"></td>
                        <td class="no_br"></td>
                        <td class="no_br"></td>
                        <td class="no_br"></td>
                        <td class="no_br"></td>
                        <td class="no_br"></td>
                        <td class="no_br"></td>
                        <td class="no_br"></td>
                        <td class="no_br"></td>
                    </tr>
                    <tr>
                        <td colspan="9">
                            <div style="float: left;">
                                <p style="height: 200px;">Amount Chargeable(in words)<br>
                                    <b>'.getCurrency($total).'</b>
                                    <br>VAT Amount (in words)<br>
                                    <b>'.getCurrency($vat).'</b>
                                <div style="width: 50px;"></div>
                                <p><u>Declaration</u></p>
                                <div style="width: 400px;">We declare that this invoice shows the actual price of
                                    the<br> goods described and that all particulars are true and correct</div>
                                </p>
                            </div>
                            <div style="float: right;" style=" width: 100%;">
                                <div class="grid-container"
                                    style="margin-top: -2px; margin-right: -2px; width: 300px; border: 1px solid black;">
                                    <div>Taxable Value</div>
                                    <div>'.$total.'</div>
                                    <div>Value Added Tax 5%</div>
                                    <div>'.$vat.'</div>
                                    <div style="border-top: 1px solid; border-bottom: 1px solid;"><b>Invoice Total</b>
                                    </div>
                                    <div style="border-top: 1px solid; border-bottom: 1px solid;"><b>'.($total+$vat).'</b></div>


                                </div>
                                <div style="float: right;">E. & O.E</div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p style="margin-top: -30px;">Customer'."'".'s Seal and Signature</p>
                        </td>
                        <td colspan="4">
                            <div>
                                <div>
                                    <p style="float: right; margin-top: -1px;">for Nuvatic Electrical Equipment Trading
                                    </p>
                                </div>
                                <div>
                                    <p style="float: right; margin-top: 20px;">Authorised Signatory</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <div>
                    <p style="width: 100%; text-align: center;" class="center">This is a Computer Generated invoice</p>
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