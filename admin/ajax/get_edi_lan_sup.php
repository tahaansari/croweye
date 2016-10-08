<?php

//echo "success";
//print_r($_POST);

include("../../includes/config.php");

$pub = trim($_POST['publication']);

$select_edition = "SELECT distinct `p_edition` FROM `tbl_publication` WHERE `p_name` = '$pub'";
$select_language = "SELECT distinct `p_language` FROM `tbl_publication` WHERE `p_name` = '$pub'";
$select_suppliment = "SELECT distinct `s_suppliment` FROM `tbl_suppliment` WHERE `s_publication` = '$pub'";

$run_edition = mysqli_query($con, $select_edition);
$run_language = mysqli_query($con, $select_language);
$run_suppliment = mysqli_query($con, $select_suppliment);




if(mysqli_num_rows($run_edition)>0){

    $counter = 1;
    
    while($edition_result = mysqli_fetch_assoc($run_edition)){

        if($counter==1){

            $edi[] = "<option value=''>Select Edition</option>";
            $counter++;

        }
    
        $edi[] = "<option value='".$edition_result['p_edition']."'>".$edition_result['p_edition']."</option>";
    }
}else{
    
    $edi[] = "<option value='Not Available'>No Edition Available</option>";
}




if(mysqli_num_rows($run_language) > 0){
    
    $counter=1;

    while($language_result = mysqli_fetch_assoc($run_language)){


        if($counter==1){

            $lan[] = "<option value=''>Select Language</option>";
            $counter++;

        }

        $lan[] = "<option value='".$language_result['p_language']."'>".$language_result['p_language']."</option>";
    }
}else{
    
    $lan[] = "<option value='Not Available'>No Language Available</option>";
}


if(mysqli_num_rows($run_suppliment) > 0){

    $counter=1;
    
    while($suppliment_result = mysqli_fetch_assoc($run_suppliment)){

        if($counter==1){

            $sup[] = "<option value=''>Select Suppliment</option>";
            $counter++;

        }
    
        $sup[] = "<option value='".$suppliment_result['s_suppliment']."'>".$suppliment_result['s_suppliment']."</option>";
    }    
}else{
    
    $sup[] = "<option value='Not Available'>No Suppliment Available</option>";
}


$response = array($edi,$lan,$sup);
echo json_encode($response);







