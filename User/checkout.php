<?php
require('../config_db.php');
?>

<?php
$username = $_SESSION['username'];
$date=date("Y-m-d H:i:s");
$query = "select * from cart where orderedby = '$username'";
$result = mysqli_query($db, $query);
$fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($fetch);

$finalorder = '';

foreach ($fetch as $cartitem ) {
    $pid=$cartitem['pid'];
    $quantity = $cartitem['quantity'];
    $finalorder = $finalorder.$pid.':'.$quantity.',';
    $query= "select * from product where pid = '$pid' ";
    $result = mysqli_query($db,$query);
    $fetch = mysqli_fetch_assoc($result);
    $retailername = $fetch['retailername'];

    // ri -> retailerincome
    $queryri = "insert into retailerincome(retailername,pid,quantity) values('$retailername','$pid','$quantity')";
    mysqli_query($db,$queryri);
}



echo $finalorder;
$randomint = mt_rand(10000000,99999999); 
$query = "insert into history(orderedby,finalorder,status,randomint) values ('$username','$finalorder','updating','$randomint')";
mysqli_query($db,$query);
$query = "select * from history where orderedby = '$username' order by date desc";
$result = mysqli_query($db,$query);
$fetch = mysqli_fetch_assoc($result);
$hid = $fetch['id'];
echo $hid;
$query = "insert into orders(orderedby,finalorder,hid) values ('$username','$finalorder','$hid')";
mysqli_query($db,$query);
$query = "delete from cart where orderedby = '$username'";
mysqli_query($db,$query);
$_SESSION['success']="added";
header('location:cart.php');

// DELETE FROM `cart` WHERE `cart`.`id` = 82"

?>