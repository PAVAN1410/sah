<?php
require("../config_db.php");
?>

<?php
if (count($_POST)) {
    $retailername = $_POST['retailername'];
    $password = $_POST['password'];
    echo $username;
    // $password = $_POST['password'];

    $query = "SELECT * FROM retailer WHERE retailername='$retailername'  AND password = '$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result)) {
        $fetch = mysqli_fetch_assoc($result);
        $_SESSION['retailername'] = $fetch['retailername'];
        // $_SESSION['retailer'] = $retailername;
        $_SESSION['status']="Active";
        header('location: retailer_home_page.php');
    } else {
        echo 'some error';
    }
}
?>