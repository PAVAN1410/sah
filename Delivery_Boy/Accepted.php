<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted</title>
    <link rel="stylesheet" href="D_header.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        .tablecontainer {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 30px;
            margin: 10px 10px;
        }

        img {
            width: 150px;
            height: 100px;
        }

        table {
            width: 80%;
            text-align: center;

        }


        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            /* text-align: left; */
        }

        #t01 tr:nth-child(even) {
            background-color: #eee;
        }

        #t01 tr:nth-child(odd) {
            background-color: #fff;
        }

        #t01 th {
            background-color: tomato;
            color: white;
        }

        .incorrect {
            display: flex;
            visibility: hidden;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-weight: bold;
            height: 40px;
            /* position: absolute; */
            background-color: orange;
        }
    </style>
</head>

<body>
    <?php
    require('D_header.php');
    require('../config_db.php');
    ?>
    <div class="incorrect" id='incorrect'>
        Please ensure the checkInId once again
    </div>

    <?php

    ?>
    <div class="tablecontainer">
        <table id="t01">
            <tr>
                <th rowspan="2">Customer Name</th>
                <th colspan="7">Order Details</th>
            </tr>
            <tr>
                <th>Product</th>
                <th>Product Name</th>
                <th>Cost Per Unit</th>
                <th>Quantity</th>
                <th>Total cost</th>
                <th>Accept/Reject</th>
            </tr>
            <?php
            $d_id = $_SESSION['d_id'];
            $query = "select * from orders where deliveryboyid = '$d_id' and status = 'accepted' ";
            $result = mysqli_query($db, $query);
            $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $fetch = array_reverse($fetch);
            $i = 0;
            foreach ($fetch as $order) {
                $i = $i + 1;
                $productquantitys = explode(',', $order['finalorder']);
                array_pop($productquantitys);
                [$product, $quantity] = explode(':', $productquantitys[count($productquantitys) - 1]);
                // print_r($product);
                // print_r($quantity);
                $orderid = $order['id'];
                $query3 = "select * from product where pid = '$product'";
                $result3 = mysqli_query($db, $query3);
                $fetch3 = mysqli_fetch_assoc($result3);

            ?>
                <tr>
                    <td style="background-color: tomato;color: white;" rowspan='<?= count($productquantitys) ?>'>
                        <h2><?= $order['orderedby'] ?></h2>
                    </td>
                    <td><img src="<?= $fetch3['imgsrc'] ?>" alt="no"></td>
                    <td><?= $fetch3['productname'] ?></td>
                    <td><?= $fetch3['price'] ?></td>
                    <td><?= $quantity ?></td>
                    <td><?= $fetch3['price'] * $quantity ?></td>
                    <td rowspan='<?= count($productquantitys) ?>' style="font-size:25px">Accepted
                        <form action="delivered.php" method="post">
                            <input type="hidden" name="oid" value="<?= $orderid ?>">
                            <input type="text" placeholder="checkInId" name="checkInId" required>
                            <button type="submit" name="accept" value=<?= $order['hid'] ?>>Accept</button>
                            <!-- <button type="submit" name='reject'>Reject</button> -->
                        </form>

                    </td>

                </tr>

                <?php
                array_pop($productquantitys);
                $productquantitys = array_reverse($productquantitys);
                foreach ($productquantitys as $productquantity) {
                    [$product, $quantity] = explode(':', $productquantity);
                    // print_r($product);
                    // print_r($quantity);
                    $query2 = "select * from product where pid = '$product'";
                    $result2 = mysqli_query($db, $query2);
                    $fetch2 = mysqli_fetch_assoc($result2);
                    // print_r($fetch2);
                ?>
                    <tr>
                        <td><img src="<?= $fetch2['imgsrc'] ?>" alt="no"></td>
                        <td><?= $fetch2['productname'] ?></td>
                        <td><?= $fetch2['price'] ?></td>
                        <td><?= $quantity ?></td>
                        <td><?= $fetch2['price'] * $quantity ?></td>
                    </tr>

                <?php
                }
            }
            if ($i == 0) { ?>
                <tr>
                    <td style="background-color: #eee;" colspan="7">
                        <h2> No Accepted orders</h2>
                    </td>
                </tr>

            <?php
            }

            ?>

        </table>
    </div>

    <?php
    if (isset($_SESSION['checkInIdCode']) && $_SESSION['checkInIdCode'] == 'incorrect') {
    ?>
        <script>
            console.log('object');
            setTimeout(() => {
                document.getElementById('incorrect').style.visibility = "hidden";
            }, 3000);
            document.getElementById('incorrect').style.visibility = "visible";
        </script>
    <?php
        unset($_SESSION['checkInIdCode']);
    }
    ?>



</body>

</html>