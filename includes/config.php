<?php

	//local
	define("host","localhost");
	define("username","root");
	define("password","root");
	define("database","croweye");

	// server
	// bluehost ip
	// 103.21.58.244
	// 103.204.120.130


	// define("host","localhost");
	// define("username","crowefsy_admin");
	// define("password","admin@admin");
	// define("database","crowefsy_croweye");

	if($con = mysqli_connect(host,username,password)){

		if(!mysqli_select_db($con,database)){

			echo "cannot select the database";
			exit();
		}


	}else{

		echo "hello cannot connect to server".mysqli_connect_error();
		exit();

	}

?>


