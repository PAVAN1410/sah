<?php
require("../config_db.php");
?>

<?php
    if(count($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username;
        // $password = $_POST['password'];
        
        $query = "SELECT * FROM user WHERE username='$username'  AND password = '$password'";
        $result = mysqli_query($db,$query);
        
        if(mysqli_num_rows($result)){
            $fetch = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $fetch['username'];
            $_SESSION['status']="Active";
            header('location: user_home_page.php');
        }
        else{
            echo 'some error';
        }
    }
?>