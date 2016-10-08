<?php

//      print_r($_POST);
        
        include '../../includes/config.php';
        include '../../includes/functions.php';


        $validation_error = "";

        if(trim($_POST['indusrty']) == ""){

            $validation_error .= "<li>Select Industry</li>";

        }else{

            $indusrty = escape_data($_POST['indusrty']);
        }

        if(trim($_POST['client']) == ""){

            $validation_error .= "<li>Enter Client</li>";

        }else{

              $client = escape_data($_POST['client']);

        }

        if(trim($_POST['email']) == ""){

            $validation_error .= "<li>Enter Email</li>";

        }else if(!preg_match($email_pattern, trim($_POST['email']))){


              $validation_error .= "<li>Invalid Email</li>";

        }else{

               $email = escape_data($_POST['email']);
        }


        if(trim($_POST['number']) == ""){

            $validation_error .= "<li>Enter COntact Number</li>";

        }else if(!is_numeric(trim($_POST['number']))){

              $validation_error .= "<li>Contact Number Should Be Numeric</li>";

        }else if(strlen(trim($_POST['number'])) > 15 ){


            $validation_error .= "<li>Contact Number Cannot Be More Than 15 Character</li>";

        }else{

             $contact_number = escape_data($_POST['number']);
        }


        if(trim($_POST['client_state']) == ""){

            $validation_error .= "<li>Select State</li>";

        }else{

              $state = escape_data($_POST['client_state']);

        }

        if(trim($_POST['client_city']) == ""){

            $validation_error .= "<li>Select City</li>";

        }else{

              $city = escape_data($_POST['client_city']);

        }


        if(trim($_POST['client_address']) == ""){

          $validation_error .= "<li>Enter Address</li>";

        }else {

          $clientAddress = escape_data($_POST['client_address']);


        }

        if(trim($_POST['package']) == ""){

          $validation_error .= "<li>Select a Package/li>";

        }else{

          $package = escape_data($_POST['package']);
        }

        

       if($validation_error == ""){


          $digits_needed=8;

          $random_number=''; // set up a blank string

          $count=0;

          while ( $count < $digits_needed ) {
              $random_digit = mt_rand(0, 9);
              
              $random_number .= $random_digit;
              $count++;
          }


          $admin_email = $email;
          $myemail = "taha.m.ansari@gmail.com";
          $subject = "Request for trail service";
          $comment = "Hello your password is $random_number";
            
            //send email
          mail($admin_email, "$subject", $comment, "From:" . $myemail);

          $login_type = "client";
          $password = $random_number;
          $active = "y";

    

          $cur_date = date('Y-m-d');
          $pkg_exp_date = date('Y-m-d', strtotime($cur_date. ' + '.$package.' days'));


          // echo $cur_date;
          // echo "<br>"; 
          // echo $pkg_exp_date;
          // exit();


//           echo "insert success";

          // INSERT INTO `tbl_client`(`c_id`, `login_type`, `c_contact_no`, `c_email`, `c_password`, `c_state`, `c_city`, `c_address`, `c_industry`, `c_name`, `c_created_date`, `c_active`, `c_pkg_pur_date`, `c_pkg_exp_date`) VALUES ();
            
           $insert_client = "INSERT INTO `tbl_client`(`login_type`, `c_contact_no`, `c_email`, `c_password`, `c_state`, `c_city`, `c_address`, `c_industry`, `c_name`, `c_created_date`, `c_active`, `c_pkg_pur_date`, `c_pkg_exp_date`) VALUES "
                   . "('$login_type','$contact_number','$email','$password','$state','$city','$clientAddress','$indusrty',"
                   . "'$client',now(),'$active',now(),'$pkg_exp_date')";
           
           
           
           $run_insert = mysqli_query($con, $insert_client);
           
           if(mysqli_affected_rows($con) == 1){
               
//             echo "insert success";
               
               $arr['status'] = 'success';
               $json = json_encode($arr);
               echo $json;
               exit();
               
               
           }else{
               
//             echo "insert failed";
               
               $arr['status'] = 'failed';
               $arr['err_msg'] = 'query failed';
               
               $json = json_encode($arr);
               echo $json;
               exit();
           }

       }else{
           
//           echo "insert failed";
           $arr['status'] = 'failed';
           $arr['err_msg'] = 'validation error';
           $arr['data'] = $validation_error;

           $json = json_encode($arr);
           echo $json;
           exit();
       }