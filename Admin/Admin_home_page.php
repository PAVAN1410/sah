<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        * {
            margin: 0px;
        }

        body {
            background-image: url('https://www.emerlyn.com/wp-content/uploads/2015/10/corporate-profile-background.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }


        .add {
            flex-grow: 2;
            width: 100%;
            margin: 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }

        .card {
            min-height: 190px;
            width: 40%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.4);
            position: relative;
            margin: 30px;
            border-radius: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .card:hover {
            box-shadow: 10px 4px 25px 1px rgba(0, 0, 0, 1);
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


        .add button {
            border: none;
            font-size: 1rem;
            width: 100px;
            border-radius: 25px;
            padding: 5px;
            margin: auto;
            cursor: pointer;
        }

        .success {
            display: none;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-weight: bold;
            width: 100%;
            height: 40px;
            background-color: orange;
        }
    </style>
    <link rel="stylesheet" href="a_header.css">
</head>

<body>
    <?php
    session_start();
    ?>
    <?php
    require('../checkActiveStatus.php');
    require('a_header.php');
    if (isset($_SESSION['success'])) {
        if ($_SESSION['success'] == "deletedDeliveryBoy") {
            $message = "deleted delivery boy ";
        }
        else if ($_SESSION['success'] == "success") {
            $message = "added the login details";
        }
        else if ($_SESSION['success'] == "deletedproduct") {
            $message = "deleted the product";
        }
        // echo $message;
    }
    ?>




    <div class="success" id='success'>
        Successfully <?=$message?>
    </div>

    <div class="add">
        <div class="Admin card">

            <h2 style="display: inline-block;">Add delivery Boy</h2>
            <form action="addDeliveryBoy.php" class="form" method="POST">
                <input class="element" type="text" name="username" placeholder="User Name" required>
                <input class="element" type="password" name="password" placeholder="Password" required>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_SESSION['success'])) {
        echo "dsfa";
    ?>
        <script>
            console.log('object');
            setTimeout(() => {
                document.getElementById('success').style.display = "none";
            }, 2000);
            document.getElementById('success').style.display = "flex";
        </script>
    <?php
        unset($_SESSION['success']);
    }
    ?>


</body>

</html>