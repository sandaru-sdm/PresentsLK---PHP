<?php

require "connection.php";

$adminId = $_GET["id"];

$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `admin` INNER JOIN `status` ON `admin`.`status_id`=`status`.`id` WHERE `admin`.`id` = '".$adminId."'");
$data = $data_rs -> fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if($status_id == 1){

    Database::iud("UPDATE `admin` SET `status_id`='2' WHERE `id`='".$adminId ."'");
    echo "success";

}else{

    Database::iud("UPDATE `admin` SET `status_id`='1' WHERE `id`='".$adminId ."'");
    echo "success";

}

?>