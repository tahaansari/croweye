<?php 

// echo "hello world";
$originalDate = date('d-m-Y');
$newDate = date("d-m-Y", strtotime($originalDate));

$industry = "IT";

// if (!file_exists("uploads/".$newDate)){

//   mkdir("uploads/".$newDate, 0777, true);

// }

if (!file_exists("uploads/".$newDate."/".$industry)){

  mkdir("uploads/".$newDate."/".$industry, 0777, true);

}






?>