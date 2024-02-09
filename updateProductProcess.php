<?php

// echo "OK";

require "connection.php";

        $product_id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $dfc = $_POST["dfc"];
        $dfoc = $_POST["dfoc"];
        
        if (empty($title)) {
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
        } else if (empty($dfc)) {
            echo "Please enter the Delivery price in Colombo.";
        } else if (!is_numeric($dfc)) {
            echo "Please enter a valid delivery Price.";
        } else if (empty($dfoc)) {
            echo "Please enter the Delivery price Out of Colombo.";
        } else if (!is_numeric($dfoc)) {
            echo "Please enter a valid delivery Price.";
        } else {
            
            // Check Whether the Product already exists or not

            $already_rs = Database::search("SELECT * FROM `product` WHERE `title`='".$title."' AND `price`='".$price."'");
            
            $already_num = $already_rs -> num_rows;

            if($already_num >= '1'){
                echo "This Product Already Exisits.";
            } else{

                // Insert Product Data

                Database::iud(" UPDATE `product` SET `title` = '".$title."', `description` = '".$description."', 
                `price` = '".$price."', `qty`='".$qty."', `delivery_fee_colombo` = '".$dfc."', `delivery_fee_other` = '".$dfoc."' WHERE `id` = '".$product_id."' ");

                echo "success";

            }

        }

        // echo $product_id;
        // echo "<br />";
        // echo $title;
        // echo "<br/>";
        // echo $description;
        // echo "<br/>";
        // echo $price;
        // echo "<br/>";
        // echo $qty;
        // echo "<br/>";
        // echo $dfc;
        // echo "<br/>";
        // echo $dfoc;
        // echo "<br/>";
      

?>