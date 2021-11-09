<?php
require('../config_db.php');
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from admin where adminname='$username' and password = '$password' ";
    $result = mysqli_query($db,$query);
    $fetch = mysqli_fetch_assoc($result);
    print_r($fetch);
    echo empty($fetch);
    if(empty($fetch)){
        header('location:Admin_login.php');
        echo 'empty';
    }
    else{
        $_SESSION['status']="Active";
        header('location:Admin_home_page.php');
    }
}
?>