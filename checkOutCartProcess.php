<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    $user = $_SESSION["u"]["id"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_id` = '".$user."' AND `status_id` = '1'");
        $cart_num = $cart_rs -> num_rows;

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d -> setTimezone($tz);

        $date = $d -> format("Y-m-d H:i:s");

        $order_id = uniqid();

        Database::iud("INSERT INTO `invoice` (`users_id`,`date_time`,`order_id`,`invoice_status_id`) 
                     VALUES ('".$user."','".$date."','".$order_id."','0') ");

        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '".$order_id."'");
        $invoice_data = $invoice_rs -> fetch_assoc();

        $invoice_id = $invoice_data["id"];

    for($x = 0; $x<$cart_num; $x++){

        $cart_data = $cart_rs -> fetch_assoc();
        $product_id = $cart_data["product_id"];
        $qty = $cart_data["qty"];

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$product_id."'");
        $product_data = $product_rs -> fetch_assoc();

        $product_price = $product_data["price"];

        $total = $product_price * $qty;

        Database::iud("INSERT INTO `invoice_item` (`product_id`,`qty`,`total`,`invoice_id`) 
            VALUES ('".$product_id."','".$qty."','".$total."','".$invoice_id."')");

        $prs = Database::search("SELECT * FROM `product` WHERE `id` = '".$product_id."' ");
        $pdata = $prs -> fetch_assoc();
        $product_qty = $pdata["qty"];

        $new_qty = $product_qty - $qty;

        Database::iud("UPDATE `product` SET `qty` = '".$new_qty."' WHERE `id` = '".$product_id."' ");

        Database ::iud("UPDATE `cart` SET `status_id`='2' WHERE `product_id`='".$product_id."'");
        
    }

    $_SESSION["order_id"] = $order_id;
    echo $order_id;  
     

}
