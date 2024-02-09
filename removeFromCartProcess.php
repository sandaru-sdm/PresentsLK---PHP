<?php

require "connection.php";

if (isset($_GET["id"])) {

    $cart_id = $_GET["id"];

    Database::iud("UPDATE `cart` SET `status_id` = '2', `qty` = '1' WHERE `id` = '".$cart_id."'");

    echo "success";


} else {
    echo "Something wrong.";
}

