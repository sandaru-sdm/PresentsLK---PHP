<?php

require "connection.php";

$brandID = $_GET["id"];

$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `brand` INNER JOIN `status` ON `brand`.`status_id`=`status`.`id` WHERE `brand`.`id` = '".$brandID."'");
$data = $data_rs -> fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if($status_id == 1){

    Database::iud("UPDATE `brand` SET `status_id`='2' WHERE `id`='".$brandID ."'");
    echo "success";

}else{

    Database::iud("UPDATE `brand` SET `status_id`='1' WHERE `id`='".$brandID ."'");
    echo "success";

}

?>