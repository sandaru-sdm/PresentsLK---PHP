<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $product_id = $_POST["pid"];
    $qty = $_POST["qty"];

    if(isset($product_id)){

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$product_id."'");
        $product_data = $product_rs -> fetch_assoc();
        $product_qty = $product_data["qty"];

        if($qty == 0){

            echo "qty0";

        } else if($qty >= $product_qty){

            echo "qtyMin";

        }else{

            $user = $_SESSION["u"]["id"];

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

            $product_price = $product_data["price"];
            $total = $product_price * $qty;

            Database::iud("INSERT INTO `invoice_item` (`product_id`,`qty`,`total`,`invoice_id`) 
            VALUES ('".$product_id."','".$qty."','".$total."','".$invoice_id."')");

            $new_qty = $product_qty - $qty;

            Database::iud("UPDATE `product` SET `qty` = '".$new_qty."' WHERE `id` = '".$product_id."' ");
            
            $_SESSION["order_id"] = $order_id;

            echo $order_id;

        }

    }else{
        echo "allproduct";
    }

}else{
    echo "index";
}

?>