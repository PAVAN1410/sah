<?php
require("../config_db.php");
?>
<?php
if (count($_POST)) {
    $retailername = $_POST['retailername'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phno'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $query = "INSERT INTO retailer (retailername,email,password,phoneNumber,address) values('$retailername','$email','$password','$phonenumber','$address')";
    mysqli_query($db, $query);
    $_SESSION['status'] = "Active";
    $_SESSION['retailername'] = $retailername;
    header('location: retailer_home_page.php');
}
?>