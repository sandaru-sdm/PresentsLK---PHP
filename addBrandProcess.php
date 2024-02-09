<?php

require "connection.php";

$brand = $_POST["brand"];

if (empty($brand)) {
    echo "Please enter Brand Name.";
} else {

    $brand_rs = Database::search("SELECT * FROM `brand` WHERE `name` = '".$brand."'");
    $brand_num = $brand_rs -> num_rows;

    if($brand_num == '1'){

        echo "This Brand Already Exists.";

    }else{

        Database::iud("INSERT INTO `brand` (`name`,`status_id`) VALUES ('".$brand."','1') ");
        
        echo "success";

    }

}

?>