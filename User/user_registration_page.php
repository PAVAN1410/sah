    <?php
    require("../config_db.php");
    ?>
    <?php
    if (count($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phonenumber = $_POST['phno'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $query = "INSERT INTO user (username,email,password,phoneNumber,address) values('$username','$email','$password','$phonenumber','$address')";
        mysqli_query($db, $query);
            $_SESSION['status']="Active";
            $_SESSION['username'] = $username;
        header('location: user_home_page.php');
    }
    ?>