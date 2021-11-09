<?php
require('../config_db.php');
require('../checkActiveStatus.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="R_header.css">
    <style>
                .tabcontainer {
            overflow-x: auto;
            margin-top: 50px;
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
    <?php
    require('R_header.php');
    // $orgDate = "2019-09-15"; 
    // $newDate = date("d-m-Y", strtotime($orgDate));
    ?>


    <div class="tabcontainer">
        <table class="tab">
            
            <tr>
                <th>Date</th>
                <th>Unique products</th>
                <th>Totalquantity</th>
                <th>Total Income</th>
            </tr>

            <?php

            $retailername = $_SESSION['retailername'];

            $query = "SELECT date,group_concat(iid,':',pid separator ',') as iid_pids, count(distinct pid) as distinctproducts ,sum(quantity) as totalquantity from retailerincome where retailername = '$retailername' group by date order by date";
            $result = mysqli_query($db, $query);
            $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $totalMonthIncome = 0;
            foreach ($fetch as $element) {
                $iid_pids = explode(',', $element['iid_pids']);
                // print_r($iid_pids);
                $totalprice = 0;
                $date = date('d-m-Y',strtotime($element['date']));
                // echo $date."<br>".$element['date']."<br>";


                foreach ($iid_pids as $iid_pid) {
                    //  destructuring
                    [$iid, $pid] = explode(':', $iid_pid);
                    // echo $element['date'] . $iid . "pid" . $pid . "<br>";
                    $queryiid = "select * from retailerincome where iid = '$iid'";
                    $resultiid = mysqli_query($db, $queryiid);
                    $fetchiid = mysqli_fetch_assoc($resultiid);

                    $querypid = "select * from product where pid = '$pid'";
                    $resultpid = mysqli_query($db, $querypid);
                    $fetchpid = mysqli_fetch_assoc($resultpid);

                    $totalprice = $totalprice + $fetchiid['quantity'] * $fetchpid['price'];

                }
                $totalMonthIncome = $totalMonthIncome + $totalprice;
            ?>


                <tr>
                    <td><?= $date ?></td>
                    <td><?= $element['distinctproducts'] ?></td>
                    <td><?= $element['totalquantity'] ?></td>
                    <td><?= $totalprice ?></td>

                </tr>



            <?php

            }
            ?>
            <td colspan="4"><h2 style="float: right;">Monthly Total : <?=$totalMonthIncome?></h2></td>
        </table>
    </div>

</body>

</html>