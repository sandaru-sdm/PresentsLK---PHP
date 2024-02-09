<?php

require "connection.php";

        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $color = $_POST["color"];
        $dfc = $_POST["dfc"];
        $dfoc = $_POST["dfoc"];
        $condition = $_POST["condition"];
        $category = $_POST["category"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];

        // $image0 = $_FILES["img0"];
        // $image1 = $_FILES["img1"];
        // $image2 = $_FILES["img2"];
        // $image3 = $_FILES["img3"];
        // $image4 = $_FILES["img4"];

        $img_count = $_POST["count"];

        
        if($img_count < "3"){
            echo "Please Add Atleast 3 Product Images.";
        }else if (empty($title)) {
            echo "Please Enter the title of your Product.";
        } else if (strlen($title) > 100) {
            echo "Your title should have 100 or less character length.";
        }else if (empty($description)) {
            echo "Please enter a description.";
        } else if (empty($price)) {
            echo "Please enter the unit price of your product.";
        } else if (!is_numeric($price)) {
            echo "Please enter a valid Price.";
        } else if (empty($qty)) {
            echo "Please add a quantity.";
        } else if ($qty == "0" || !is_numeric($qty) || $qty < 0) {
            echo "Please enter a valid quantity.";
        }else if ($color == "0") {
            echo "Please Select a Color.";
        } else if (empty($dfc)) {
            echo "Please enter the Delivery price in Colombo.";
        } else if (!is_numeric($dfc)) {
            echo "Please enter a valid delivery Price.";
        } else if (empty($dfoc)) {
            echo "Please enter the Delivery price Out of Colombo.";
        } else if (!is_numeric($dfoc)) {
            echo "Please enter a valid delivery Price.";
        }else if ($condition == "0") {
            echo "Please Select a Condition.";
        } else if ($category == "0") {
            echo "Please Select a Category.";
        } else if ($brand == "0") {
            echo "Please Select a Brand.";
        }  else if ($model == "0") {
            echo "Please Select a Model.";
        }  else if (!isset($_FILES["img0"]) || !isset($_FILES["img2"]) || !isset($_FILES["img3"])) {
            echo "Please Add Atleast 3 Product Images.";
        } else {
            
            // Check Whether the Product already exists or not

            $already_rs = Database::search("SELECT * FROM `product` WHERE `title`='".$title."' AND `price`='".$price."' 
            AND `category_id`='".$category."' AND `model_id`='".$model."' AND `condition_id`='".$condition."' AND `color_id`='".$color."' ");
            
            $already_num = $already_rs -> num_rows;

            if($already_num >= '1'){
                echo "This Product Already Exisits.";
            } else{

                // Insert Product Data

                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date  = $d->format("Y-m-d H:i:s");

                Database::iud("INSERT INTO `product` (`title`,`description`,`price`,`qty`,`datetime_added`,
                `delivery_fee_colombo`,`delivery_fee_other`,`category_id`,`model_id`,`condition_id`,`color_id`,`status_id`) 
                VALUES ('".$title."','".$description."','".$price."','".$qty."','".$date."','".$dfc."','".$dfoc."',
                '".$category."','".$model."','".$condition."','".$color."','1') ");

                $product_id = Database::$connection->insert_id;

                //Image Uploading Process

                for($x=0; $x < $img_count; $x++){
                    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
                    $imagefile = $_FILES["img".$x];;
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

                        $file_name = "Resources//Product_img//" . uniqid() . $new_img_extention;
                        move_uploaded_file($imagefile["tmp_name"], $file_name);

                        Database::iud("INSERT INTO `images` (`code`,`product_id`) 
                        VALUES('".$file_name."','".$product_id."') ");

                    }else{
                        echo "Invalid Image Type.";
                    }

                }

                echo "success";

            }

        }


        // echo $title;
        // echo "<br/>";
        // echo $description;
        // echo "<br/>";
        // echo $price;
        // echo "<br/>";
        // echo $qty;
        // echo "<br/>";
        // echo $color;
        // echo "<br/>";
        // echo $dfc;
        // echo "<br/>";
        // echo $dfoc;
        // echo "<br/>";
        // echo $condition;
        // echo "<br/>";
        // echo $category;
        // echo "<br/>";
        // echo $brand;
        // echo "<br/>";
        // echo $image0["tmp_name"];
        // echo "<br/>";
        // echo $image1["tmp_name"];
        // echo "<br/>";
        // echo $image2["tmp_name"];
        // echo "<br/>";
        // echo $image3["tmp_name"];
        // echo "<br/>";
        // echo $image4["tmp_name"];
        // echo "<br/>";
        // echo $img_count;
        // echo "<br/>";

?>