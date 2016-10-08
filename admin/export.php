<?php

require 'library.php';


$exporter = new ExportDataExcel('browser', 'test.xls');

$exporter->initialize(); // starts streaming data to web browser


include '../includes/config.php';
include '../includes/functions.php';


 $query = "SELECT `t_id`, `t_u_id`, `t_pub_date`, `t_title`, `t_news_type`, `t_journalist`, `t_guest`, `t_pub_name`, `t_pub_edition`, `t_pub_suppliment`, `t_pub_language`, `t_industry`, `t_client_name`, `t_summary` FROM `tbl_transaction`";

 if($run_query = mysqli_query($con,$query)){

 	if(mysqli_num_rows($run_query)>0){

 		// $fields = mysqli_fetch_field($run_query);
 		// print_r($fields->name);
 		// exit();

 		$fields = array("Tran ID", "Tran User ID", "Publication Date", "Title", "News Type", "Journalist", "GUest", "Publication Name", "Edition", "Supplement", "Language", "Industry", "Client Name", "Summary");
 		
 		$exporter->addRow($fields); 

 		while ($row = mysqli_fetch_assoc($run_query)) {
			
 			$exporter->addRow($row); 
			

 		}

 		






 	}else{

 		echo "failed";
 	}

 }else{

 	echo "failed";
 }


$exporter->finalize(); // writes the footer, flushes remaining data to browser.

exit(); // all done

?>




