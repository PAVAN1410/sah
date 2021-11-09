<?php
session_start();
require('connection.inc.php');
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
    </style>
</head>

<body>
    <div class="center">
        <h2>A verification code is sent to your registered email</h2>
        Enter the verification code
        <form action="reset.php" method="post">
            <input type="text" name="code">
            <button type="submit">submit</button>
        </form>
    </div>

    <?php

    if (isset($_POST['code'])) {

        $username=$_SESSION['username'];
        $query = "SELECT * FROM reset WHERE username='$username'";
        $result = mysqli_query($db, $query);
        $fetch = mysqli_fetch_assoc($result);
        if ($fetch['otp'] == $_POST['code']) {
            header("location:fixpassword.php");
        } else {
            echo 'wrong code';
        }
    }
    ?>



</body>