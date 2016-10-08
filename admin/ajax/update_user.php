<?php


	include "../../includes/config.php";
	include "../../includes/functions.php";

	$id = $_POST['id'];

	if($_POST['status']=='Active'){

			$query = "UPDATE `tbl_user` SET `u_active`= 'n' WHERE `u_id` = '$id'";

	}else if($_POST['status']=='Deactive'){

			$query = "UPDATE `tbl_user` SET `u_active`= 'y' WHERE `u_id` = '$id'";

	}

	// echo $query;
	// exit();

	if($run_query = mysqli_query($con,$query)){

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