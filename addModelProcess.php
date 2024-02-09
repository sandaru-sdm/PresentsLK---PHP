<?php

require "connection.php";

$model = $_POST["model"];
$brand = $_POST["brand"];

if ($brand == "0") {
    echo "Please Select a Brand.";
}else if (empty($model)) {
    echo "Please enter Model Name.";
} else {

    $model_rs = Database::search("SELECT * FROM `model` WHERE `name` = '".$model."' AND `brand_id`='".$brand."'");
    $model_num = $model_rs -> num_rows;

    if($model_num == '1'){

        echo "This Model Already Exists.";

    }else{

        Database::iud("INSERT INTO `model` (`name`,`brand_id`,`status_id`) VALUES ('".$model."','".$brand."','1') ");
        
        echo "success";

    }

}

?>