<?php

    require "connection.php";

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $adminID = $_POST["adminID"];
    $preview = $_POST["preview"];


    if (empty($fname)) {
        echo "Please Enter First Name.";
    } else if (empty($lname)) {
        echo "Please Enter Last Name.";
    } else {

        // Check Whether the admins fname and lname already exists or not

        $already_rs = Database::search("SELECT * FROM `admin` WHERE `fname`='".$fname."' AND `lname`='".$lname."' ");
        $already_num = $already_rs -> num_rows;

        if($already_num >= '1'){
            echo "This Admin First Name and Last Name Already Exisits.";
        } else{

            // Insert Admin Data
            
            Database::iud("UPDATE `admin` SET `fname` = '".$fname."', `lname` = '".$lname."' WHERE `id` = '".$adminID."' ");

            $admin_rs = Database::search("SELECT * FROM `admin` WHERE `fname`='".$fname."' AND `lname`='".$lname."' ");
            $admin_data = $admin_rs -> fetch_assoc();

            $admin_id = $admin_data["id"];

            // Image Uploading

            if(empty($preview) || isset($_FILES["img"])){

                $image_rs = Database::search("SELECT * FROM `admin_image` WHERE `admin_id` = '".$admin_id."'");
                $image_data =  $image_rs -> fetch_assoc();

                $oldImgPath = $image_data["path"];

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

                        if($oldImgPath != $file_name){

                        move_uploaded_file($imagefile["tmp_name"], $file_name);

                        Database::iud("UPDATE `admin_image` SET `path` = '".$file_name."' WHERE `admin_id`='".$admin_id."' ");

                        $uID = explode("//", $oldImgPath ); 

                        $remove_path = "Resources//admin_img//".$uID[2];

                        unlink($remove_path);

                        echo "success";

                        }

                    }else{
                        echo "Invalid Image Type.";
                    }
            }else{
                echo "success";
            }
        }
    }

?>