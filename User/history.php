<?php
// require 'import_a.php';
// require 'header.php';
require '../config_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
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

        .tab tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tab tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .tab tr:first-child,
        th {
            color: white;
            padding: 0.5rem;
            background-color: tomato;

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
            border-color: white;
            border-style: solid;
        }

        td,
        th {
            font-size: 1.2rem;
            padding: 0.9rem;
        }
    </style>
</head>

<body>

    <?= require('U_header.php') ?>
    <div class="tabcontainer">
        <table class="tab">
            <tr>
                <th rowspan="2">date</th>
                <th colspan="8">My order details</th>
            </tr>
            <tr>
                <th>Image</th>
                <th>ProductName</th>
                <th>CostperUnit</th>
                <th>Quantity</th>
                <th>Delivery Boy</th>
                <th>Status</th>
                <th>checkin Id</th>
                <th>Bills</th>
            </tr>
            <?php
            $user = $_SESSION['username'];
            $query = "select * from history where orderedby='$user'";
            $result = mysqli_query($db, $query);
            $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $fetch = array_reverse($fetch);
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
                    <td style="background-color: tomato;color: white;" rowspan="<?php echo $length ?>"><?php echo $row['date'] ?></td>
                    <?php
                    $query1 = "select * from product where pid='$order[0]'";
                    $result1 = mysqli_query($db, $query1);
                    $row1 = mysqli_fetch_array($result1);
                    ?>
                    <td><img style="width: 100px;" src="<?php echo $row1['imgsrc'] ?>" alt="img not found" style="width:20%;"></td>
                    <td><?php echo $row1['productname']; ?></td>
                    <td><?php echo $row1['price']; ?></td>
                    <td><?php echo $order[1]; ?></td>
                    <td rowspan="<?php echo $length ?>">
                        <?= $row['deliveredby'] ?>
                    </td>
                    <td rowspan="<?php echo $length ?>">
                        <?= $row['status'] ?>
                    </td>
                    <td rowspan="<?php echo $length ?>">
                        <?= $row['randomint'] ?>
                    </td>
                    <td rowspan="<?php echo $length ?>">
                        <form action="invoice2.php" method="post">
                            <?php
                            $date =$row['date'];
                            ?>

                            <input type="hidden" name="date1" value=<?= $date ?>>
                            <input type="hidden" name="date2" value=<?= strrev($date)  ?>>
                            <input type="submit" value="Generate invoice">
                        </form>
                    </td>
                </tr>
                <?php
                foreach ($orders as $x) {
                    $order = explode(":", $x);
                    $query1 = "select * from product where pid='$order[0]'";
                    $result1 = mysqli_query($db, $query1);
                    $row1 = mysqli_fetch_array($result1);
                ?>
                    <tr>
                        <td><img style="width: 100px;" src="<?php echo $row1['imgsrc'] ?>" alt="img not found" style="width:20%;"></td>
                        <td><?php echo $row1['productname']; ?></td>
                        <td><?php echo $row1['price']; ?></td>
                        <td><?php echo $order[1]; ?></td>

                    </tr>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>