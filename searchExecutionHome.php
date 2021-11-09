<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="General_header.css">
    <style>
        * {
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f7973f;
        }

        .cards {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            padding: 10px;
            margin: 10px 25px;
            /* border: 1px solid blue; */
            justify-content: space-around;
        }

        .card {
            /* flex-basis: 33%; */
            margin: 11px 6px 50px 0px;
            height: 400px;
            width: 250px;
            background-color: white;
            /* box-shadow: none|h-offset v-offset blur spread color |inset|initial|inherit; */
            box-shadow: 5px 5px 3px 0px black;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            transition: all 500ms ease;
            /* align-items: center; */
            /* border-radius: 47px; */
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.07);
        }

        .imagePlaceholder {
            /* display: flex; */
            height: 48%;
            width: 100%;
            padding: 3px;
            /* background-color: mediumvioletred; */
            /* overflow: hidden; */
        }

        img {
            /* height: min-content; */
            width: 100%;
            height: 100%;
        }

        .imageName {
            text-align: center;
            font-size: 22px
        }

        .element {
            padding: 3px;
        }

        .addToCart {
            width: 80%;
            background-color: skyblue;
            margin: 6px auto;
            border-radius: 10px;
            height: 41px;

        }


        .cart {
            width: 80%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        .cart .quantityAlter {
            display: inline-block;
            margin: 10px auto;
            width: 100%;
        }

        .success {
            /* display: none; */
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
    require('config_db.php');
    require('General_header.php');
    $_SESSION['page'] = "searchExecutionHome";
    ?>
    <div class="success" id='success'>
        Successfully added to cart
    </div>


    <?php
    if(isset($_POST['searchQuery'])){
        $searchQuery = $_POST['searchQuery'];
        $_SESSION['searchQuery'] = $searchQuery;
    }
    if (isset($_POST['searchQuery']) || isset($_SESSION['searchQuery'])) :
        $searchQuery = $_SESSION['searchQuery'];
        $query = "select * from product where productname like'%$searchQuery%' ";
        $result = mysqli_query($db, $query);
        $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($fetch);
    ?>
        <div class="cards">
            <?php
            foreach ($fetch as $product) :
            ?><?php $imgsrc = substr($product["imgsrc"], 3); ?>
                    <div class="card">
                        <div class="imagePlaceholder"><img src="<?= $imgsrc; ?>" alt="no img"></div>
                        <h2 class="imageName" style="text-align: center;"><?= $product["productname"]; ?></h2>
                        <h3 class='retailer element'>Provided to you by <?= $product['retailername'] ?></h3>
                        <h3 class="price">price: &#8377;<?= $product["price"]; ?></h3>
                        <!-- <p class="anydescription"></p> -->
                        <!-- <p class="deliveryType">Free</p> -->

                        <form class='cart' action="login_page.php" method="post">
                            <input type="hidden" name="pid" value="<?= $product['pid'] ?>">
                            <div class='quantityAlter' style="display:inline-block;margin: 0 auto;">
                                <button style='float:right; height:40px; width:12%' onclick="quantityChange(event,'<?= 'quantity_' . $product['pid'] ?>')" id='plus'>+</button>
                                <input style=' height:40px; width:76%' type="number" min="0" step="1" name="quantity" id="quantity_<?= $product['pid'] ?>" value=1>

                                <button style='float:left; height:40px; width:12%' id='minus' onclick="quantityChange(event,'<?= 'quantity_' . $product['pid'] ?>')">-</button>
                            </div>
                            <button class="addToCart" type="submit" id='submit'>Add to cart</button>
                        </form>
                        <?= "<script>" ?>



                        function quantityChange(e,x) {
                        e.preventDefault();
                        console.log(x);
                        quantity = document.getElementById(x);
                        console.log(e);
                        console.log(quantity);
                        if (e.target.id == 'minus') {
                        // console.log(quantity.value)
                        if (quantity.value > 0)
                        quantity.value = parseInt(quantity.value) - 1;
                        } else if (e.target.id == 'plus') {
                        if (quantity.value >= 0)
                        quantity.value = parseInt(quantity.value) + 1;

                        }

                        }
                        <?= "</script>" ?>
                        <!-- <button class="addToCart" type="submit">Add to Cart</button> -->
                    </div>

            <?php endforeach ?>
        </div>


    <?php endif ?>
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        <script>
            console.log('object');
            setTimeout(() => {
                // visibility: hidden;
                document.getElementById('success').style.visibility = "hidden";
            }, 2000);
            document.getElementById('success').style.visibility = "visible";
        </script>
    <?php }
    unset($_SESSION['success']);
    ?>

</body>


</html>