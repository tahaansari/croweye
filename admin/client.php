<?php 
   session_start();
   
   if(!isset($_SESSION['is_logged_in']) || $_SESSION['login_type'] != 'admin'){
   
      header("Location:../");
      exit();
   
   }
   
    include("../includes/config.php");
    include("../includes/functions.php");
   
     $start=0;
     $limit=15;
     
   
     if(isset($_GET['id']))
     {
       $id=$_GET['id'];
       $start=($id-1)*$limit;
     }else{
   
       $id=1;
     }
   
     
     
   
   
   // $select_query = "SELECT `t_id`, `t_u_id`, `t_pub_date`, `t_title`, `t_journalist`, `t_guest`, `t_pub_name`, `t_pub_edition`, `t_pub_suppliment`, `t_pub_language`, `t_industry`, `t_client_name`, `t_summary` FROM `tbl_transaction` LIMIT 15";
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>User</title>
      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/jquery-ui.css">
      <!-- for image gallery start -->
      <link rel='stylesheet' href='assets/css/photoswipe.css'>
      <link rel='stylesheet' href='assets/css/default-skin.css'>
      <!--       <link href="css/demo.css" rel="stylesheet">
         <link href="css/normalize.css" rel="stylesheet"> -->
      <link href="assets/css/component.css" rel="stylesheet">
      <!-- for image gallery end -->
      <link href="assets/css/custombox.css" rel="stylesheet" type="text/css">
      <link href="assets/css/cust_style.css" rel="stylesheet">
      <!-- Latest compiled and minified CSS -->
      <!-- Custom CSS -->
      <style>
         body {
         padding-top: 90px;
         /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
         }
      </style>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="js">
         <!--this is supposed to be on the HTML element but codepen won't let me do it-->
         <div id="preloader">
         </div>
      </div>
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
            <a href="index.php" class="brand">
               <img style="width:150px" src="../images/logo.png" alt="Logo" />
               <!-- <h2>Crow Eye</h2> -->
               <!-- This is website logo -->
            </a>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <!-- <a class="navbar-brand" href="#">Crow Eye</a> -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="menu nav navbar-nav navbar-right">
                  <li>
                     <a href="user_view.php">Home</a>
                  </li>
                  <li>
                     <a id="add_client" style="cursor:pointer">Add Client</a>
                  </li>
                  <li>
                     <a id="add_user" style="cursor:pointer">Add User</a>
                  </li>
                  <li>
                     <a class="active" href="">Edit Client</a>
                  </li>
                  <li>
                     <a href="user.php" >Edit User</a>
                  </li>
                  <li>
                     <h4 href="#" style="padding: 5px;margin-top: 35px; color:#FF5722;"><?php  echo $_SESSION['u_email']; ?></h4>
                  </li>
                  <li>
                     <a href="../logout.php">Logout</a>
                  </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
      <br>
      <div class="">

         <!-- <div class="col-md-3">
            <div class="filter-box panel panel-grey margin-bottom-40">
               <div class="panel-heading" style="background: #FF5722;">
                  <h3 class="panel-title"><i class="fa fa-tasks"></i><b>Filter</b></h3>
               </div>
              
               <div class="panel-body">
                  <form id="client_form" action="#" method="#">
                     <div class="" style="padding: 5px;">
                        <div class="">
                           <p>Industry</p>
                           <select name="industry" onchange="get_client(this.value,'data_client')" data-live-search="true" class="selectpicker show-menu-arrow form-control ">
                              <option value="">Select Industry</option>
                              <?php  print_r(get_industry()); ?>
                           </select>
                        </div>
                        <div class="">
                           <p>Client</p>
                           <select id="data_client" name="client"  data-live-search="true" class="show-menu-arrow form-control">
                              <option value="">Select Client</option>
                           </select>
                        </div>
                        <div class="">
                           <p>Status</p>
                           <select name="status"  data-live-search="true" class="show-menu-arrow form-control">
                              <option value="">Select Status</option>
                              <option value="">Active</option>
                              <option value="">Deactive</option>
                           </select>
                        </div>
                     </div>
                     <div style="margin-left: 5px;margin-top: 10px;">
                        <input id="client_form_submit" type="submit" class="btn btn-primary" value="Search">
                     </div>
                  </form>
               </div>
            </div>
         </div> -->


         <div class="col-md-12">
            <div id="no-more-tables">
               <table class="col-md-12 table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                     <tr>
                        <th>Created Date</th>
                        <!-- <th>Email</th> -->
                        <th>Industry</th>
                        <th>Client Name</th>
                        <th>Status</th>
                        <th>Pkg Pur Date</th>
                        <th>Pkg Exp Date</th>
                        <th>Renew</th>
                        <th></th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody id="dynamic_values">
                     <?php 

                        $sql = "SELECT `c_id`,`c_created_date`,`c_email`, `c_industry`, `c_name` , `c_active`, `c_pkg_pur_date`, `c_pkg_exp_date` FROM `tbl_client` LIMIT $start, $limit";
                        
                        if($query=mysqli_query($con,$sql)){
                        
                          $num_rows = mysqli_num_rows($query);
                        
                          if($num_rows>0){  
                        
                              while($query2=mysqli_fetch_array($query))
                              {
                        
                                    $query2['c_active'] == "y" ? $Status="Active" : $Status="Deactive";
                        
                        
                                    echo    "<tr id='row_".$query2['c_id']."'>";
                                      echo    "<td data-title='Publish Date'>".date( "d/m/Y", strtotime($query2['c_created_date']) )."</td>";
                                      // echo    "<td data-title='Title'>".$query2['c_email']."</td>";
                                      echo    "<td data-title='Title'>".$query2['c_industry']."</td>";
                                      echo    "<td data-title='Publication'>".$query2['c_name']."</td>";
                                      echo    "<td data-title='Publication'>".$Status."</td>";

                                      echo    "<td id='start_".$query2['c_id']."' data-title='Publication'>".date( "d/m/Y", strtotime($query2['c_pkg_pur_date']) )."</td>";
                                      echo    "<td id='end_".$query2['c_id']."' data-title='Language'>".date( "d/m/Y", strtotime($query2['c_pkg_exp_date']) )."</td>";
                                      
                        
                                      echo    "<td data-title='Language'>
                        
                                              <select id='period_".$query2['c_id']."' name='package' class='form-control input-sm'>
                        
                                                   <option value=''>Period for</option>
                                                   <option value='30'>One Month</option>
                                                   <option value='60'>Two Month</option>
                                                   <option value='90'>Three Month</option>
                                                   <option value='120'>Four Month</option>
                                                   <option value='150'>Five Month</option>
                                                   <option value='180'>Six Month</option>
                                                   <option value='210'>Seven Month</option>
                                                   <option value='240'>Eight Month</option>
                                                   <option value='270'>Nine Month</option>
                                                   <option value='300'>Ten Month</option>
                                                   <option value='330'>Eleven Month</option>
                                                   <option value='360'>Twelve Month</option>
                        
                                              </select>
                        
                                      </td>";
                        
                        
   echo  "<td data-title=''><a  id='up_".$query2['c_id']."' onclick=\"update_client(this.id,'period_".$query2['c_id']."')\" style='cursor: pointer;'><b>UPDATE</b></a></td>";

                                      echo    "<td data-title=''><a id='del_".$query2['c_id']."' onclick='delete_client(this.id)' style='color:red;cursor:pointer'><b>DELETE</b></a></td>";
                        
                                    
                                    echo    "</tr>";
                                     
                              }


                              if($num_rows>14){


                                $rows=mysqli_num_rows(mysqli_query($con,"SELECT `t_id` FROM `tbl_transaction`"));
                                $total=ceil($rows/$limit);

                                
                                 if($id>1)
                                 {
                                     echo "<a style='margin: 10px 0' href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
                                 }
                                 if($id!=$total)
                                 {
                                     echo "<a style='margin: 10px 5px' href='?id=".($id+1)."' class='button'>NEXT</a>";
                                 }
                                
                                 echo "<ul class='page'>";
                                
                                 for($i=1;$i<=$total;$i++)
                                 {
                                   if($i==$id) { echo "<li class='current'>".$i."</li>"; }
                                
                                   else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
                                 }
                                
                                 echo "</ul>"; 

                              }

                              
                        
                        
                        
                        
                        
                            }else{
                        
                        
                                echo "<tr>";
                                echo  "<td colspan='10'>NO CLIENT AVAILABLE</td>";
                                echo "<tr>";
                        
                        
                            }
                        
                        
                        }else{
                        
                        
                        
                                echo "<tr>";
                                echo  "<td colspan='10'>Failed</td>";
                                echo "<tr>";
                        
                        
                        }
                        
                        
                        
                        
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div style="clear:both"></div>
      <div class="footer" style='text-align: center'>
         <p class="bg-success" style="padding:10px;margin-top:20px"><small>Copyright © 2016 Design Croweye.in</small></p>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-pledby="myModalLabel">
         <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-p="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Clips</h4>
               </div>
               <div class="modal-body">
                  <div id="image-box" class="my-gallery" >
                     <div id="img-div1" class="col-md-4">
                        <figure>
                           <a id="b-image1" href="../images/1.jpg" data-size="1024x1024">
                           <img class="box-img" id="s-image1" src="../images/1.jpg"  alt="Image not loaded"/>
                           </a>
                           <!-- <figcaption itemprop="caption description">Image caption  1</figcaption> -->
                        </figure>
                     </div>
                     <div id="img-div1" class="col-md-4">
                        <figure>
                           <a id="b-image1" href="../images/2.jpg" data-size="1024x1024">
                           <img class="box-img" id="s-image1" src="../images/2.jpg"  alt="Image not loaded"/>
                           </a>
                           <!-- <figcaption itemprop="caption description">Image caption  1</figcaption> -->
                        </figure>
                     </div>
                     <div id="img-div1" class="col-md-4">
                        <figure>
                           <a id="b-image1" href="../images/1.jpg" data-size="1024x1024">
                           <img class="box-img" id="s-image1" src="../images/1.jpg"  alt="Image not loaded"/>
                           </a>
                           <!-- <figcaption itemprop="caption description">Image caption  1</figcaption> -->
                        </figure>
                     </div>
                     <div id="img-div1" class="col-md-4">
                        <figure>
                           <a id="b-image1" href="../images/2.jpg" data-size="1024x1024">
                           <img class="box-img" id="s-image1" src="../images/2.jpg"  alt="Image not loaded"/>
                           </a>
                           <!-- <figcaption itemprop="caption description">Image caption  1</figcaption> -->
                        </figure>
                     </div>
                     <div id="img-div1" class="col-md-4">
                        <figure>
                           <a id="b-image1" href="../images/2.jpg" data-size="1024x1024">
                           <img class="box-img" id="s-image1" src="../images/2.jpg"  alt="Image not loaded"/>
                           </a>
                           <!-- <figcaption itemprop="caption description">Image caption  1</figcaption> -->
                        </figure>
                     </div>
                     <div id="img-div1" class="col-md-4">
                        <figure>
                           <a id="b-image1" href="../images/2.jpg" data-size="1024x1024">
                           <img class="box-img" id="s-image1" src="../images/2.jpg"  alt="Image not loaded"/>
                           </a>
                           <!-- <figcaption itemprop="caption description">Image caption  1</figcaption> -->
                        </figure>
                     </div>
                  </div>
                  <!-- Root element of PhotoSwipe. Must have class pswp. -->
                  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                     <!-- Background of PhotoSwipe. 
                        It's a separate element, as animating opacity is faster than rgba(). -->
                     <div class="pswp__bg"></div>
                     <!-- Slides wrapper with overflow:hidden. -->
                     <div class="pswp__scroll-wrap">
                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                        <div class="pswp__container">
                           <div class="pswp__item"></div>
                           <div class="pswp__item"></div>
                           <div class="pswp__item"></div>
                        </div>
                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                        <div class="pswp__ui pswp__ui--hidden">
                           <div class="pswp__top-bar">
                              <!--  Controls are self-explanatory. Order can be changed. -->
                              <div class="pswp__counter"></div>
                              <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                              <button class="pswp__button pswp__button--share" title="Share"></button>
                              <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                              <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                              <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                              <!-- element will get class pswp__preloader--active when preloader is running -->
                              <div class="pswp__preloader">
                                 <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                       <div class="pswp__preloader__donut"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                              <div class="pswp__share-tooltip"></div>
                           </div>
                           <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                           </button>
                           <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                           </button>
                           <div class="pswp__caption">
                              <div class="pswp__caption__center"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div style="clear:both"></div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>




      



      <div id="add_user_box" class="modal-demo">
         <button type="button" class="close" onclick="Custombox.close();">
         <span>&times;</span>
         </button>
         <div class="text">


               

            <form  id="add_user_form" action="#" method="#">
               
               <div class="row">
                <ul class="error-box" id="user_error_footer">
                    <!-- <li>helllo</li> -->
                </ul>
                  <div class=" col-md-6">
                     <div class="form-group ">
                        <p style="margin-bottom: 3px">Username</p>
                        <input name="username" type="text" class="form-control input-sm" placeholder="Enter Userame">
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Email</p>
                        <input type="email" name="email" class="form-control input-sm" placeholder="Enter E-Mail">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Gender</p>
                        <select name="user_gender" class="form-control input-sm">
                           <option value="M">Male</option>
                           <option value="F">Female</option>
                        </select>
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Date of Birth</p>
                        <input id="user_dob" name="dob" class="form-control input-sm" placeholder="Select Date Of BIrth">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Contact No</p>
                        <input name="user_contact" type="text" class="form-control input-sm" placeholder="Enter Contact Number">
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">State</p>
                        <select name="user_state" onchange="get_city(this.value,'user_city')" data-live-search="true" class="selectpicker show-menu-arrow form-control">
                           <option value="">Select State</option>
                           <?php print_r(get_state()); ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">City</p>
                        <select id="user_city" name="user_city" class="form-control input-sm">
                           <option value="">Select City</option>
                        </select>
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Address</p>
                        <textarea name="user_address" class="form-control input-sm" placeholder="Enter Address"></textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">User Type</p>
                        <select name="user_type" class="form-control input-sm">
                           <option value="">Select Type</option>
                           <option value="admin">ADMIN</option>
                           <option value="user">USER</option>
                        </select>
                     </div>
                  </div>
               </div>
               <br>
               <input id="add_user_submit" type="submit" value="Submit" class="btn btn-info btn-block">


            </form>
         </div>
      </div>


      <div id="add_client_box" class="modal-demo">
         <button type="button" class="close" onclick="Custombox.close();">
         <span>&times;</span>
         </button>
         <div class="text">

            

            <form id="add_client_form" action="#" method="#">
                <ul class="error-box" id="client_error_footer">
                </ul>

               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p>Industry</p>
                        <select name="indusrty" data-live-search="true" class="selectpicker show-menu-arrow form-control ">
                           <option value= '' selected>Select Industry</option>
                           <?php print_r(get_industry()); ?>
                        </select>
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p>Client</p>
                        <input type="text" name="client" class="form-control input-sm" placeholder="Enter client name">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">E-Mail</p>
                        <input name="email" type="email" class="form-control input-sm" placeholder="Enter E-Mail">
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Contact Num</p>
                        <input name="number" type="text" class="form-control input-sm" placeholder="Enter Contact No">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">State</p>
                        <select name="client_state" onchange="get_city(this.value,'client_city')" data-live-search="true" class="selectpicker show-menu-arrow form-control">
                           <option value="" selected>Select State</option>
                           <?php print_r(get_state()); ?>
                        </select>
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">City</p>
                        <select id="client_city" name="client_city" class="form-control input-sm">
                           <option value="">Select City</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Address</p>
                        <textarea name="client_address" class="form-control input-sm" placeholder="Enter Address"></textarea>
                     </div>
                  </div>
                  <div class=" col-md-6">
                     <div class="form-group">
                        <p style="margin-bottom: 3px">Package Period</p>
                        <select name="package" class="form-control input-sm">
                           <option value="">Select Period</option>
                           <option value="3">Free Trial</option>
                           <option value="30">One Month</option>
                           <option value="60">Two Month</option>
                           <option value="90">Three Month</option>
                           <option value="120">Four Month</option>
                           <option value="150">Five Month</option>
                           <option value="180">Six Month</option>
                           <option value="210">Seven Month</option>
                           <option value="240">Eight Month</option>
                           <option value="270">Nine Month</option>
                           <option value="300">Ten Month</option>
                           <option value="330">Eleven Month</option>
                           <option value="360">Twelve Month</option>
                        </select>
                     </div>
                  </div>
               </div>
               <br>
               <input id="add_client_submit" type="submit" value="Submit" class="btn btn-info btn-block">
            </form>


         </div>
      </div>

      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
      <script src="assets/js/index.js"></script>
      <script src="assets/js/jquery-ui.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script>
         $(function() {
         
             $( "#user_dob" ).datepicker();
         
         });
         
        
         
      </script>
      <script src='assets/js/photoswipe.min.js'></script>
      <script src='assets/js/photoswipe-ui-default.min.js'></script>
      <script src='assets/js/photoswipe-ui-default.min.js'></script>
      <script src="assets/js/custom-file-input.js"></script>
      <script src="assets/js/functions.js"></script>
      <script src="assets/js/custombox.js" type="text/javascript"></script> 
      <!-- <script type="text/javascript" src="path/to/Zebra_Pagination/public/javascript/zebra_pagination.js"></script> -->
      <script src="assets/js/cust_script.js"></script>
      <!-- Latest compiled and minified JavaScript -->
   </body>
</html>