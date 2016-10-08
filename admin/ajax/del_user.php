<?php


	include "../../includes/config.php";
	include "../../includes/functions.php";


	$id = $_POST['id'];


	$query = "DELETE FROM tbl_user WHERE `u_id` = '$id'";

	if($run_query = mysqli_query($con,$query)){

		if(mysqli_affected_rows($con) ==1){

			// echo "success";
			$arr["status"]="success";
			$arr['data'] = "Active";
			$json = json_encode($arr);
			echo $json;
			exit();



		}else{

			// echo "wrong data";
			$arr["status"]="failed";
			$arr["err_msg"] = "wrong data";
			$json = json_encode($arr);
			echo $json;
			exit();

		}

	}else{


		// echo "query failed";
		$arr["status"]="failed";
		$arr["err_msg"] = "query failed";
		$json = json_encode($arr);
		echo $json;
		exit();
	}







?>