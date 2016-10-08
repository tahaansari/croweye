<?php

//      echo "success";
        session_start(); 

        include '../includes/config.php';
        include '../includes/functions.php';
        
        $validation_errors = "";

        if(trim($_POST['email']) == ""){

            $validation_errors .= "<li>Enter Email</li>";

        }else if(!preg_match($email_pattern, trim($_POST['email']))) {

            $validation_errors .= "<li>Invalid Email</li>";
            
        }else{

            $email = escape_data($_POST['email']);

        }


        if(trim($_POST['password']) ==""){

            $validation_errors .= "<li>Enter Password</li>";

        }else{
            
            $password = escape_data($_POST['password']);
        }





        if($validation_errors == ""){

                    $select_query = "SELECT `c_id`, `login_type`,`c_email`, `c_industry`,`c_name` FROM `tbl_client` WHERE  `c_email` = '$email' and `c_password` = '$password'";

                    if($run_query = mysqli_query($con,$select_query)){

                            if(mysqli_num_rows($run_query)==1){

                                    $row = mysqli_fetch_assoc($run_query);

                                    $user_id = $row['c_id'];
                                    $login_type = $row['login_type'];
                                    $c_email = $row['c_email'];
                                    $c_industry = $row['c_industry'];
                                    $c_name = $row['c_name'];


                                    $_SESSION['c_id'] = $user_id;
                                    $_SESSION['login_type'] = $login_type;
                                    $_SESSION['c_email'] = $c_email;
                                    $_SESSION['c_industry'] = $c_industry;
                                    $_SESSION['c_name'] = $c_name;
                                    $_SESSION['is_logged_in'] = true;
                                    
                        //          header("Location:admin/".$user_type.".php");
                                    
                                    $arr['status'] = "success";
                                    $arr['login_type'] = $login_type;

                                    $json = json_encode($arr);
                                    echo $json;
                                    exit();
                            

                            }else{
                                
                                    $arr['status'] = "failed";
                                    $arr['err_msg'] = "wrong data";
                                    
                                    $json = json_encode($arr);
                                    echo $json;
                                    exit();
                            }

                    }else{


                        $arr['status'] = "failed";
                        $arr['err_msg'] = "query failed";
                        
                        $json = json_encode($arr);
                        echo $json;
                        exit();


                    }


        }else{

                $arr['status'] = "failed";
                $arr['err_msg'] = "validation error";
                $arr['data'] = $validation_errors;
                $json = json_encode($arr);
                echo $json;
                exit();

        }