<?php
include('../vendor/autoload.php');
require '../config_db.php';
require 'vendor/autoload.php';
ob_start();  // start output buffering
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="U_header.css">
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
        $date = $_POST['date1'] . ' ' . strrev($_POST['date2']);
    } else {
    }
    $user = $_SESSION['username'];
    $query = "select * from history where orderedby='$user' and date='$date'";

    $result = mysqli_query($db, $query);
    $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();

    ?>

    <div class="main">

        <div class="first_part">
            <h1 style="width: 50%;float: left;">Invoice</h1>
            <h1 style="width: 50%;float: left;">
                <?php
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($fetch[0]['randomint'], $generator::TYPE_CODE_128)) . '">';

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
                        <?= $fetch[0]['randomint'] ?>
                    </h4>
                    <h4 style="margin:0">Invoice Date: <?= $_POST['date1'] ?></h4>
                    <h4 style="margin:0">Ordered Date: <?= $_POST['date1'] ?></h4>
                    <h4 style="margin:0">Nature of supply: Goods</h4>
                </div>
            </div>
        </div><br>
        <hr style="width: 100%;color:black;height:2px">
        <div class="second_part">
            <div style="width: 50%;float: left;" class="s11">
                <h3 style="margin:0">Deliver to/Ship to:</h3>
                <h4 style="margin:0;font-weight:lighter">Royal cafe</h4>
                <h4 style="margin:0;font-weight:800;">coiambatore, TN, India</h4>
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
                        <th rowspan="2">Date</th>
                        <th colspan="6">My order details</th>
                    </tr>
                    <tr>
                        <!-- <th>Image</th> -->
                        <th>ProductName</th>
                        <th>CostperUnit</th>
                        <th>Quantity</th>
                        <th>SGST</th>
                        <th>CGST</th>
                        <th>Total cost</th>
                        <!-- <th>Delivery Boy</th> -->
                        <!-- <th>Status</th> -->
                        <!-- <th>checkin Id</th> -->
                        <!-- <th>Bills</th> -->
                    </tr>
                    <?php

                    $fetch = array_reverse($fetch);
                    $total_cost = 0;
                    foreach ($fetch as $row) {
                    ?>
                        <tr>
                            <?php
                            $orders = explode(',', $row['finalorder']);
                            array_pop($orders);
                            $length = count($orders);
                            $order = explode(":", $orders[count($orders) - 1]);
                            array_pop($orders);
                            ?>
                            <td style="" rowspan="<?php echo $length ?>"><?php echo $row['date'] ?></td>
                            <?php
                            $query1 = "select * from product where pid='$order[0]'";
                            $result1 = mysqli_query($db, $query1);
                            $row1 = mysqli_fetch_array($result1);
                            ?>
                            <!-- <td><img style="width: 100px;" src="<?php echo $row1['imgsrc'] ?>" alt="img not found" style="width:20%;"></td> -->
                            <td><?php echo $row1['productname']; ?></td>
                            <td><?php echo $row1['price']; ?></td>
                            <td><?php echo $order[1]; ?></td>
                            <td><?= 0 ?></td>
                            <td><?= 0 ?></td>
                            <td><?php
                                $total_cost += $row1['price'] * $order[1];
                                echo $row1['price'] * $order[1]; ?></td>



                        </tr>
                        <?php
                        foreach ($orders as $x) {
                            $order = explode(":", $x);
                            $query1 = "select * from product where pid='$order[0]'";
                            $result1 = mysqli_query($db, $query1);
                            $row1 = mysqli_fetch_array($result1);
                        ?>
                            <tr>
                                <!-- <td><img style="width: 100px;height:50px" src="<?php echo $row1['imgsrc'] ?>" alt="img not found" style="width:20%;"></td> -->
                                <td><?php echo $row1['productname']; ?></td>
                                <td><?php echo $row1['price']; ?></td>
                                <td><?php echo $order[1]; ?></td>
                                <td><?= 0 ?></td>
                                <td><?= 0 ?></td>

                                <td><?php
                                    $total_cost += $row1['price'] * $order[1];
                                    echo $row1['price'] * $order[1]; ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                        <tr >
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>0</td>
                            <td>0</td>
                            <td><?= $total_cost ?></td>
                        </tr>
                    <?php
                    }
                    ?>
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
            <div class="logo" style="width: 30%;float: right;"><img src="myntra.png" alt="" srcset=""></div>
            <h3 style="clear:both">For quries feel free to call +91 8778344354 or contact us at www.sah.com </h3>
        </div>
    </div>


</body>


<?php
$content = ob_get_clean(); // get content of the buffer and clean the buffer
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($content);
$mpdf->Output();


// $mpdf->WriteHTML(file_get_contents('../login_page.php'));
// $mpdf->WriteHTML($html);
// $mpdf->output();
?>