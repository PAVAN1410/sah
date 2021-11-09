<?php
require("../config_db.php");
echo dirname(getcwd());
?>
<?php
if (count($_POST)) {
    $p_name = $_POST['p_name'];
    $mrp = $_POST['mrp'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $type = $_POST['type'];
    // Details of file
    $file = $_FILES['imageFile']; //An associative array of items uploaded to the current script via the HTTP POST method.
    $fileName = $file['name'];
    $fileTempName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileError = $file['error'];

    $fileExt = explode('.', $fileName);
    $fileActuatExt = strtolower(end($fileExt));
    // for finding extension of any file
    // //pathinfo( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ])
    // $fileTypeExt = pathinfo($fileName,PATHINFO_EXTENSION); 
    // echo "some text";
    // echo $fileTypeExt;

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    // echo $_SESSION['retailer'] ;
    $retailername = $_SESSION['retailername'];

    if (in_array($fileActuatExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                // $fileNameNew = uniqid('', true) . "." . $fileActuatExt;
                $fileNameNew = pathinfo($fileName, PATHINFO_FILENAME) . $_SESSION['retailername'] . "." . $fileActuatExt;
                $fileDestination = '../uploadedFiles/' . $fileNameNew;
                move_uploaded_file($fileTempName, $fileDestination);
            } else {
                echo "file is too big";
            }
        } else {
            echo "error uploading";
            // pathinfo
        }
    } else {
        echo "cant upload";
    }
    // $dirname = str_replace('\\', '/', dirname(getcwd()));
    $fileDestinationExact = "../uploadedFiles/" . $fileNameNew;
    // Uploading file to database
    $query = "INSERT INTO product(retailername,productname,mrp,price,size,imgsrc,typeofproduct) values ('$retailername','$p_name','$mrp','$price','$size','$fileDestinationExact','$type')";
    $result = mysqli_query($db, $query);
    print_r($result);
    $_SESSION["success"]="success";
    $query = "select * from typeofproduct where typeofproduct='$type' ";
    $result = mysqli_query($db,$query);
    $fetch = mysqli_fetch_assoc($result);
    if(empty($fetch)){
        $query = "insert into typeofproduct(typeofproduct) values('$type')";
        mysqli_query($db,$query);
    }
    header('location: retailer_home_page.php');

}
?>