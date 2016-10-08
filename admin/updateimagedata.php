<div class="row" style="padding: 5px;">

                                     <div id="input_box">




                                        <?php  


                                        $query = "SELECT `id_id`, `id_tran_id`, `id_img_name`, `id_page_no`, `id_position`, `id_logo` FROM `tbl_img_data` WHERE  id_tran_id = '$id'";




                                        if($run_query = mysqli_query($con,$query)){


                                          if(mysqli_num_rows($run_query) > 0 ){


                                            $data = "";
                                            $img_data = "";

                                            $start_input = "0";
                                            while($myrow = mysqli_fetch_assoc($run_query)){

                                                $start_input++;

                                                $data .="<div class='col-md-12' style='padding: 0;'>

                                                     <div class='col-md-3'>
                                                        <input id='".$start_input."'  name='file-1[]' onchange='readURL1(this)' style='display:none;margin:5px' type='file' class='inputfile inputfile-1' >
                                                        <label for='".$start_input."'>
                                                           <svg xmlns='http://www.w3.org/2000/svg' width='20' height='17' viewBox='0 0 20 17'>
                                                              <path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'>
                                                              </path>
                                                           </svg>
                                                           <span id='name".$start_input."'>".$myrow['id_img_name']."</span>
                                                        </label>
                                                     </div>



                                                     <div class='col-md-3'>
                                                        <input id='pg' name='page[]' type='text' placeholder='PageNo' class='form-control input-sm' value='".$myrow['id_page_no']."'/>
                                                     </div>

                                                     <div class='col-md-3'>
                                                        
                                                        <select id='pos' name='position[]' class='form-control input-sm' style='text-transform: capitalize;'>
                                                           <option value=''>Select Position</option>                                                          
                                                           <option value='default'>Default</option>
                                                           <option value='top'>Top</option>
                                                           <option value='bottom'>Bottom</option>
                                                           <option value='left'>Left</option>
                                                           <option value='right'>Right</option>
                                                           <option value='center'>Center</option>
                                                          
                                                           echo '<option selected value='".$myrow['id_position']."'>".$myrow['id_position']."</option>';  
                                                      
                                                           
                                                        </select>
                                                     </div>

                                                     <div class='col-md-3' >
                                                        
                                                        <select id='logo' name='logo[]'  class='form-control input-sm' style='text-transform: capitalize'>
                                                            <option value=''>Select Logo</option>
                                                            <option value='no'>No</option>
                                                             <option value='yes'>Yes</option>
 
                                                           
                                                              echo '<option selected value='".$myrow['id_logo']."'>".$myrow['id_logo']."</option>';  
                                                          
                                                        </select>
                                                     </div>
                                                  </div>";



$img_data .= "<div id='image-box' class='my-gallery' >
                  <div id='img-div".$start_input."' style='display: block' class='col-md-6'>
                     <figure>
                        <a id='b-image".$start_input."' href='uploads/".date('d-m-Y',strtotime($row['t_pub_date']))."/".$row['t_industry']."/".$myrow['id_img_name']."' data-size='1024x1024'>
                        <img class='box-img' id='s-image".$start_input."' src='uploads/".date('d-m-Y',strtotime($row['t_pub_date']))."/".$row['t_industry']."/".$myrow['id_img_name']."'  alt='Image not loaded'/>
                        </a>
                          <figcaption itemprop='caption description' style='margin-bottom: 10px;'>
                            <span>Page No : <b>".$myrow['id_page_no']."</b></span>
                            <span>Position : <b>".$myrow['id_position']."</b></span>
                            <span>Logo : <b>".$myrow['id_logo']."</b></span>
                       </figcaption>
                     </figure>
                  </div>
               </div>";

                                            }



                                            echo $data;



                                          }else{

                                            echo "query failed";

                                          }


                                        }else{

                                          echo "query failed";
                                        }

                                     ?>

                                     </div>
                                </div>