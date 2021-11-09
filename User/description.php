<?php
require("../config_db.php");
$_SESSION['page'] = "description";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="U_header.css">
    <style>
        * {
            margin: 0px;
            box-sizing: border-box;
        }

        body {
            background-color: #f7973f;
        }

        .description {
            display: flex;
            height: 500px;
            /* background-color: red; */
            margin: 30px 40px;
        }


        .image {
            flex: 50%;
            display: flex;
            justify-content: center;
            /* background-color: lightgreen; */
        }

        .image img {
            width: 80%;
            height: 100%;
            box-shadow: 10px 10px 10px black;
            border-radius: 20px;
            transition: all 1s ease;


        }

        .description_text {
            flex: 50%;
            background-color: lightblue;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            /* align-items: center; */
            font-size: 20px;
            box-shadow: 10px 10px 10px black;
            border-radius: 20px;
        }

        .description_text .element {
            margin: 0 auto;
        }


        .image img:hover {
            box-shadow: 10px 10px 10px black;
            transform: scale(1.1);
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

        .form_ {
            align-self: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100px;
        }

        .submit_button {
            height: 36px;
            border-radius: 20px;
            background-color: #ffb92f;
        }

        .navlinks {
            display: flex;
            justify-content: space-between;
        }

        .btn-link {
            border: none;
            background: none;
            cursor: pointer;
            color: #0000EE;
            padding: 0;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <?php
    require 'U_header.php';

    if (isset($_GET['pid'])) {
        $_SESSION['pid'] = $_GET['pid'];
        $pid = $_GET['pid'];
        // print_r($fetch);
    }
    $pid = $_SESSION['pid'];
    $query = "SELECT * from product WHERE pid = '$pid' ";
    $result = mysqli_query($db, $query);
    $fetch = mysqli_fetch_assoc($result);
    ?>
    <div class="success" id='success'>
        Successfully added to cart
    </div>

    <div class="navlinks" style="padding: 10px; margin:5px; font-size:18px">
        <a style="text-decoration: none; color:#0c0c91" href="user_home_page.php">
            &lt; Back to home </a>
        <form action="sameRetailer.php" method="post">
            <input type="hidden" name="retailername" value="<?= $fetch['retailername'] ?>">
            <button class="btn-link" type="submit">More from this retailer &gt;</button>
        </form>
        <!-- <a style="text-decoration: none; color:#0c0c91" href="sameRetailer.php">
            More from this retailer &gt; </a> -->
    </div>





    <div class="description">
        <div class="image">
            <img src="<?= $fetch['imgsrc'] ?>">
        </div>
        <div class="description_text">
            <h1 class='element'><?= $fetch['productname'] ?></h1>
            <hr style="width: 100%;" />
            <h3 class='element'>This product is provided by <?= $fetch['retailername'] ?></h3>
            <h3 class='element'>MRP: &#8377;<?= $fetch['mrp'] ?></h3>
            <h3 class='element'>
                Price: &#8377;<?= $fetch['price'] ?>
            </h3>
            <h3 class='element'>You save: &#8377;<?= ($fetch['mrp'] - $fetch['price']) ?>(<?= floor((($fetch['mrp'] - $fetch['price']) / $fetch['mrp']) * 100); ?>%)
            </h3>
            <h3 class='element'><?= "weight: " . $fetch['size'] ?></h3>
            <div class='element' style="width: 100%; display: flex; justify-content: space-evenly;">
                <h3 style="display: inline-block;">No contact delivery</h3>
                <h3 style="display: inline-block;">SAH delivered</h3>
            </div>
            <h3 class='element'>free deliver for order over &#8377; 99</h3>
            <h3 class='element'>Delivered to you in 2-3 hrs</h3>


            <form class="form_" action="addCart.php" method="post">
                <input type="hidden" name="pid" value="<?= $pid ?>">
                <div style="display:inline-block;margin: 0 auto;">
                    <button style='float:right;height:50px' onclick="quantityChange(event)" id='plus'>+</button>
                    <input style=' height:50px' type="number" min="0" step="1" name="quantity" id="quantity" value=1>
                    <button style='float:left; height:50px' id='minus' onclick="quantityChange(event)">-</button>
                </div>
                <button id='submit' class="submit_button" type="submit">Add to cart</button>
            </form>
            <script>
                anchor = document.getElementById('quantity');

                function redirect(e) {
                    e.targer.href = 'dsaf';
                }

                function quantityChange(e) {
                    e.preventDefault();
                    quantity = document.getElementById('quantity');
                    // console.log(e.target.id);
                    if (e.target.id == 'minus') {
                        // console.log(quantity.value)
                        if (quantity.value > 0)
                            quantity.value = parseInt(quantity.value) - 1;
                    } else if (e.target.id == 'plus') {
                        if (quantity.value >= 0)
                            quantity.value = parseInt(quantity.value) + 1;

                    }

                }
            </script>


        </div>
    </div>
    <?php
    if (isset($_SESSION['success'])) {
        echo "dsfa";
    ?>
        <script>
            console.log('object');
            setTimeout(() => {
                document.getElementById('success').style.visibility = "hidden";
            }, 2000);
            document.getElementById('success').style.visibility = "visible";
        </script>
    <?php }
    unset($_SESSION['success']);
    ?>


</body>

</html>