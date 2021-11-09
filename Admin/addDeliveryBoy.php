<?php
    require('../config_db.php');
    if(isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username;
        echo $password;
        $query = "INSERT into deliveryboy(deliveryboyname,password) values ('$username','$password')";
        $result = mysqli_query($db,$query);
        if(!empty($result)){
            $_SESSION['success'] = 'success';
            header('location:Admin_home_page.php');
        }

    }
?>