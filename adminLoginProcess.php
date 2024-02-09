<?php
session_start();

require "connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

if (empty($username)) {
    echo "Please enter your Username.";
} else if (empty($password)) {
    echo "Please enter your password.";
}  else {

    $login_rs = Database::search("SELECT * FROM `admin` WHERE `username` = '".$username."' AND `password` = '".$password."' ");
    $login_num = $login_rs -> num_rows;

    if($login_num == "1"){

        $login_data = $login_rs -> fetch_assoc();

        $_SESSION["admin"] = $login_data;

        if($login_data["status_id"] == "1"){

            echo "success";

        }else{
            echo "This Admin is Not Activated.";
        }

    }else{
        echo "Your Username or Password is Incorrect.";
    }
}
?>