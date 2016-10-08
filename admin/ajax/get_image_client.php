<?php 

	include "../../includes/config.php";
	include "../../includes/functions.php";


	$id = substr($_POST['id'], 5);
	$date = date('d-m-Y', strtotime($_POST['date']));
	$industry = $_POST['industry'];

	// echo $id;

	$query = "SELECT `id_img_name`, `id_page_no`, `id_position`, `id_logo` FROM `tbl_img_data` WHERE `id_tran_id` = '$id'";

	if($run_query = mysqli_query($con,$query)){


		if(mysqli_num_rows($run_query)>0){


			$data = "";
			while($row = mysqli_fetch_assoc($run_query)){ 


				$url = "../admin/uploads/".$date."/".$industry."/".$row['id_img_name']."'";

				$data .= "<div id='img-div1' style='margin-bottom: 30px;' class='col-md-4'>
		                    <figure>
									<a id='b-image1' href='".$url."' data-size='1024x1024'>
		                       		<img class='box-img' id='s-image1' src='".$url."'  alt='Image not loaded'/>
		                      </a>
		                       <figcaption itemprop='caption description'>
		                            <span>Pg No : <b>".$row['id_page_no']."</b></span>
		                            <span>pos : <b>".$row['id_position']."</b></span>
		                            <span>Logo : <b>".$row['id_logo']."</b></span>
		                       </figcaption>
		                    </figure>
		                </div>";

			}

			echo $data;


		}else{

			echo "Empty Result";

		}



	}else{

		echo "Failed";
	}



?>