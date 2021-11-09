<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="a_header.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        * {
            margin: 0;
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
            padding: 20px;
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

</head>

<body>
    <?php
    require('../checkActiveStatus.php');
    require('a_header.php');
    ?>
    <div class="add">
        <div class="Admin card">
            <h2 style="display: inline-block;">Delete product</h2>
            <form action="dbDeleteProduct.php" class="form" method="POST">
                <select class="element" style="font-weight: bold;" name="deleteby" place id="" required>
                    <option style="font-weight: bold;" value="">Delete using</option>
                    <option value="pid">Product Id</option>
                    <option value="pname">Product Name</option>
                </select>
                <input class="element" type="text" name="pdetail" placeholder="Enter value" required>
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
</body>

</html>