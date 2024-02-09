<?php

session_start();
date_default_timezone_set("Asia/Colombo");
$today = date("Y-m-d H:i:s");
require "connection.php";

    $user = $_SESSION["u"]["id"];
    
    if (isset($_POST["id"])) {
        $pid = $_POST["id"];
        $feedback = $_POST["f"];
        $type = $_POST["t"];

        $already_rs = Database::search("SELECT * FROM `feedback` WHERE `users_id` = '".$user."' AND `product_id` = '".$pid."' ");
        $already_num = $already_rs -> num_rows;

         if (empty($feedback)) {
                echo "Your feedback is empty.";
            } else if(strlen($feedback) > 250){
                echo "Feedback is too long!";
            }else{

                if($already_num == 1){
                    echo "Your Feedback is Already Recorded...!";
                }else{

                Database::iud("INSERT INTO `feedback` (`feedback`,`product_id`,`users_id`,`date`,`feedback_type_id`) VALUES (
                    '".$feedback."','".$pid."','".$user."','".$today."','".$type."')");
                echo "success";
                }
            }
        
    } else {
        echo "Something went wrong.";
    }
    