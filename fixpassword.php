<?php
session_start();
require("config_db.php");
$username = $_SESSION['username'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <style>
        body {
            background-color: bisque;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .center {
            height: 40%;
            width: 40%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        input {
            margin: 10px;
        }
    </style>
</head>


<body>
    <div class="center">
        <h2>Enter new password</h2>
        <form action="fixpassword.php" method="post">
            new password
            <input type="password" name="password">
            <br>
            Confirm password
            <input type="password" name="c_password">
            <br>
            <button type="submit">submit</button>
        </form>
    </div>

    <?php
    if (isset($_POST['password'])) {
        $pass=$_POST['password'];
        $query = "UPDATE user SET password = '$pass' WHERE user.username ='$username' ";
        mysqli_query($db,$query);
        header('location:login_page.php');
    }
    ?>
</body>