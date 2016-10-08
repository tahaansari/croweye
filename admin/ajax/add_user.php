<?php

//      print_r($_POST);
        
        include '../../includes/config.php';
        include '../../includes/functions.php';
        
        $validation_error = "";

        if(trim($_POST['username']) == ""){

            $validation_error .= "<li>Enter Username</li>";

        }else{

            $username = escape_data($_POST['username']);
            
        }


        if(trim($_POST['email']) == ""){

            $validation_error .= "<li>Enter Email</li>";

        }else if(!preg_match($email_pattern, trim($_POST['email']))){


              $validation_error .= "<li>Invalid Email</li>";

        }else{

               $email = escape_data($_POST['email']);
               
        }


        if(trim($_POST['user_gender']) == ""){

            $validation_error .= "<li>Select Gender</li>";

        }else{

              $gender = escape_data($_POST['user_gender']);
              

        }

        if(trim($_POST['dob'] )== ""){

            $validation_error .= "<li>Select DOB</li>";

        }else{

              $dob = escape_data(date('Y-m-d',strtotime($_POST['dob']) ));
              

        }

        if(trim($_POST['user_contact']) == ""){

            $validation_error .= "<li>Enter COntact Number</li>";

        }else if(!is_numeric(trim($_POST['user_contact']))){

              $validation_error .= "<li>Contact Number Should Be Numeric</li>";

        }else if(strlen(trim($_POST['user_contact'])) > 15 ){


            $validation_error .= "<li>Contact Number Cannot Be More Than 15 Character</li>";

        }else{

             $contact = escape_data($_POST['user_contact']);
             
        }


        if(trim($_POST['user_state']) == ""){

            $validation_error .= "<li>Select State</li>";

        }else{

              $state = escape_data($_POST['user_state']);
              

        }

        if(trim($_POST['user_city']) == ""){

            $validation_error .= "<li>Select City</li>";

        }else{

              $city = escape_data($_POST['user_city']);
              

        }


        if(trim($_POST['user_address']) == ""){

          $validation_error .= "<li>Enter Address</li>";

        }else {

          $address = escape_data($_POST['user_address']);
          


        }

        if(trim($_POST['user_type']) == ""){

          $validation_error .= "<li>Select User Type</li>";

        }else{

          $type = escape_data($_POST['user_type']);
          
        }



       if($validation_error == ""){

//           echo "insert success";


          $admin_email = $email;
          $myemail = "taha.m.ansari@gmail.com";
          $subject = "Request for trail service";
          $comment = "Hello your password is $random_number";
            
            //send email
          mail($admin_email, "$subject", $comment, "From:" . $myemail);





          $password = $random_number;
          $active = 'y';
          $u_created_date = 'now()';
          $u_updated_date = 'now()';


          // INSERT INTO `tbl_user`(`u_id`, `username`, `login_type`, `u_email`, `u_password`, `u_gender`, `u_dob`, `u_contact_no`, `u_state`, `u_city`, `u_address`, `u_access`, `u_created_date`, `u_updated_date`) VALUES ()
           
           $insert_user = "INSERT INTO `tbl_user`(`username`, `login_type`, `u_email`, `u_password`, `u_gender`, `u_dob`, `u_contact_no`, `u_state`, `u_city`, `u_address`, `u_active`, `u_created_date`, `u_updated_date`) VALUES "
                   . "('$username','$type','$email','$password','$gender',$dob,'$contact','$state','$city','$address',"
                   . "'$active',$u_created_date,$u_updated_date)";
           
          
 
           $run_insert = mysqli_query($con, $insert_user);
           
           if(mysqli_affected_rows($con) == 1){
               
//               echo "insert success";
               
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
           
           $arr['status'] = 'failed';
           $arr['err_msg'] = 'validation error';
           $arr['data'] = $validation_error;

           $json = json_encode($arr);
           echo $json;
           exit();
       }