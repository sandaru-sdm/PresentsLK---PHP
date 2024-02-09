<?php
session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    if(isset($_GET["id"])){
        $pid = $_GET["id"];
        $user_id = $_SESSION["u"]["id"];

        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '".$pid."' AND `users_id` = '".$user_id."' ");
        $watclist_num = $watchlist_rs -> num_rows;

        if($watclist_num == 1){

            $watchlist_data = $watchlist_rs -> fetch_assoc();
            $status = $watchlist_data["status_id"];
            $list_id = $watchlist_data["id"];

            Database::iud("DELETE FROM `watchlist`  WHERE `id`='".$list_id."'");
            echo "Removed";
                
        }else{

            Database::iud("INSERT INTO `watchlist` (`product_id`,`users_id`,`status_id`) VALUES('".$pid."','".$user_id."','1') ");
            echo "Added";

        }

    }else{
        echo "reload";
    }

}else{
    echo "redirect";
}
