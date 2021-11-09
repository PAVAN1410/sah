<?php
require('../config_db.php');
require('../checkActiveStatus.php');

if(isset($_POST['deliveryboyname'])){
    $deliveryboyname = $_POST['deliveryboyname'];
    $query = "delete from deliveryboy where deliveryboyname = '$deliveryboyname'";
    $_SESSION['success'] = 'deletedDeliveryBoy';
    mysqli_query($db,$query);
    header('location:Admin_home_page.php');
}
?>