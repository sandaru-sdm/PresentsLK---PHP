<?php
	require "connection.php";

	$district_id = $_POST["id"];

	$city_rs = Database::search("SELECT * FROM `city` WHERE `district_id` = '".$district_id."'");
	$city_num = $city_rs -> num_rows;
	
	$city_list = "";

	for($x = 0; $x < $city_num; $x++){

		$city_data = $city_rs -> fetch_assoc();
		$city_list .= "<option value=\"{$city_data['id']}\">{$city_data['name']}</option>";

	}

	if(isset($city_list)){
		echo $city_list;
	}
