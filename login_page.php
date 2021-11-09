<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="General_header.css">
    <style>
        * {
            margin: 0px;
            box-sizing: border-box;
        }


        body {
            background-image: url('https://image.freepik.com/free-photo/food-groceries-shopping-basket-kitchen-table-banner-background_8087-1861.jpg');
            background-size: 100% 100%;
            /* background-color: aqua; */
            /* display: flex; */
            flex-direction: column;
            justify-content: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .login {
            /* background-color: skyblue; */

            margin: 0px;
            /* height: 100vh; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }

        .card {
            min-height: 190px;
            width: 40%;
            background-color: rgba(0, 0, 0, 0.5);
            position: relative;
            margin: 30px;
            border-radius: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .card:hover {
            box-shadow: 0px 4px 25px 1px rgba(255, 255, 255, 1);
        }

        .form {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }

        .element {
            border-radius: 10px;
            padding: 5px;
            margin: 5px;
            width: 60%;
        }

        .login {
            width: 100%;
        }

        .login button {
            border: none;
            font-size: 1rem;
            width: 100px;
            border-radius: 25px;
            padding: 5px;
            margin: auto;
            cursor: pointer;
        }

        .icon {
            align-self: flex-start;
            padding: 9px;
            margin: 25px;
            border-radius: 50%;
            border: 3px solid white;
            position: absolute;
            top: -13px;
            left: 19px;
        }

        .home {
            font-size: 20px;
        }
    </style>
    <style>
        nav {
            width: 100%;
            margin: 0 auto;
            color: black;
            background-color: white;

        }

        .nav_after {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: white;
            box-shadow: 0 2px 2px #efefef;
            color: black;
            z-index: 99999;
        }

        .row {
            width: 100%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        nav ul li {
            display: inline-block;
            margin-left: 40px;
        }

        nav ul li a {
            padding: 8px 0;
            color: inherit;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 20px;
            border-bottom: 2px solid transparent;
            -webkit-transition: border-bottom 0.2s;
            transition: border-bottom 0.2s;
        }

        nav ul li a:hover {
            border-bottom: 2px solid orange;
        }



        .logo-black {
            display: block;
            height: 70px;
            width: auto;
            float: left;
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <?php
    require 'General_header.php';
    ?>
    <div class="login">
        <div class="user card">
            <div class="icon">
                <a href="index.php"><i style="color:white; display: inline-block;" class="fas fa-home home"></i></a>
            </div>
            <h2 style="display: inline-block;">User Login</h2>
            <!-- method="post" -->
            <form name="form" class="form" method="POST">
                <input class="element" type="text" name="username" placeholder="User Name" required>
                <input class="element" type="password" name="password" placeholder="Password">
                <a class='element' style="text-align: center; font-size: large; color: #ffe000; text-decoration: none;" href="Register_page.php">New User?</a>

                <button type="submit" onclick="javascript: form.action='User/checkLogin.php';">Login</button>
                <button type="submit" onclick="javascript: form.action='reset.php';">forget password</button>
                <!-- <a href="reset.php">forget password?</a> -->
            </form>





        </div>
        <div class="Retailer card">
            <div class="icon">
                <a href="index.php"><i style="color:white; display: inline-block;" class="fas fa-home home"></i></a>
            </div>
            <h2>Retailer Login</h2>
            <form action="Retailer/checkLoginRetailer.php" class="form" method="POST">
                <input class="element" type="text" name="retailername" placeholder="User Name" required>
                <input class="element" type="password" name="password" placeholder="Password" required>
                <a class='element' style="text-align: center; font-size: large; color: #ffe000;" href="Register_page.php">New User?</a>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="Delivery_boy card">
            <div class="icon">
                <a href="index.php"><i style="color:white; display: inline-block;" class="fas fa-home home"></i></a>
            </div>
            <h2>Delivery boy Login</h2>
            <form action="Delivery_Boy/checkLoginDeliveryBoy.php" class="form" method="POST">
                <input class="element" type="text" name="deliveryboyUsername" placeholder="User Name" required>
                <input class="element" type="password" name="password" placeholder="Password" required>
                <a class='element' style="text-align: center; font-size: large; color: #ffe000;" href="Register_page.php">New User?</a>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>