<?php
session_start();
require('connection.inc.php');
$email = $_SESSION['email'];
?>
<?php
require('connection.inc.php');
include('vendor_pdf/vendor/autoload.php');
require 'vendor_/vendor/autoload.php';
require('functions.inc.php');
require('add_to_cart.inc.php');

ob_start();  // start output buffering
$uid = $_SESSION['USER_ID'];
?>

<?php 

if (isset($_POST)) {
        $order_id = (int)$_POST['o_id'];
        
    
}


$uid = $_SESSION['USER_ID'];
$res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
$fet = mysqli_fetch_all($res, MYSQLI_ASSOC);
print_r($fet);

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style type="text/css">
        .tabcontainer {
            overflow-x: auto;
        }

        .tab {
            width: 80%;
            text-align: center;
            margin: auto;
            border-collapse: collapse;
            border-width: 1px;
            border-color: white;
            border-style: solid;

        }


        .tab tr:first-child,
        th {
            /* color: white; */
            padding: 0.3rem;
            /* background-color: tomato; */

        }

        @media screen and (max-width:850px) {
            .head {
                flex-direction: column;
                align-items: center;
            }

            .head h1 {
                margin-bottom: 1rem;
                text-align: center;
            }

            nav ul {
                flex-direction: column;
                text-align: center;


            }

        }

        td,
        th {
            border-width: 0.1rem;
            /* border-color:none; */
            /* border-style: solid; */
        }

        td,
        th {
            font-size: 1.2rem;
            padding: 0.4rem;
        }
    </style>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            /* background-color: greenyellow; */
            align-items: center;
        }

        .first_part {
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .f22 {
            margin: 0;

        }

        .fourth_part {
            border: 2px solid black;
        }
    </style>

</head>

<body>
    <?php
    
    if (isset($_POST)) {
        $o_id = (int)$_POST['o_id'];
    }
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();

$res_sql = mysqli_query($con, "select `order`.* from `order` where `order`.id='$order_id' ");

// $res_sql=mysqli_query($con,$sql);
$fet_sql = mysqli_fetch_assoc($res_sql);

$date_time=explode(' ',$fet_sql['added_on']);
$address_id=(int)$fet_sql['address_id'];
$address_sql=mysqli_query($con,"select * from address where id='$address_id' ");
$fet_address_sql = mysqli_fetch_assoc($address_sql);
print_r($fet)

    ?>

    <div class="main">
        <div class="first_part">
            <h1 style="width: 50%;float: left;">Invoice </h1>
            <h1 style="width: 50%;float: left;">
                <?php
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($o_id, $generator::TYPE_CODE_128)) . '">';

                ?>
            </h1>
            <div class="f2">
                <div style="width: 50%;float: left;" class="f21">
                    <h4 style="margin:0">Service number: 123456789</h4>
                    <h4 style="margin:0">xyz number: 2833-3433-3322534</h4>
                    <h4 style="margin:0">Transaction: Inter-State</h4>
                    <h4 style="margin:0">Supply to : TamilNadu</h4>
                </div>
                <div style="width: 50%;float: left;" class="f22">
                    <h4 style="margin:0">PacketId:
                        <?= $order_id ?>
                    </h4>
                    <h4 style="margin:0">Invoice Date: <?= $date_time[0] ?></h4>
                    <h4 style="margin:0">Ordered Date: <?= $date_time[0] ?></h4>
                    <h4 style="margin:0">Nature of supply: Goods</h4>
                </div>
            </div>
        </div><br>
        <hr style="width: 100%;color:black;height:2px">
        <div class="second_part">
            <div style="width: 50%;float: left;" class="s11">
                <h3 style="margin:0">Deliver to/Ship to:</h3>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['address']?></h4>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['pincode']?></h4>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['city']?></h4>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['state']?></h4>
                <br>
                <p style="margin:0"><b> Customer type:</b>unregistered</p>
            </div>
            <div style="width: 50%;float: left;" class="s12">
                <h3 style="margin:0">Seller details</h3>
                <h4 style="margin:0;font-weight:800;">D.no:12/13/13, ABC street,</h4>
                <h4 style="margin:0;font-weight:800;">XYZ Nagar, LMN state, India</h4>
                <br>
                <p style="margin:0"><b> GSTIN number: </b>12345678t65r4</p>
            </div>
        </div>
        <hr style="width: 100%;color:black;height:2px">

        <div class="third_part">
            <div class="tabcontainer">
                <table class="tab">
                    <tr>
                        <th colspan="5">My order details</th>
                    </tr>
                    <tr>
                        <th>ProductName</th>
                        <th>CostperUnit</th>
                        <th>Qty</th>
                        <th>GST</th>
                        <th>Total cost</th>
                    </tr>

                    <?php
                    print_r($fet);
                    foreach ($fet as $x) {
                        print_r($x)
                        
                    ?>
                        <tr>
                            <!-- <td><img style="width: 100px;height:50px" src="<?php echo $row1['imgsrc'] ?>" alt="img not found" style="width:20%;"></td> -->
                            <td><?php echo $x['name']; ?></td>
                            <td><?php echo $x['price']; ?></td>
                            <td><?php echo $x['qty']; ?></td>
                            <td><?= 0 ?></td>

                            <td><?php
                                $total_cost += $x['price'] * $x['qty'];
                                echo $x['price'] * $x['qty']; ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                        <td><?= $total_cost ?></td>
                    </tr>
                </table>
            </div>
            <hr style="width: 100%;color:black;height:2px">
        </div>
        <h4>In case of any damage of a product returns are accepted for 3 days after delivery</h4>
        <div class="fourth_part">
            <div class="address" style="width: 70%;float: left;">
                <h4>Address</h4>
                <p>D.no:12/13/13, ABC street,XYZ Nagar,LMN state,India</p>
            </div>
            <div class="logo" style="width: 30%;float: right;"><img src="img/home/nav_logo.png" alt="logo" srcset=""></div>
            <h3 style="clear:both">For quries feel free to call +91 8778344354 or contact us at www.sah.com </h3>
        </div>

        <hr style="width: 100%;color:black;height:2px">



    </div>




</body>


<?php
$content = ob_get_clean(); // get content of the buffer and clean the buffer
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($content);
$mpdf->Output();

?>












version 2.0
<?php
session_start();
require('connection.inc.php');
$email = $_SESSION['email'];
?>
<?php
require('connection.inc.php');
include('vendor_pdf/vendor/autoload.php');
require 'vendor_/vendor/autoload.php';
require('functions.inc.php');
require('add_to_cart.inc.php');

ob_start();  // start output buffering
$uid = $_SESSION['USER_ID'];
?>

<?php 

if (isset($_POST)) {
        $order_id = (int)$_POST['o_id'];
        
    
}



 
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style type="text/css">
        .tabcontainer {
            overflow-x: auto;
        }

        .tab {
            width: 80%;
            text-align: center;
            margin: auto;
            border-collapse: collapse;
            border-width: 1px;
            border-color: white;
            border-style: solid;

        }


        .tab tr:first-child,
        th {
            /* color: white; */
            padding: 0.3rem;
            /* background-color: tomato; */

        }

        @media screen and (max-width:850px) {
            .head {
                flex-direction: column;
                align-items: center;
            }

            .head h1 {
                margin-bottom: 1rem;
                text-align: center;
            }

            nav ul {
                flex-direction: column;
                text-align: center;


            }

        }

        td,
        th {
            border-width: 0.1rem;
            /* border-color:none; */
            /* border-style: solid; */
        }

        td,
        th {
            font-size: 1.2rem;
            padding: 0.4rem;
        }
    </style>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            /* background-color: greenyellow; */
            align-items: center;
        }

        .first_part {
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .f22 {
            margin: 0;

        }

        .fourth_part {
            border: 2px solid black;
        }
    </style>

</head>

<body>
    <?php
    
    if (isset($_POST)) {
        $o_id = (int)$_POST['o_id'];
    }
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();

$res_sql = mysqli_query($con, "select `order`.* from `order` where `order`.id='$order_id' ");

// $res_sql=mysqli_query($con,$sql);
$fet_sql = mysqli_fetch_assoc($res_sql);

$date_time=explode(' ',$fet_sql['added_on']);
$address_id=(int)$fet_sql['address_id'];
$address_sql=mysqli_query($con,"select * from address where id='$address_id' ");
$fet_address_sql = mysqli_fetch_assoc($address_sql);



$uid = $_SESSION['USER_ID'];

$res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
 $fet = mysqli_fetch_all($res, MYSQLI_ASSOC);
    ?>

    <div class="main">
        <div class="first_part">
            <h1 style="width: 50%;float: left;">Invoice </h1>
            <h1 style="width: 50%;float: left;">
                <?php
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($o_id, $generator::TYPE_CODE_128)) . '">';

                ?>
            </h1>
            <div class="f2">
                <div style="width: 50%;float: left;" class="f21">
                    <h4 style="margin:0">Service number: 123456789</h4>
                    <h4 style="margin:0">xyz number: 2833-3433-3322534</h4>
                    <h4 style="margin:0">Transaction: Inter-State</h4>
                    <h4 style="margin:0">Supply to : TamilNadu</h4>
                </div>
                <div style="width: 50%;float: left;" class="f22">
                    <h4 style="margin:0">PacketId:
                        <?= $order_id ?>
                    </h4>
                    <h4 style="margin:0">Invoice Date: <?= $date_time[0] ?></h4>
                    <h4 style="margin:0">Ordered Date: <?= $date_time[0] ?></h4>
                    <h4 style="margin:0">Nature of supply: Goods</h4>
                </div>
            </div>
        </div><br>
        <hr style="width: 100%;color:black;height:2px">
        <div class="second_part">
            <div style="width: 50%;float: left;" class="s11">
                <h3 style="margin:0">Deliver to/Ship to:</h3>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['address']?></h4>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['pincode']?></h4>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['city']?></h4>
                <h4 style="margin:0;font-weight:lighter"><?=$fet_address_sql['state']?></h4>
                <br>
                <p style="margin:0"><b> Customer type:</b>unregistered</p>
            </div>
            <div style="width: 50%;float: left;" class="s12">
                <h3 style="margin:0">Seller details</h3>
                <h4 style="margin:0;font-weight:800;">D.no:12/13/13, ABC street,</h4>
                <h4 style="margin:0;font-weight:800;">XYZ Nagar, LMN state, India</h4>
                <br>
                <p style="margin:0"><b> GSTIN number: </b>12345678t65r4</p>
            </div>
        </div>
        <hr style="width: 100%;color:black;height:2px">

        <div class="third_part">
            <div class="tabcontainer">
                <table class="tab">
                    <tr>
                        <th colspan="5">My order details</th>
                    </tr>
                    <tr>
                        <th>ProductName</th>
                        <th>CostperUnit</th>
                        <th>Qty</th>
                        <th>GST</th>
                        <th>Total cost</th>
                    </tr>

                    <?php
                    print_r($fet);
                    foreach ($fet as $x) {
                        print_r($x)
                        
                    ?>
                        <tr>
                            <!-- <td><img style="width: 100px;height:50px" src="<?php echo $row1['imgsrc'] ?>" alt="img not found" style="width:20%;"></td> -->
                            <td><?php echo $x['name']; ?></td>
                            <td><?php echo $x['price']; ?></td>
                            <td><?php echo $x['qty']; ?></td>
                            <td><?= 0 ?></td>

                            <td><?php
                                $total_cost += $x['price'] * $x['qty'];
                                echo $x['price'] * $x['qty']; ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                        <td><?= $total_cost ?></td>
                    </tr>
                </table>
            </div>
            <hr style="width: 100%;color:black;height:2px">
        </div>
        <h4>In case of any damage of a product returns are accepted for 3 days after delivery</h4>
        <div class="fourth_part">
            <div class="address" style="width: 70%;float: left;">
                <h4>Address</h4>
                <p>D.no:12/13/13, ABC street,XYZ Nagar,LMN state,India</p>
            </div>
            <div class="logo" style="width: 30%;float: right;"><img src="img/home/nav_logo.png" alt="logo" srcset=""></div>
            <h3 style="clear:both">For quries feel free to call +91 8778344354 or contact us at www.sah.com </h3>
        </div>

        <hr style="width: 100%;color:black;height:2px">



    </div>




</body>


<?php
$content = ob_get_clean(); // get content of the buffer and clean the buffer
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($content);
$mpdf->Output();

?>
