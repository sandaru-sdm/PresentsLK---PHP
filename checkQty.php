<?php

require "connection.php";

$qty = $_POST["qty"];
$pid = $_POST["pid"];

$product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
$product_data = $product_rs -> fetch_assoc();

$availableQty = $product_data["qty"];

if($availableQty < $qty){
    echo "notEnough";
} else if($qty == 0){
    echo "zero";
} else if($qty < 0){
    echo "zero";
}


?>