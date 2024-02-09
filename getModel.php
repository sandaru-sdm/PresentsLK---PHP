<?php

require "connection.php";

$brand_id = $_POST["brand"];

$model_rs = Database::search("SELECT * FROM `model` WHERE status_id = '1' AND `brand_id` = '".$brand_id."'");
$model_num = $model_rs -> num_rows;

$model_list = "";

	for($x = 0; $x < $model_num; $x++){

		$model_data = $model_rs -> fetch_assoc();
		$model_list .= "<option value=\"{$model_data['id']}\">{$model_data['name']}</option>";

	}

	if(isset($model_list)){
		echo $model_list;
	}

?>