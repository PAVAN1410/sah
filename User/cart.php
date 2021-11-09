<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="U_header.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>cart</title>
    <style>
        body {
            background-color: #f7973f;

        }

        .cartTable {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* height: 100px; */
            margin: 30px 0;
        }

        table {
            width: 80%;
        }

        table,
        th,
        td {
            /* border: 1px solid black; */
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        #t01 tr:nth-child(even) {
            background-color: #f2f2f2;
            ;
        }

        #t01 tr:nth-child(odd) {
            background-color: #fff;
        }

        #t01 th {
            background-color: orangered;
            color: white;
        }

        tr td button {

            color: white;
            background-color: tomato;
            border: none;
            border-radius: 5px;
            padding: 0.5rem;

        }

        .last {
            width: 80%;
            margin: auto;
            text-align: right;
        }

        .last button {
            height: 40px;
            margin-right: 40px;
            color: white;
            background-color: lightgreen;
            border: none;
            border-radius: 5px;
            padding: 0.5rem;
        }

        @media screen and (max-width:850px) {
            .last button {
                text-align: center;
            }
        }

        .success {
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
    require("../config_db.php");
    require("U_header.php");

    ?>
    <div class="success" id='success'>
        Successfully placed order
    </div>

    <div class="cartTable">
        <table id="t01">
            <tr>
                <th>S.no</th>
                <th>Product</th>
                <th>Name</th>
                <th>Cost per unit</th>
                <th>quantity</th>
                <th>Total Cost</th>
                <th>Ordered on</th>
                <th>Remove item</th>
            </tr>
            <?php
            $username = $_SESSION['username'];
            $query = "select * from cart where orderedby ='$username' order by orderedat desc";
            $result = mysqli_query($db, $query);
            $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $s_no = 0;
            $totalcost = 0;
            foreach ($fetch as $cartItem) {
                $s_no += 1;
                // print_r($cartItem);
                $pid = $cartItem['pid'];
                $query2 = "select * from product where pid ='$pid'";
                $result2 = mysqli_query($db, $query2);
                $fetch2 = mysqli_fetch_assoc($result2);
                // print_r($fetch2);
                // echo "<br>";
                $total = $fetch2['price'] * $cartItem['quantity'];
                $totalcost = $totalcost + $total;
            ?>
                <tr>
                    <td><?= $s_no ?></td>
                    <td> <img src="<?= $fetch2['imgsrc'] ?>" alt="no img" style="width:100px;"></td>
                    <td><?= $fetch2['productname'] ?></td>
                    <td><?= $fetch2['price'] ?></td>
                    <td><?= $cartItem['quantity'] ?></td>
                    <td><?= $fetch2['price'] * $cartItem['quantity'] ?></td>
                    <td><?= $cartItem['orderedat'] ?></td>
                    <td>
                        <form action="editcart.php" method="post">
                            <button type="submit" name='delete' value='<?= $cartItem['id'] ?>'>Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            if ($totalcost == 0) {
                echo  '<td colspan="8"><h3 style="text-align:center;font-weight:bold;font-size:25px"><br>Cart is empty</h3></td>';
            }
            ?>

            <!-- <tr>
                <td>sdfg</td>
            </tr> -->
        </table>
        <?php
        if ($totalcost != 0) { ?>
            <div class="last">
                <div style="background-color: #ccc;text-align: right;padding:1.5rem;font-size: 1rem;">
                    <h2>
                        Payable amount:<?php echo $totalcost; ?>
                    </h2>
                </div>
                <form style="background-color: #0005007d;" action="payment.php" method="POST">
                    <button type="submit" value="<?php echo $totalcost ?>" name="checkout">Proceed to Checkout</button>
                </form>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['success']) && $_SESSION['success']== 'added') {
        ?>
            <script>
                console.log('object');
                setTimeout(() => {
                    document.getElementById('success').style.visibility = "hidden";
                }, 3000);
                document.getElementById('success').style.visibility = "visible";
            </script>
        <?php 
        unset($_SESSION['success']);
        }
        ?>

</body>

</html>