<!-- <?php error_reporting(E_ALL ^ E_NOTICE); ?> -->
<!-- used only for avoiding notice errors -->
<?php
require("../config_db.php");
$_SESSION['page'] = "user_home_page";
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        img {
            /* height: min-content; */
            width: 100%;
            height: 100%;
        }


        .cardsoftype {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
            flex-grow: 2;

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
    print_r($_SESSION);

    $query = 'SELECT * FROM product order by createddate desc';
    $result = mysqli_query($db, $query);
    $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

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


</body>

</html>