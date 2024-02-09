<?php

require "connection.php";

$caroId = $_GET["id"];

$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `display_image` INNER JOIN `status` ON `display_image`.`status_id`=`status`.`id` WHERE `display_image`.`id` = '".$caroId."'");
$data = $data_rs -> fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if($status_id == 1){

    Database::iud("UPDATE `display_image` SET `status_id`='2' WHERE `id`='".$caroId ."'");
    echo "success";

}else{

    Database::iud("UPDATE `display_image` SET `status_id`='1' WHERE `id`='".$caroId ."'");
    echo "success";

}

?>