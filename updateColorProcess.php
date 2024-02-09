<?php

    require "connection.php";

    $colorID = $_POST["id"];
    $name = $_POST["name"];

// echo $name;
// echo $brandID;

    if (empty($name)) {
        echo "Please Enter Color Name.";
    } else {

        // Check Whether the Brand name already exists or not

        $already_rs = Database::search("SELECT * FROM `color` WHERE `name`='".$name."' ");
        $already_num = $already_rs -> num_rows;

        if($already_num >= '1'){
            echo "This Color Already Exisits.";
        } else{

            // Insert Admin Data
            
            Database::iud("UPDATE `color` SET `name` = '".$name."' WHERE `id` = '".$colorID."' ");

            echo "success";
            
        }
    }

?>