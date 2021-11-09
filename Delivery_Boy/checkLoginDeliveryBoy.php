<?php
require('../config_db.php');
if(isset($_POST['deliveryboyUsername'])){
    $deliveryboyname = $_POST['deliveryboyUsername'];
    $password = $_POST['password'];
    $query = "select * from deliveryboy where deliveryboyname = '$deliveryboyname' and password = '$password'";
    $result = mysqli_query($db,$query);
    $fetch = mysqli_fetch_assoc($result);
    $_SESSION['d_id'] = $fetch['id'];
    $_SESSION['deliveryboyUsername'] = $deliveryboyname;
    $_SESSION['status']="Active";
    // print_r($fetch);
    header('location:delivery_home_page.php');
}
?>