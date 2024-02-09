<?php

require "connection.php";

$userId = $_GET["id"];

$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `admin` INNER JOIN `status` ON `admin`.`status_id`=`status`.`id` WHERE `admin`.`id` = '".$userId."'");
$data = $data_rs -> fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if($status_id == 1){

    Database::iud("UPDATE `users` SET `status_id`='2' WHERE `id`='".$userId ."'");
    echo "success";

}else{

    Database::iud("UPDATE `users` SET `status_id`='1' WHERE `id`='".$userId ."'");
    echo "success";

}

?>