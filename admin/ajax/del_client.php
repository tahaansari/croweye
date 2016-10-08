<?php 
	

	include "../../includes/config.php";
	include "../../includes/functions.php";


	$id = $_POST['data'];

	// echo $id;

	$query = "DELETE FROM `tbl_client` WHERE `c_id` = '$id'";

	if($query = mysqli_query($con,$query)){

		if(mysqli_affected_rows($con)==1){

			echo 1;
			exit();

		}else{

			echo "wrong data";
			exit();
		}

	}else{

		echo "query failed";
		exit();
	}



?>