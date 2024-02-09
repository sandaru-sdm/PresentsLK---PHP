<?php

    require "connection.php";


     if (!isset($_FILES["img"])) {
        echo "Please Select an Image.";
    } else {
            
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

                    Database::iud("INSERT INTO `display_image` (`path`,`display_image_type_id`,`status_id`) VALUES('".$file_name."','1','1') ");

                    echo "success";

                }else{
                    echo "Invalid Image Type.";
                }
       
    }

?>