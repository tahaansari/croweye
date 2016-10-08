<?php

//      print_r($_POST);
        
        include '../../includes/config.php';
        include '../functions.php';
        
        $validation_error = "";
        $success_count = 0;

       if(preg_match($date, trim($_POST['from'])) ){

           $from = escape_data($_POST['from']);
           $success_count++;

       }else{

           $validation_error .= "<li><b>From should not contain special character or empty</b></li>";
       }

       if(preg_match($date, trim($_POST['to'])) ){

           $to = escape_data($_POST['to']);
           $success_count++;

       }else{

           $validation_error .= "<li><b>To should not contain special character or empty</b></li>";
       }

       if(preg_match($textandnumber, trim($_POST['publication'])) ){

           $publication = escape_data($_POST['publication']);
           $success_count++;
           
       }else{

           $validation_error .= "<li><b>Publication cannot contain special character or empty</b></li>";
       }

       if(preg_match($textandnumber, trim($_POST['edition'])) ){

           $edition = escape_data($_POST['edition']);
           $success_count++;
           
       }else{

           $validation_error .= "<li><b>Edition shound not contain any special character or empty</b></li>";
       }

       if(preg_match($textandnumber, trim($_POST['language'])) ){

           $language = escape_data($_POST['language']);
           $success_count++;

       }else{

           $validation_error .= "<li><b>Language no shound not contain any special character or empty</b></li>";
       }

       if(preg_match($suppliment_pattern, trim($_POST['suppliment'])) ){

           $suppliment = escape_data($_POST['suppliment']);
           $success_count++;

       }else{

           $validation_error .= "<li><b>Suppliment shound not contain any special character or empty</b></li>";
       }


       if($success_count==6){

           echo "insert success";


       }else{
           
           echo "insert failed";
       }