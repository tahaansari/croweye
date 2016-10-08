<?php


	include "../../includes/config.php";
	include "../../includes/functions.php";

	$id = $_POST['id'];
	$period = $_POST['period'];


	$cur_date = date('Y-m-d');
    $pkg_exp_date = date('Y-m-d', strtotime($cur_date. ' + '.$period.' days'));

    

	$query = "UPDATE `tbl_client` SET `c_active`= 'yes',`c_pkg_pur_date`='$cur_date',`c_pkg_exp_date`='$pkg_exp_date' WHERE `c_id` = '$id'";

	// echo $query;
	// exit();


	if($run_query = mysqli_query($con,$query)){

		if(mysqli_affected_rows($con)==1){

			$arr['status'] = 'success';
			$arr['c_pkg_pur_date'] = date('d-m-Y',strtotime($cur_date));
			$arr['c_pkg_exp_date'] = date('d-m-Y',strtotime($pkg_exp_date));

			echo json_encode($arr);
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