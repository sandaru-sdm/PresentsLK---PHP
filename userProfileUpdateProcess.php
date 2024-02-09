<?php
session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $userID = $_SESSION["u"]["id"];

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $postalCode = $_POST["postalCode"];
    // $img = $_FILES["img"]["tmp_name"];

    if(empty($fname)){
        echo "Please enter your First Name.";
    }else if(strlen($fname) > 50){
        echo "First Name must be less than 50 characters.";
    }else if(empty($lname)){
        echo "Please enter your Last Name.";
    }else if(strlen($lname) > 50){
        echo "Last Name must be less than 50 characters.";
    }else if(empty($mobile)){
        echo "Please enter your Mobile Number.";
    }else if(strlen($mobile) != 10){
        echo "Mobile Number should contain 10 characters.";
    }else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
        echo "Invalid Mobile Number.";
    }else if(empty($line1)){
        echo "Please enter your Address Line 1.";
    }else if(strlen($line1) > 50){
        echo "Address Line 1 must be less than 50 characters.";
    }else if(empty($line2)){
        echo "Please enter your Address Line 2.";
    }else if(strlen($line2) > 50){
        echo "Address Line 2 must be less than 50 characters.";
    }else if(empty($province)){
        echo "Please Select Your Province.";
    }else if(empty($district)){
        echo "Please Select Your District.";
    }else if(empty($city)){
        echo "Please Select Your City.";
    }else if(empty($postalCode)){
        echo "Please Enter Your Postal Code.";
    }else if(strlen($postalCode) != 5){
        echo "Postal Code should contain 5 characters.";
    }else{
        
        if(isset($_FILES["img"])){

            $image = $_FILES["img"];

            $allowed_image_extentions = array("image/jpg","image/jpeg","image/png","image/svg");
            
            $file_ex = $image["type"];

            if(!in_array($file_ex,$allowed_image_extentions)){

                echo "Please Select a Valid Image";

            }else{
                $new_iamge_extention;

                if($file_ex == "image/jpg"){
                    $new_iamge_extention = ".jpg";
                } else if($file_ex == "image/jpeg"){
                    $new_iamge_extention = ".jpeg";
                }else if($file_ex == "image/png"){
                    $new_iamge_extention = ".png";
                }else if($file_ex == "image/svg+xml"){
                    $new_iamge_extention = ".svg";
                }

                $file_name = "Resources//User_Profile_img//".uniqid().$new_iamge_extention;

                move_uploaded_file($image["tmp_name"],$file_name);

                $profile_pic_rs = Database::search("SELECT * FROM `profile_image` WHERE `users_id` = '" . $_SESSION["u"]["id"] . "'");
            
                $profile_pic_num = $profile_pic_rs -> num_rows;

                if ($profile_pic_num == 1) {

                    $image_data = $profile_pic_rs -> fetch_assoc();
                    $oldImgPath = $image_data["path"];

                    Database::iud("UPDATE `profile_image` SET `path` = '" . $file_name . "' WHERE `users_id` = '" . $_SESSION["u"]["id"] . "' ");
                
                    $oldProfile = explode("//", $oldImgPath ); 

                    $remove_path = "Resources//User_Profile_img//".$oldProfile[2];

                    unlink($remove_path);

                } else {
                    Database::iud("INSERT INTO `profile_image`(`path`,`users_id`) VALUES('" . $file_name . "','" . $_SESSION["u"]["id"] . "') ");
                }

            }

        }

        Database::iud("UPDATE `users` SET 
        `fname` = '" . $fname . "', 
        `lname` = '" . $lname . "', 
        `mobile` = '" . $mobile . "'
        WHERE `id` = '" . $_SESSION["u"]["id"] . "' ");
        
        $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `users_id` = '" . $_SESSION["u"]["id"] . "' ");
        $address_num = $address_rs->num_rows;
    
        if ($address_num == 1) {
            Database::iud("UPDATE `user_has_address` SET 
                `line1` = '" . $line1 . "',
                `line2` = '" . $line2 . "',
                `city_id` = '" . $city . "',
                `postal_code` = '" . $postalCode . "'
                WHERE `users_id` = '" . $_SESSION["u"]["id"] . "'");
        } else {
            Database::iud("INSERT INTO `user_has_address`(`line1`,`line2`,`users_id`,`city_id`,`postal_code`) 
                VALUES('".$line1."','".$line2."','".$_SESSION["u"]["id"]."','".$city."','".$postalCode."') ");
        }

        echo "success";
            
    }

} else{

    echo "redirect";

}

?>