<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="U_header.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            min-width: 274px;
            font-size: 1.3rem;
        }


        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;

        }

        nav ul a {
            margin-left: 0.7rem;
            text-decoration: none;
            display: block;
            transition-duration: 0.4s;
            color: black;
            font-size: 0.8rem;
            padding: 0.3rem;
        }

        nav ul a:hover {
            background-color: tomato;
            color: white;
            border-radius: 4px;

        }

        .name {
            background-color: tomato;
            text-align: center;
            color: white;
            font-size: 2.5rem;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .container img {
            margin: 1rem;
        }

        table td input,
        select {
            width: 100%;
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

            form table {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <?php
    require('U_header.php')
    ?>
    <div class="name">
        MAKE ONLINE PAYMENT
    </div>
    <br><br>
    <div class="container">
        <div>
            <img src="payment_images\master.png" style="width:150px;height:140px;">
        </div>
        <div>
            <img src="payment_images\maestro.png" style="width:150px;height:140px;">
        </div>
        <div>
            <img src="payment_images\visa.png" style="width:150px;height:140px;">
        </div>
    </div>
    <form method="POST" action="checkout.php">
        <table style="margin:auto;width:40%">
            <tr>
                <td>Card Holder Name:</td>
                <td><input type="text" required ></td>

            </tr>
            <tr>
                <td>Card No:</td>
                <td><input type="text" required></td>

            </tr>
            <tr>
                <td> Card Type:</td>
                <td><select>
                        <option>Master</option>
                        <option>Visa</option>
                        <option>Maestro</option>
                    </select></td>

            </tr>
            <tr>
                <td> Card Expiry:</td>
                <td><input type="month" required></td>

            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="text" required value="<?php echo $_POST['checkout']; ?>" readonly></td>

            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" value="checkout" name="checkout">Make payment</button>
                </td>
            </tr>
        </table>






    </form>
</body>

</html>