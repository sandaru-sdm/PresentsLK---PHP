<?php

require "connection.php";

$categoryID = $_GET["id"];

$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `category` INNER JOIN `status` ON `category`.`status_id`=`status`.`id` WHERE `category`.`id` = '".$categoryID."'");
$data = $data_rs -> fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if($status_id == 1){

    Database::iud("UPDATE `category` SET `status_id`='2' WHERE `id`='".$categoryID ."'");
    echo "success";

}else{

    Database::iud("UPDATE `category` SET `status_id`='1' WHERE `id`='".$categoryID ."'");
    echo "success";

}

?>