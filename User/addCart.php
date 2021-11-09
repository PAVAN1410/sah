<?php
require("../config_db.php");
print_r($_POST);
if (count($_POST)) {
    $pid = $_POST['pid'];
    $quantity = $_POST['quantity'];
    $username = $_SESSION['username'];
    echo $username;
    $query = "SELECT * FROM cart WHERE orderedby='$username' AND pid = '$pid'";
    $result = mysqli_query($db, $query);
    $fetch = mysqli_fetch_assoc($result);
    echo "dsaf";
    print_r($fetch);
    if (!count($fetch)) {
        $query = "INSERT INTO cart (orderedby,pid,quantity) VALUES ('$username','$pid','$quantity')";
        mysqli_query($db, $query);
        echo "<br> sdaf" . $_SESSION["page"];
    } else {
        $quantity = $fetch['quantity'] + $quantity;
        // echo $quantity;
        $id = $fetch['id'];
        $query = "UPDATE cart SET orderedat = CURRENT_TIMESTAMP ,quantity = '$quantity' WHERE cart.id ='$id' ";
        mysqli_query($db, $query);

        echo "<br> sdaf" . $_SESSION["page"];
    }
    $_SESSION['quantity'] = $quantity;
    if ($_SESSION["page"] == 'description') {
        $_SESSION["success"] = "success";
        header('location: description.php');
    } else if ($_SESSION["page"] == 'user_home_page') {
        $_SESSION["success"] = "success";
        header('location:user_home_page.php');
    } else if ($_SESSION["page"] == 'searchExecution') {
        $_SESSION["success"] = "success";
        header('location:searchExecution.php');
    } else if ($_SESSION["page"] == 'sameRetailer') {
        $_SESSION["success"] = "success";
        header('location:sameRetailer.php');
    } else if ($_SESSION["page"] == 'typeBased') {
        $_SESSION["success"] = "success";
        header('location:typeBased.php');
    }
}
