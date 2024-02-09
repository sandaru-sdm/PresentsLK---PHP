<?php

    require "connection.php";

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if (empty($fname)) {
        echo "Please Enter First Name.";
    } else if (empty($lname)) {
        echo "Please Enter Last Name.";
    }else if (empty($username)) {
        echo "Please Enter Username.";
    } else if (empty($password)) {
        echo "Please Enter Pasword.";
    }else if(strlen($password) < 5 || strlen($password) > 20){
        echo "Password length should be between 05 and 20";
    }else if (empty($confirm)) {
        echo "Please Enter Confirm Pasword";
    }else if ($password != $confirm) {
        echo "Confirm Password Does not match to password.";
    } else if (!isset($_FILES["img"])) {
        echo "Please Select an Image.";
    } else {

        // Check Whether the admin already exists or not

        $already_rs = Database::search("SELECT * FROM `admin` WHERE `fname`='".$fname."' AND `lname`='".$lname."' OR `username`='".$username."' ");
        $already_num = $already_rs -> num_rows;

        if($already_num >= '1'){
            echo "This Admin Already Exisits.";
        } else{

            // Insert Admin Data
            
            Database::iud("INSERT INTO `admin` (`fname`,`lname`,`username`,`password`,`status_id`) 
            VALUES ('".$fname."','".$lname."','".$username."','".$password."','1') ");

            $admin_rs = Database::search("SELECT * FROM `admin` WHERE `fname`='".$fname."' AND `lname`='".$lname."' AND `username`='".$username."' ");
            $admin_data = $admin_rs -> fetch_assoc();

            $admin_id = $admin_data["id"];

            // Image Uploading

            $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
            $imagefile = $_FILES["img"];

            $file_extention = $imagefile["type"];

                if (in_array($file_extention, $allowed_image_extentions)) {

                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "Resources//admin_img//" . uniqid() . $new_img_extention;
                    move_uploaded_file($imagefile["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `admin_image` (`path`,`admin_id`) VALUES('".$file_name."','".$admin_id."') ");

                    echo "success";

                }else{
                    echo "Invalid Image Type.";
                }
        }
    }

?>