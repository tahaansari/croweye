<?php 

	include "../includes/config.php";
	include "../includes/functions.php";

	$validation_error = "";

	if(trim($_POST['email']) ==""){

		$validation_error .= "<li>Enter Email</li>";

	}else if(!preg_match($email_pattern, trim($_POST['email']))){

		$validation_error .= "<li>Invalid Email</li>";

	}else{

		$email = escape_data($_POST['email']);

	}


	if(trim($_POST['industry']) == "" ){

		$validation_error .= "<li>Select Industry</li>";

	}else{

		$industry =escape_data($_POST['industry']);
	}

	if(trim($_POST['company_name']) == ""){

		$validation_error .= "<li>Enter Company Name</li>";

	}else{

		$company_name = escape_data($_POST['company_name']);
	}

	if(trim($_POST['contact_no']) == ""){


		$validation_error .= "<li>Enter Contact No</li>";

	}else{

		$contact_no = escape_data($_POST['contact_no']);
	}



	if($validation_error==""){


		$admin_email = $email;
		$email = "taha.m.ansari@gmail.com";
		$subject = "Request for trail service";
		$comment = "Hello this is just a test msg";
		  
		  //send email
		mail($admin_email, "$subject", $comment, "From:" . $email);
		  
		  //Email response


		$arr['status']='success';
		$json = json_encode($arr);
		echo $json;
		exit();


	}else{

		$arr['status']='failed';
		$arr['err_msg'] = 'validation error';
		$arr['data'] = $validation_error;

		$json = json_encode($arr);
		echo $json;
		exit();


	}





?>