<?php 

//$example = "%^[A-Za-z\.\' \-]{2,15}$%";

$date = "/^[0-9\-\.\_\/]{1,20}$/i";


$text = "/^[a-z \-\.\_\/]{1,200}$/i";   
$number = "/^[0-9 \-\.\_\/]{1,200}$/i";
$textandnumber = "/^[a-z 0-9\-\.\_\/]{1,200}$/i";
$bigtextandnumber = "/^[a-z 0-9\-\.\get_publication_\/]{1,500}$/i";
$suppliment_pattern = "/^[a-z 0-9\-\.\_\/]{0,200}$/i";
//for email
$email_pattern = "/^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
//for password
//Minimum 8 characters at least 1 Alphabet and 1 Number:
// $password_pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";




function escape_data($data){

	global $con;

  $data = trim($data);
  $data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con,$data);
	$data = strip_tags($data);

	return $data;
}

function get_publication(){
    
   global $con;
   $select_query = "SELECT distinct `p_name` FROM `tbl_publication`";
   $run_query = mysqli_query($con,$select_query);

   while($row = mysqli_fetch_assoc($run_query)){


      $publication[] = "<option value='".$row['p_name']."'>".$row['p_name']."</option>";
      
   }
   return $publication;
}

function get_industry(){
    
    global $con;
    $select_query = "SELECT `ind_name` FROM `tbl_industry`";
    $run_query = mysqli_query($con,$select_query);
    
  
    while($row = mysqli_fetch_assoc($run_query)){
        
        $industry[] = "<option value='".$row['ind_name']."'>".$row['ind_name']."</option>";
        
    }
    
    return $industry;
    
}

function get_state(){
    
    global $con;
    
    $select_query = "select distinct State from tbl_state_city";
    $run_query = mysqli_query($con, $select_query);
    
    while($row = mysqli_fetch_assoc($run_query)){
        
        $state[] = "<option value='".$row['State']."'>".$row['State']."</option>";
        
    }
    
    return $state;
    
}



function upload_image($para){


  global $con;

  $last_id = mysqli_insert_id($con);

  $originalDate = date("d-m-Y");
  $newDate = date("d-m-Y", strtotime($originalDate));


  if (!file_exists("../uploads/".$newDate."/".$para)) {

    mkdir("../uploads/".$newDate."/".$para, 0777, true);

  }

  $sql = "";

  foreach ($_FILES["files"]["error"] as $key => $error) {

      if ($error == UPLOAD_ERR_OK) {

          $tmp_name = $_FILES["files"]["tmp_name"][$key];

          // $t_id = mysql_insert_id($con);

          $name = $last_id."_".$key.".png";

          // $name = $_FILES["files"]["name"][$key];

          move_uploaded_file($tmp_name, "../uploads/".$newDate."/".$para."/".$name);


          $page = $_POST['page'][$key];
          $position = $_POST['position'][$key];
          $logo = $_POST['logo'][$key];


          $sql .= "INSERT INTO `tbl_img_data`(`id_tran_id`, `id_img_name`, `id_page_no`, `id_position`, `id_logo`) VALUES ('$last_id','$name','$page','$position','$logo');";


      }else{

        return false;
      }

  }

  // echo $sql;
  // die();


  if (mysqli_multi_query($con, $sql)) {

    return true;

  } else {

    return false;

  }

}



function update_image($para1, $para2,$para3){


  global $con;

  // $last_id = mysqli_insert_id($con);


  if (!file_exists("../uploads/".$para1."/".$para2)) {

    mkdir("../uploads/".$para1."/".$para2, 0777, true);

  }

  $sql = "";

  foreach ($_FILES["file-1"]["error"] as $key => $error) {

      if ($error == UPLOAD_ERR_OK) {

          $tmp_name = $_FILES["file-1"]["tmp_name"][$key];

          // $t_id = mysql_insert_id($con);

          $name = $para3."_".$key.".png";

          // $name = $_FILES["files"]["name"][$key];  

          move_uploaded_file($tmp_name, "../uploads/".$para1."/".$para2."/".$name);


          $page = $_POST['page'][$key];
          $position = $_POST['position'][$key];
          $logo = $_POST['logo'][$key];


          // $sql .= "INSERT INTO `tbl_img_data`(`id_tran_id`, `id_img_name`, `id_page_no`, `id_position`, `id_logo`) VALUES ('$tran_id','$name','$page','$position','$logo');";
          $sql .= "UPDATE `tbl_img_data` SET `id_img_name`='$name',`id_page_no`='$page',`id_position`='$position',`id_logo`='$logo' Where `id_tran_id`='$para3'";



      }else{

        return false;
      }

  }

  // echo $sql;
  // die();


  if (mysqli_multi_query($con, $sql)) {

    return true;

  } else {

    return false;

  }

}


?>