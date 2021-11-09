<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        * {
            margin: 0px;
        }



        body {
            background-image: url('https://image.freepik.com/free-photo/food-groceries-shopping-basket-kitchen-table-banner-background_8087-1861.jpg');
            background-size: 100% 100%;
            /* background-color: aqua; */
            background-repeat: no-repeat;
            min-height: 100vh;
        }


        navbar {
            /* width: 100vw; */
            position: sticky;
            top: 0;
            color: red;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
            height: 80px;
            background-color: #78d6cb;
            z-index: 99;
        }

        links ul {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 400px;
        }

        links ul a {
            text-decoration: none;
            padding: 10px 8px;
            font-size: 25px;
        }

        .search {
            width: 534px;
            height: 40px;
            font-size: 20px;
        }

        .searchIcon {
            background-color: orange;
            height: 40px;
            cursor: pointer;
            float: right;
            width: 35px;
        }

        .searchIcon::after {
            clear: both;
        }

        .login {
            /* background-color: skyblue; */
            width: 100%;
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


        .login button {
            border: none;
            font-size: 1rem;
            width: 100px;
            border-radius: 25px;
            padding: 5px;
            margin: auto;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <navbar>
        <H1> <a style="text-decoration: none; color:blue" href="index.php">Shope At Home</a></H1>

    </navbar>
    <div class="login">
        <div class="Admin card">

            <h2 style="display: inline-block;">Admin Login</h2>
            <!-- method="post" -->
            <form action="checkAdminLogin.php" class="form" method="POST">
                <input class="element" type="text" name="username" placeholder="User Name" required>
                <input class="element" type="password" name="password" placeholder="Password" required>
                <a class='element' style="text-align: center; font-size: large; color: #ffe000; text-decoration: none;" href="Register_page.php">New User?</a>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>