<?php

    require "connection.php";

    $brandID = $_POST["id"];
    $name = $_POST["name"];

// echo $name;
// echo $brandID;

    if (empty($name)) {
        echo "Please Enter Brand Name.";
    } else {

        // Check Whether the Brand name already exists or not

        $already_rs = Database::search("SELECT * FROM `brand` WHERE `name`='".$name."' ");
        $already_num = $already_rs -> num_rows;

        if($already_num >= '1'){
            echo "This Brand Already Exisits.";
        } else{

            // Insert Admin Data
            
            Database::iud("UPDATE `brand` SET `name` = '".$name."' WHERE `id` = '".$brandID."' ");

            echo "success";
            
        }
    }

?>