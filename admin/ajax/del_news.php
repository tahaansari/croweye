<?php 
	

	include "../../includes/config.php";
	include "../../includes/functions.php";


	$id = $_POST['data'];

	// echo $id;

	$query = "DELETE f.*,s.* FROM `tbl_transaction` f join `tbl_img_data` s on f.`t_id` = s.`id_tran_id` WHERE f.`t_id` = $id";



	if(mysqli_query($con,$query)){

		echo 1;

		exit();

	}else{

		echo "query failed";
		exit();
	}



?>