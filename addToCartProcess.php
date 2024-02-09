<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    if (isset($_GET["id"])) {

        $pid = $_GET["id"];
        $user_id = $_SESSION["u"]["id"];

        $cart_product_rs = Database::search("SELECT * FROM `cart` WHERE `users_id` = '".$user_id."' AND `product_id` = '".$pid."'");
        $cart_product_num = $cart_product_rs -> num_rows;

        $product_qty_rs = Database::search("SELECT `qty` FROM `product` WHERE `id` = '".$pid."'");
        $product_qty_data = $product_qty_rs -> fetch_assoc();

        $product_qty = $product_qty_data["qty"];


        if ($cart_product_num == 1) {
            $cart_product_data = $cart_product_rs -> fetch_assoc();
            $cart_status = $cart_product_data["status_id"];
            if($cart_status == 2){
                Database::iud("UPDATE `cart` SET `status_id` = '1' WHERE `users_id` = '".$user_id."' AND `product_id` = '".$pid."'");
                echo "success";
            }else{
                $currentQty = $cart_product_data["qty"];
                $newQty = (int)$currentQty + 1;

                if($product_qty >= $newQty){
                    Database::iud("UPDATE `cart` SET `qty` = '".$newQty."' WHERE `users_id` = '".$user_id."' AND `product_id` = '".$pid."'");
                    echo "updated";
                }else{
                    echo "Out of quantity.";
                }
            }
        }else{
            Database::iud("INSERT INTO `cart` (`product_id`,`qty`,`users_id`,`status_id`)
            VALUES('".$pid."','1','".$user_id."','1')");
            echo "success";
        }
    }else{
        echo "reload";
    }
}else{
    echo "redirect";
}

?>