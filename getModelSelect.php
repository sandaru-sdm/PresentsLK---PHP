<?php
		$connection = mysqli_connect("localhost", "root", "dilshan2000", "presentlk","3307");

	if (isset($_GET['brand_id']) ) {

		$brandID =  $_GET['brand_id'];

		$query 		= "SELECT `model`.`id` AS `id`, `model`.`name` AS `name` FROM `model` WHERE `brand_id` = '".$brandID."' AND `status_id` = '1'";
		$result_set = mysqli_query($connection, $query);

		$modelList = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$modelList .= "<option value=\"{$result['id']}\">{$result['name']}</option>";
		}
		
        if(isset($modelList)){
            echo $modelList;
        }

	} else {
		echo "<option>Error</option>";
	}

	
?>