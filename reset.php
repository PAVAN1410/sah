<?php
session_start();
require("config_db.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <style>
        body {
            background-color: bisque;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .center {
            height: 40%;
            width: 40%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="center">
        <h2>A verification code is sent to your registered email</h2>
        Enter the verification code
        <form action="reset.php" method="post">
            <input type="text" name="code">
            <button type="submit">submit</button>
        </form>
    </div>



    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $_SESSION['username'] = $_POST['username'];

        // echo $username;
        $query = "SELECT * FROM user WHERE username='$username' ";
        $result = mysqli_query($db, $query);

        $fetch = mysqli_fetch_assoc($result);

        $email = $fetch['email'];
        // echo $email;
        // Import PHPMailer classes into the global namespace 


        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer;



        $mail->isSMTP();                      // Set mailer to use SMTP 
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;               // Enable SMTP authentication 
        $mail->Username = 'alluarjunno2@gmail.com';   // SMTP username 
        $mail->Password = 'alluarjun1234';   // SMTP password 
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 587;                    // TCP port to connect to 

        // Sender info 
        $mail->setFrom('krishnapavanayitha@gmail.com', 'SAH');
        $mail->addReplyTo('alluarjunno2@gmail.com', 'SAH');

        // Add a recipient 
        $mail->addAddress($email);

        
        // Set email format to HTML 
        $mail->isHTML(true);

        // Mail subject 
        $mail->Subject = 'Email from SAH';

        // Mail body content 
        $bodyContent = '<h1>Request to change password</h1>';
        $rand = random_int(100000, 999999);
        $bodyContent .= "<p>OTP for changing the password is <b>$rand</b></p>";
        $mail->Body    = $bodyContent;

        // Send email 
        if (!$mail->send()) {
            // echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            // echo 'Message has been sent.';
        }
        $query = "SELECT * FROM reset WHERE username='$username'";
        $result = mysqli_query($db, $query);
        $fetch = mysqli_fetch_assoc($result);
        // echo "dsaf";
        // print_r($fetch.'sd');
        if ($fetch == []) {
            // echo 'null';
        }
        if ($fetch == null) {
            $query = "INSERT INTO reset (username,otp) VALUES ('$username','$rand')";
            mysqli_query($db, $query);
            // echo "<br> sdaf" . $_SESSION["page"];
        } else {
            $id = $fetch['id'];
            $query = "UPDATE reset SET otp = '$rand' WHERE reset.id ='$id' ";
            mysqli_query($db, $query);

            // echo "<br> sdaf" . $_SESSION["page"];
        }
    }
    ?>

    <?php

    if (isset($_POST['code'])) {

        $username=$_SESSION['username'];
        $query = "SELECT * FROM reset WHERE username='$username'";
        $result = mysqli_query($db, $query);
        $fetch = mysqli_fetch_assoc($result);
        if ($fetch['otp'] == $_POST['code']) {
            header("location:fixpassword.php");
        } else {
            echo 'wrong code';
        }
    }
    ?>



</body>