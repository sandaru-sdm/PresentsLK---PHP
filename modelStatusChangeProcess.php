<?php

require "connection.php";

$ID = $_GET["id"];

$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `model` INNER JOIN `status` ON `model`.`status_id`=`status`.`id` WHERE `model`.`id` = '".$ID."'");
$data = $data_rs -> fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if($status_id == 1){

    Database::iud("UPDATE `model` SET `status_id`='2' WHERE `id`='".$ID ."'");
    echo "success";

}else{

    Database::iud("UPDATE `model` SET `status_id`='1' WHERE `id`='".$ID ."'");
    echo "success";

}

?>