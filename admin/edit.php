<?php 

    
   session_start(); 
    
     if(!isset($_SESSION['is_logged_in'])){
      
         header("Location:../");
         exit();

      }else if($_SESSION['login_type'] != 'user' && $_SESSION['login_type'] != 'admin' ){


         header("Location:../");
         exit();

      }
   
   if(!isset($_GET['id'])){
       
      header("Location:search.php");
      exit();
       
   }
   
   include("../includes/config.php");
   include("../includes/functions.php");
   
   $id = $_GET['id'];
   
   $select_query = "SELECT `t_id`, `t_u_id`, DATE_FORMAT(`t_pub_date`, "."'%d-%m-%Y'".") as `t_pub_date`, `t_title`, `t_news_type`, `t_journalist`, `t_guest`, `t_pub_name`, `t_pub_edition`, `t_pub_suppliment`, `t_pub_language`, `t_industry`, `t_client_name`, `t_summary` FROM `tbl_transaction` WHERE `t_id` = '$id'";
   
   
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
      <!-- Latest compiled and minified CSS --> 
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/jquery-ui.css">
      <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
      <!-- for image gallery start -->
      <link rel='stylesheet' href='assets/css/photoswipe.css'>
      <link rel='stylesheet' href='assets/css/default-skin.css'>
      <!--       <link href="css/demo.css" rel="stylesheet">
         <link href="css/normalize.css" rel="stylesheet"> -->
      <link href="assets/css/component.css" rel="stylesheet">
      <!-- for image gallery end -->
      <!-- custom css starts -->
      <link href="assets/css/cust_style.css" rel="stylesheet">
      <!-- custom css ends -->
      <!-- Custom CSS -->
      <style>
         body {
         padding-top: 100px;
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
      <!--END: HTML element-->
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
                      <a class="active" style="color:white" href="search.php" >Search</a>
                  </li>
           

                    <?php 

                     if($_SESSION['login_type']=="admin"){ ?>

                        
                        
                        <li>
                           <a href="client.php">Admin Panel</a>
                        </li> 

       <?php         } 

                  ?>
                        
                        


                  
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
      <div>
                 
                <div class="col-md-6">
                    
                     <div class="add-data">
                        <b>Edit Data</b>
                    </div>
                   
<!--                <p style="padding: 15px;background: rgba(199, 199, 199, 0.5);">
                  <b>ADD DATA</b>
                </p> -->
                <form id="update_data" action="ajax/update_data.php" method="POST" class="form" enctype="multipart/form-data" style="padding: 15px 20px 30px; background: #B9C3C3;">
                    
                    <ul class="error-box" id="data_error_footer">
                          
                    </ul>
                <?php    
                    
                    if($run_select = mysqli_query($con, $select_query)){
       
                        if($row = mysqli_fetch_assoc($run_select)){ ?>

                                <input name="tran_id" type="hidden" value="<?php echo $row['t_id']; ?>">
 
                                <div class="row" style="padding: 5px;">
                                    <div class="col-md-6">
                                       <div class="col-md-6" style="padding: 0;">
                                          <p>Pub Date</p>
                                          <input  id="pub_datepicker"  name="date" placeholder="Select Date" class="form-control" style="margin-bottom: 0px;" value="<?php echo $row['t_pub_date']; ?>">

                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <p>Publication</p>
                                       <select name="publication"  onchange="pub_changed(this.value,'edition','language','suppliment')"  data-live-search="true" class="selectpicker show-menu-arrow form-control">
                                          <option value=''>Select Publication</option>
                                               <?php 
                                                    echo "<option selected value='".$row['t_pub_name']."'>".$row['t_pub_name']."</option>";  
                                                    print_r(get_publication());
                                               ?>

                                       </select>
                                    </div>
                                 </div>
                                 <div class="row" style="padding: 5px;">
                                    <div class="col-md-6">
                                       <p>Edition</p> 
                                       <!---->
                                       <select id="edition" name="edition" data-live-search="true" class="show-menu-arrow form-control " >
                                          <option value=''>Select Edition</option>
                                          <?php 
                                                    echo "<option selected value='".$row['t_pub_edition']."'>".$row['t_pub_edition']."</option>";  
                                               ?>

                                       </select>
                                    </div>
                                    <div class="col-md-6">
                                       <p>Language</p>
                                       <select id="language" name="language"  data-live-search="true" class="show-menu-arrow form-control ">
                                          <option value=''>Select Language</option>
                                          <?php 
                                                    echo "<option selected value='".$row['t_pub_language']."'>".$row['t_pub_language']."</option>";  
                                                    
                                               ?>

                                       </select>
                                    </div>
                                 </div>
                                 <div class="row" style="padding: 5px;">
                                    <div class="col-md-6">
                                       <p>Suppliment</p>
                                       <select id="suppliment" name="suppliment" data-live-search="true" class="show-menu-arrow form-control ">
                                          <option value=''>Select Suppliment</option>

                                          <?php 
                                                    echo "<option selected value='".$row['t_pub_suppliment']."'>".$row['t_pub_suppliment']."</option>";  
                                                    
                                               ?>


                                       </select>
                                    </div>
                                    <div class="col-md-6">
                                       <p>Industry</p>
                                       <select name="industry" onchange="get_client(this.value,'client')" data-live-search="true" class="selectpicker show-menu-arrow form-control ">
                                          <option value=''>Select Industry</option>
                                          <?php 
                                                    echo "<option selected value='".$row['t_industry']."'>".$row['t_industry']."</option>";  
                                               ?>

                                       </select>
                                    </div>
                                 </div>
                                 <div class="row" style="padding: 5px;">
                                    <div class="col-md-6">
                                       <p>Client</p>
                                       <select id="client" name="client"  data-live-search="true" class="show-menu-arrow form-control">
                                           <option value="">Select Client</option>
                                           <?php 
                                                    echo "<option selected value='".$row['t_client_name']."'>".$row['t_client_name']."</option>";  
                                                    print_r(get_publication());
                                               ?>

                                       </select>
                                    </div>

                                    <div class="col-md-6">
                                       <p>News Type</p>
                                       <select id="news_type" name="news_type"  data-live-search="true" class="show-menu-arrow form-control">
                                          <option value="">Select News Type</option>
                                          <?php 
                                                    echo "<option selected value='".$row['t_news_type']."'>".$row['t_news_type']."</option>";  
                                               ?>
                                       </select>
                                    </div>

                                 </div>

                                 <div class="row" style="padding: 5px;">

                                     <div class="col-md-12">
                                       <p>Summary</p> 
                                       <textarea name="summary" class="form-control"><?php echo $row['t_summary'];?></textarea>
                                       
                                       <p>Title</p> 
                                       <input name="title" class="form-control" placeholder="Enter Title" value="<?php echo $row['t_title'] ?>"/>
                                     </div>

                                 </div>

                                 <div class="row" style="padding: 5px;">
                                    <div class="col-md-6">
                                       <p>Jouronalist</p>
                                       <input name="journalist" class="form-control" placeholder="Enter Journalist Name" value="<?php echo $row['t_journalist'] ?>" />


                                    </div>
                                    <div class="col-md-6">
                                       <p>Guest</p>
                                       <input name="guest" class="form-control" placeholder="Enter Guest Name" value="<?php echo $row['t_guest'] ?>" />
                                    </div>
                                 </div>

                                 <div class="row" style="padding: 5px;">

                                 <!--    <div class="col-md-12">
                                         <p><button id="add_input" type="button" class="btn btn-default btn-sm">Add</button></p>
                                     </div> -->


                                 </div>


                                 

                                <input id="update_submit" class='btn btn-lg btn-primary btn-block' name='update' style='margin-top: 10px;'  type='submit' value='Update'>

                                </form>


                            

       <?php            }else{

                            echo "<script>alert('Failed'); location.href = 'user_view.php'; </script>";
                            exit();
                            
                        }

                    }else{

                        echo "<script>alert('Failed'); location.href = 'user_view.php'; </script>";
                        exit();
                        
                    }   
                    
                ?>    
                    
                    
                  
               
            </div>



            <div class="col-md-6">



            <!-- dynamic images -->

            <?php # echo $img_data ?>

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
         
      </div>
      
      <div style="clear:both"></div>
      <div style='text-align: center'>
         <p class="bg-success" style="padding:10px;margin-top:20px"><small>Copyright © 2016 Design Croweye.in</small></p>
      </div>
      
     <!--.....................modal section..........................................-->
      <!-- Modal -->
      
      <div class="modal fade" id="add_client_modal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4  class="panel-title">Add Client</h4>
               </div>
               <div class="modal-body">
                  <div class="row centered-form">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                           <!--                            <div class="panel-heading">
                              <h3 class="panel-title">Add Client</h3>
                              </div>-->
                           <div class="panel-body">
                               
                               <div id="client_error_header">
                                   
                                   
                               </div> 
                               
                               
                              <form id="addClientForm" action="#" method="">
                                 <div class="row">
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p>Industry</p>
                                          <select name="indusrty" data-live-search="true" class="selectpicker show-menu-arrow form-control ">
                                             <option value=''>Select Industry</option>
                                             <?php print_r(get_industry()); ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p>Client</p>
                                          <input type="text" name="client"class="form-control input-sm" placeholder="Enter client name">
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
                                          <select name="state" onchange="get_city(this.value,'client_city')" data-live-search="true" class="selectpicker show-menu-arrow form-control">
                                             <option value="">Select State</option>
                                             <?php print_r(get_state()); ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">City</p>
                                          <select id="client_city" name="city" class="form-control input-sm">
                                             <option value="">Select City</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Address</p>
                                          <textarea name="clientAddress" class="form-control input-sm" placeholder="Enter Address"></textarea>
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Client Access</p>
                                          <select name="clientAccess" class="form-control input-sm">
                                             <option value="Y">YES</option>
                                             <option value="N">NO</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                  <br>
                                 <input id="addClient" name="addClient" type="submit" value="Submit" class="btn btn-info btn-block">
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                   
                <ul class="error-box" id="client_error_footer">
                     
                     
                     
                          
                 </ul>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="add_user_modal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add User</h4>
               </div>
                
               <div class="modal-body">
                   
                   <div id="user_error_header">
                       
                       
                   </div>
                   
                   
                  <div class="row centered-form">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                           <!--                            <div class="panel-heading">
                              <h3 class="panel-title">Add User</h3>
                              </div>-->
                           <div class="panel-body">
                              <form id="addUserForm" action="" method="">
                                 <div class="row">
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Username</p>
                                          <input name="userUsername" type="text" class="form-control input-sm" placeholder="Enter Userame">
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Email</p>
                                          <input type="email" name="userEmail" class="form-control input-sm" placeholder="Enter E-Mail">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Gender</p>
                                          <select name="userGender" class="form-control input-sm">
                                             <option value="M">Male</option>
                                             <option value="F">Female</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Date of Birth</p>
                                          <input id="dob_datepicker" name="userDob" class="form-control input-sm" placeholder="Select Date Of BIrth">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Contact No</p>
                                          <input name="userContactNo" type="text" class="form-control input-sm" placeholder="Enter Contact Number">
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">State</p>
                                          <select name="userState" onchange="get_city(this.value,'user_city')" data-live-search="true" class="selectpicker show-menu-arrow form-control">
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
                                          <select id="user_city" name="userCity" class="form-control input-sm">
                                             <option value="">Select City</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">Address</p>
                                          <textarea name="userAddress" class="form-control input-sm" placeholder="Enter Address"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">User Type</p>
                                          <select name="userType" class="form-control input-sm">
                                             <option value="admin">ADMIN</option>
                                             <option value="user">USER</option>
                                             <option value="client">CLIENT</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class=" col-md-6">
                                       <div class="form-group">
                                          <p style="margin-bottom: 3px">User Access</p>
                                          <select name="userAccess" class="form-control input-sm">
                                             <option value="Y">YES</option>
                                             <option value="N">NO</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                  <br>
                                 <input id="addUser" name="addUser" type="submit" value="Submit" class="btn btn-info btn-block">
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                   
                  
                 <ul class="error-box" id="user_error_footer">
                     
                     
                     
                          
                 </ul>
                   
               </div>
                
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
                
            </div>
         </div>
      </div>
      
     
      
      
      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
      <script src="assets/js/jquery-ui.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- for datepicker start-->
     <script>
         $(function() {
         
             $( "#pub_datepicker" ).datepicker();
         
         });
         
         $(function() {
         
             $( "#from_datepicker" ).datepicker();
         
         });
         
         $(function() {
         
             $( "#to_datepicker" ).datepicker();
         
         });
         
         $(function() {
         
             $( "#dob_datepicker" ).datepicker();
         
         });
      </script>
      <!-- Bootstrap Core JavaScript -->
      <!-- Latest compiled and minified JavaScript -->
      <!-- for image gallery start -->
      <script src="assets/js/index.js"></script>
      <script src='assets/js/photoswipe.min.js'></script>
      <script src='assets/js/photoswipe-ui-default.min.js'></script>
      <script src="assets/js/custom-file-input.js"></script>
      <!-- <script src="js/jquery.custom-file-input.js"></script>-->
      <!-- <script src="js/jquery-v1.min.js"></script> -->
      <!-- for image gallery end -->
      <script src="http://malsup.github.com/jquery.form.js"></script> 
      <script src="assets/js/functions.js"></script>
      <script src="assets/js/cust_script.js"></script>
   </body>
</html>