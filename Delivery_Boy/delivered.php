<?php
require('../config_db.php');
?>
<?php
if(isset($_POST['checkInId'])){
    $hid = $_POST['accept'];
    $oid = $_POST['oid'];
    $checkInId = $_POST['checkInId'];
    $query = "select * from history where id = '$hid'";
    $result = mysqli_query($db,$query);
    $fetch = mysqli_fetch_assoc($result);
    // print_r($fetch);
    if($fetch['randomint']==$checkInId){
    $query = "update history set status = 'Product Delivered' where id = '$hid'";
    mysqli_query($db,$query);
    $query = "update orders set status ='Delivered' where id ='$oid' ";
    mysqli_query($db,$query);
    $_SESSION['checkInIdCode'] = 'correct';
    }else{
        $_SESSION['checkInIdCode'] = 'incorrect';
    }
    header('location:Accepted.php');
}
?>