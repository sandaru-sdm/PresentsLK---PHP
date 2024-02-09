<?php

require "connection.php";

require "email/Exception.php";
require "email/PHPMailer.php";
require "email/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $resultset = Database::search("SELECT * FROM `users` WHERE `email`='".$email."'");
    $n = $resultset->num_rows;

    if($n == 1){

        $code = uniqid();
        
        Database::iud("UPDATE `users` SET `verification_code`='".$code."'
        WHERE `email`='".$email."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'thebatman202011@gmail.com'; 
            $mail->Password = 'svavweaiyuaqdrmi'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('thebatman202011@gmail.com', 'PresentsLK'); 
            $mail->addReplyTo('thebatman202011@gmail.com', 'PresentsLK'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'PresentsLK Forget Password Verification Code.'; 
            $bodyContent = '<h1 style="color:green;">Your verification code is : '.$code.'</h1>'; 
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }

    }else{
        echo "Email Address not found";
    }

}else{

    echo "Please Enter Your Email Address.";

}

?>