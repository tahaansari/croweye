<?php

parse_str($_POST['data'],$str);

include '../../includes/config.php';


$state = trim($str['state']);

$select_query = "SELECT `City` FROM `tbl_state_city` WHERE `State` = '$state'";
$run_query = mysqli_query($con, $select_query);

$counter = 1;

while($row = mysqli_fetch_assoc($run_query)){

	if($counter==1){

		$city[] = "<option value=''>Select City</option>";
		$counter++;

	}
    
    $city[] = "<option value='".$row['City']."'>".$row['City']."</option>";
    
}

$json =  json_encode($city);
echo $json;