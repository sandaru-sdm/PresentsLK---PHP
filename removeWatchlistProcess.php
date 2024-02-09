<?php

require "connection.php";

if(isset($_GET["id"])){

    $pid = $_GET["id"];

    $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `id` = '".$pid."' ");

    $watch_num = $watch_rs -> num_rows;

    if($watch_num == 0){

        echo "reload.";

    }else{
        Database::iud("DELETE FROM `watchlist` WHERE `id`='".$pid."'");

        echo "success";

    }

}else{
    echo "Please Select a Product";
}

?>