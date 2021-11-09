<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

if($_SESSION['status']!="Active")
{
    header("location:../login_page.php");
}
 
?>
