<?php

require "connection.php";
session_start();

if(isset($_POST["pid"])){
    
    $product_id = $_POST["pid"];
    $qty = $_POST["qty"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$product_id."'");
    $product_data = $product_rs -> fetch_assoc();
    $product_qty = $product_data["qty"];

    if($qty < 1){

        echo "Quantity Must Be Greater Than '0'";

    } else if($qty > $product_qty){

        echo "We do not have the item for the quantity you Entered.";

    } else{

        $user_id = $_SESSION["u"]["id"];
        Database::iud("UPDATE `cart` SET `qty` = '".$qty."' WHERE `product_id` = '".$product_id."' AND `users_id` = '".$user_id."' ");
        echo "success";

    }

} else{
    echo "redirect";
}


?>