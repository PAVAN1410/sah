<!-- <?php error_reporting(E_ALL ^ E_NOTICE); ?> -->
<!-- used only for avoiding notice errors -->
<?php
require("../config_db.php");
$_SESSION['page'] = "initialHomePage";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Home Page</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="U_header.css">
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

        a {
            text-decoration: none;
            color: black;
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

        .cardsoftype {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;

        }

        .cardtype {
            display: grid;
            border: 3px solid black;
            grid-template-columns: 200px 200px;
            grid-template-rows: 200px 200px;
            background-color: black;
            grid-gap: 1px;
            overflow: hidden;
            box-shadow: 5px 5px 3px 0px black;

        }

        .cardtype:hover {
            transform: scale(1.07);
        }


        /* .cardtype {
            height: 450px;
            overflow: hidden;
            border: 3px solid;
            margin: 10px 20px;
            grid-template-columns: auto auto;
            grid-gap: 0px;
            align-items: center;
            justify-content: center;
        } */

        .cardtype .image {
            /* border: 1px solid; */
            padding: 10px;
            background-color: white;
            height: 100%;
            width: 100%;
        }

        .btn-card {
            border: none;
            background: none;
            cursor: pointer;
            /* color: #0000EE; */
            padding: 0;
            /* font-size: 15px; */
        }

    </style>
</head>

<body>
    <?php
    require 'U_header.php';
    $query = 'SELECT * FROM product order by createddate desc';
    $result = mysqli_query($db, $query);
    $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <div class="success" id='success'>
        Successfully added to cart
    </div>
    

    <div class="cardsoftype">
        <?php
        $query2 = "select * from typeofproduct";
        $result2 = mysqli_query($db, $query2);
        $fetch2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        foreach ($fetch2 as $type) :
            $typeofproduct = $type['typeofproduct'];
            $query3 = "select * from product where typeofproduct='$typeofproduct' ORDER BY RAND() limit 4";
            $result3 = mysqli_query($db, $query3);
            $fetch3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
        ?>
            <form action="typeBased.php" method="post">
                <input type="hidden" name="typeofproduct" value="<?=$typeofproduct?>">
                <button class="btn-card" type="submit">
                    <div class="cardtype">
                        <?php
                        foreach ($fetch3 as $product) :
                            $imgsrc = $product['imgsrc'];
                        ?>
                            <div class="image"><img src="<?= $imgsrc ?>" alt="No image"></div>

                        <?php endforeach;
                        ?>

                    </div>
                </button>
            </form>

        <?php
        endforeach;
        ?>

    </div>

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