<?php

require "connection.php";

$category = $_POST["category"];

if (empty($category)) {
    echo "Please enter Category Name.";
} else {

    $category_rs = Database::search("SELECT * FROM `category` WHERE `name` = '".$category."'");
    $category_num = $category_rs -> num_rows;

    if($category_num == '1'){

        echo "This Category Already Exists.";

    }else{

        Database::iud("INSERT INTO `category` (`name`,`status_id`) VALUES ('".$category."','1') ");
        
        echo "success";

    }

}

?>