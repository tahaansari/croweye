<?php

$valid_formats = array("jpg", "png", "gif", "bmp");
$max_file_size = 2097152;
$path = "uploads/";


if ($_FILES['img1']['size'] > $max_file_size) {

    $message = "image is too large!.";
    exit();

}elseif(!in_array(pathinfo($_FILES['img1']['name'], PATHINFO_EXTENSION), $valid_formats) ){

        $message = "image is not a valid format";
        exit();
}else{ // No error found! Move uploaded files 

    if(move_uploaded_file($_FILES["img1"]["tmp_name"], $path.$_FILES['img1']['name']) );
}


