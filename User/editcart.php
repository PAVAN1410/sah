<?php
require('../config_db.php');
if(isset($_POST['delete'])){
$id =$_POST['delete'];
echo $id;
$query = "DELETE FROM cart WHERE id = $id";
mysqli_query($db,$query);
header('location:cart.php');
}
?>