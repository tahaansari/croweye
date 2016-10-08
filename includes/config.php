<?php

// ]	local
	define("host","localhost");
	define("username","root");
	define("password","root");
	define("database","croweye");


	// server
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

		echo "cannot connect to server";
		exit();
	}

?>


