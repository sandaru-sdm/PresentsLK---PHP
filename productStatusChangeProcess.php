<?php

require "connection.php";

$ID = $_GET["id"];

$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `product` INNER JOIN `status` ON `product`.`status_id`=`status`.`id` WHERE `product`.`id` = '".$ID."'");
$data = $data_rs -> fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if($status_id == 1){

    Database::iud("UPDATE `product` SET `status_id`='2' WHERE `id`='".$ID ."'");
    echo "success";

}else{

    Database::iud("UPDATE `product` SET `status_id`='1' WHERE `id`='".$ID ."'");
    echo "success";

}

?>