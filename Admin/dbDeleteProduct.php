<?php
require('../config_db.php');
require('../checkActiveStatus.php');

if(isset($_POST['deleteby'])){
    $deleteby = $_POST['deleteby'];
    $pdetail = $_POST['pdetail'];
    $deleteby == 'pid' ? $query = "delete from product where pid = '$pdetail'"
    : $query = "delete from product where productname = '$pdetail'";
    print_r($query);
    $_SESSION['success'] = 'deletedproduct';
    mysqli_query($db,$query);
    header('location:Admin_home_page.php');
}
?>