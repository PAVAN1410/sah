<?php
require('../config_db.php');
require('../checkActiveStatus.php');

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $query = "delete from product where pid = '$pid'";
    print_r($query);
    $_SESSION['success'] = 'deletedproduct';
    mysqli_query($db,$query);
    header('location:searchExecution.php');
}
?>