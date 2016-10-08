<?php

include '../../includes/config.php';

$industry = $_POST['industry'];

$select_client = "SELECT `c_name` FROM `tbl_client` WHERE `c_industry` = '$industry'";
$run_client = mysqli_query($con, $select_client);


if(mysqli_num_rows($run_client)>0){
    
    $counter =1;

    while($row = mysqli_fetch_assoc($run_client)){


    	if($counter==1){

    		$client[] = "<option value=''>Select a Client</option>";
    		$counter++;

    	}

        $client[] = "<option value='".$row['c_name']."'>".$row['c_name']."</option>";
    
    }
    
}else{
    
    $client[] = "<option value='Not Available'>No Client Available</option>";
}

$json = json_encode($client);
echo $json;