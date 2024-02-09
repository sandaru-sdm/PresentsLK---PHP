<?php
	require "connection.php";
	
	$province_id = $_POST["id"];

	$district_rs = Database::search("SELECT * FROM `district` WHERE `province_id` = '".$province_id."'");
	$district_num = $district_rs -> num_rows;

		$district_list = "";
		
		for($x = 0; $x < $district_num; $x++){

			$district_data = $district_rs -> fetch_assoc();
			$district_list .= "<option value=\"{$district_data['id']}\">{$district_data['name']}</option>";

		}

		if(isset($district_list)){
			echo $district_list;
		}

