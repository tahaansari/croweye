<?php 


    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";
		
    // echo "<pre>";
    // print_r($_FILES);
    // echo "<pre>";

    // exit();
    		





		  session_start();
		  include('../../includes/config.php');
		  include('../../includes/functions.php');




          $validation_error = "";


          if(trim(date("Y-m-d", strtotime($_POST['date']) ) )   == ""){

              $validation_error .= "<li>Select Date</li>";

          }else{

              $date = escape_data(date("Y-m-d", strtotime($_POST['date']) ));
          }


          if(trim($_POST['publication']) == ""){

              $validation_error .= "<li>Select Publication</li>";

          }else{

                $publication = escape_data($_POST['publication']);

          }

          if(trim($_POST['edition']) == ""){

              $validation_error .= "<li>Select Edition</li>";

          }else{

                $edition = escape_data($_POST['edition']);

          }

          if(trim($_POST['language'] )== ""){

              $validation_error .= "<li>Select Language</li>";

          }else{

                $language = escape_data($_POST['language']);

          }

          if(trim($_POST['suppliment']) == ""){

              $validation_error .= "<li>Select Suppliment</li>";

          }else{

                $suppliment = escape_data($_POST['suppliment']);

          }

          if(trim($_POST['industry']) == ""){

              $validation_error .= "<li>Select industry</li>";

          }else{

                $industry = escape_data($_POST['industry']);

          }

          if(trim($_POST['client']) == ""){

              $validation_error .= "<li>Select Client</li>";

          }else{

                $client = escape_data($_POST['client']);

          }

          if(trim($_POST['news_type']) == ""){

              $validation_error .= "<li>Select New Type</li>";

          }else{

                $news_type = escape_data($_POST['news_type']);

          }


          if(trim($_POST['summary']) == ""){

            $validation_error .= "<li>Enter Summary</li>";

          }else{

            $summary = escape_data($_POST['summary']);


          }

          if(trim($_POST['title']) == ""){

            $validation_error .= "<li>Enter Title</li>";

          }else{

            $title = escape_data($_POST['title']);
          }



          if(trim($_POST['journalist']) == "" && trim($_POST['guest']) == ""){

            $validation_error .= "<li>Enter Journalist Or Guest</li>";

          }else{

            $journalist = escape_data($_POST['journalist']);
            $guest = escape_data($_POST['guest']);
          }

          if(!isset($_FILES['files'])){

              $validation_error .= "<li>Select a Clip</li>";

          }



         


      

		    if($validation_error=="") {

              $u_id = $_SESSION['u_id'];

              $insert_data = "INSERT INTO `tbl_transaction`(`t_u_id`, `t_pub_date`, `t_title`, `t_journalist`, `t_guest`, `t_pub_name`, `t_pub_edition`, `t_pub_suppliment`, `t_pub_language`, `t_industry`, `t_client_name`,`t_news_type`, `t_summary`) VALUES ('$u_id','$date','$title', '$journalist', '$guest',
              '$publication', '$edition', '$suppliment','$language','$industry','$client','$news_type','$summary')";

              // echo $insert_data;
              // die();

              $run_insert = mysqli_query($con, $insert_data);

              // 
              if(mysqli_affected_rows($con) == 1 && upload_image($industry)){ 

                    $arr['status']=  'success';
                    $json = json_encode($arr);
                    echo $json;
                    exit();

              }else{ 

                    $arr['status']=  'failed';
                    $arr['err_msg']=  'query failed';
                    
                    $json = json_encode($arr);
                    echo $json;
                    exit();

              }   

        }else{


    			      $arr['status']=  'failed';
                $arr['err_msg']=  'validation error';
                $arr['data']= $validation_error;
                
                $json = json_encode($arr);
                echo $json;
                exit();

        }

?>