<?php

    require "connection.php";

    $CategoryID = $_POST["id"];
    $name = $_POST["name"];

// echo $name;
// echo $CategoryID;

    if (empty($name)) {
        echo "Please Enter Category Name.";
    } else {

        // Check Whether the category name already exists or not

        $already_rs = Database::search("SELECT * FROM `category` WHERE `name`='".$name."' ");
        $already_num = $already_rs -> num_rows;

        if($already_num >= '1'){
            echo "This Category Already Exisits.";
        } else{

            // Insert Category Data
            
            Database::iud("UPDATE `category` SET `name` = '".$name."' WHERE `id` = '".$CategoryID."' ");

            echo "success";
            
        }
    }

?>