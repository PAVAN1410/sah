<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta charset="UTF-8">
    <title>Registration</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        * {
            margin: 0px;
        }

        body {
            background-image: url('https://i.pinimg.com/originals/e5/14/56/e514563d12f2616ed9ced7b4e6c47d9e.jpg');
            background-size: 100% 100%;
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
            width: 100%;
        }

        .card {
            min-height: 500px;
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
            box-shadow: 0px 4px 25px 1px rgb(194, 143, 143);
        }

        .form_result {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }

        .element {
            border-radius: 10px;
            padding: 5px;
            margin: 5px;
            width: 80%;
            display: block;
            margin: auto;
        }

        /* .login button {
            border: none;
            font-size: 1rem;
            width: 100px;
            border-radius: 25px;
            padding: 5px;
            margin: auto;
        } */

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

        .form_button {
            font-size: 15px;
            border-radius: 25px;
            padding: 0.8rem 2rem;
            margin: 0rem 3rem 0.5rem 4rem;
            cursor: pointer;
        }

        .registerUser {
            padding: 10px 21px;
            color: #001ee1;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" href="General_header.css">


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
            <div class="login">
                <form class="form_result" action="Retailer/retailer_registration_page.php" method="POST" onsubmit="return matchpassword()">
                    <h1 style="text-align: center">Registration-Retailer</h1> <br>
                    <input class="element" type="text" name="retailername" placeholder="USERNAME" required pattern="^[a-z0-9_-]{3,16}$"><br>
                    <input class="element" type="password" name="password" placeholder="PASSWORD" required><br>
                    <input class="element" type="password" name="password2" placeholder="CONFIRMPASSWORD" required><br>
                    <input class="element" type="text" name="phno" placeholder="PHONENUMBER" required pattern="[0-9]{10}"><br>
                    <input class="element" type="email" name="email" placeholder="EMAIL" required><br>
                    <input class="element" type="text" name="address" placeholder="ADDRESS" required><br>
                    <div>
                        <button class="form_button" type="reset">Reset</button>
                        <button class="form_button" name="register" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <a href="Register_page.php" class="registerUser">Register as User</a>
        </div>
    </div>
    <script>
        function matchpassword() {
            var firstpassword = document.forms[0].querySelector('input[name="password"]').value;
            var secondpassword = document.forms[0].querySelector('input[name="password2"]').value;
            if (firstpassword == secondpassword) {
                return true;
            } else {
                alert('PASSWORD and CONFIRMPASSWORD must match');
                return false;

            }
        }
    </script>
</body>

</html>