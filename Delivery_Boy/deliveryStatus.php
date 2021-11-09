<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Status</title>
</head>

<body>
    <?php
    require('../config_db.php');
    if (isset($_POST['accept'])) {
        $hid = $_POST['accept'];
        $oid = $_POST['oid'];
    }
    ?>
    <?php
    $query = "select * from orders where id = '$oid'";
    $result = mysqli_query($db,$query);
    $fetch2 = mysqli_fetch_assoc($result);
    print_r($fetch2);
    echo "<br>";
    $d_id = $_SESSION['d_id'];
    $query = "update orders set status = 'accepted',deliveryboyid = '$d_id' where id = '$oid'";
    mysqli_query($db,$query);
    

    $deliveryboyUsername = $_SESSION['deliveryboyUsername'];
    echo $deliveryboyUsername;
    $query = "update history set status = 'We will get your products delivered with in 2-3 hours now',deliveredby = '$deliveryboyUsername' where id = '$hid'";
    $result = mysqli_query($db,$query);
    // print_r($fetch);
    header('location:delivery_home_page.php')
    ?>
</body>

</html>