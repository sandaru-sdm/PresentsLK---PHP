<?php

    require "connection.php";

    $model_id = $_POST["mid"];
    $model_name = $_POST["mname"];
    $brand_name = $_POST["bname"];
    $brand_id = $_POST["bid"];

//     echo $model_name;
// echo $model_id;
// echo $brand_name;
// echo $brand_id;

    if (empty($model_name)) {
        echo "Please Enter Model Name.";
    } else {

        // Check Whether the Model name already exists or not

        $already_rs = Database::search("SELECT * FROM `model` WHERE `name`='".$model_name."' AND `brand_id`='".$brand_id."'");
        $already_num = $already_rs -> num_rows;

        if($already_num >= '1'){
            echo "This Model Already Exisits.";
        } else{

            // Insert Model Data
            
            Database::iud("UPDATE `model` SET `name` = '".$model_name."' WHERE `id` = '".$model_id."' ");

            echo "success";
            
        }
    }

?>