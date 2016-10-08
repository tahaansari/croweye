<?php

      session_start();  
      include("../includes/config.php");
      include("../includes/functions.php");
      
      if(!isset($_SESSION['is_logged_in'])){
      
         header("Location:../");
         exit();

      }else if($_SESSION['login_type'] != 'user' && $_SESSION['login_type'] != 'admin' ){


         header("Location:../");
         exit();

      }
      

      
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
         padding-top: 90px;
         /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
         }
      </style>
   </head>
   <body>
      <div class="js">
         <div id="preloader">
         </div>
      </div>
      <!--END: HTML element-->
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
               <!-- <h2>Crow Eye</h2> -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="menu nav navbar-nav navbar-right">
                  <li>
                      <a href="" class="active" style="color:white">Home</a>
                  </li>
                  <li>
                      <a href="search.php" >Search</a>
                  </li>

<!--                   <li>
                      <a href="search.php" >Online News</a>
                  </li> -->

                        <!-- <li>
                           <a href="" data-toggle="modal" data-target="#add_client_modal">Add Client</a>
                        </li>
                        <li>
                           <a href="" data-toggle="modal" data-target="#add_user_modal">Add User</a>
                        </li>


                        <li>
                           <a href="" data-toggle="modal" data-target="#add_user_modal">Edit Client</a>
                        </li>

                        <li>
                           <a href="" data-toggle="modal" data-target="#add_client_modal">Edit User</a>
                        </li> -->
                  <?php 

                     if($_SESSION['login_type']=="admin"){ ?>

                        
                        
                        <li>
                           <a href="client.php">Admin Panel</a>
                        </li> 

       <?php         } 

                  ?>
                  


<!--                  <li>
                     <a href="" data-toggle="modal" data-target="#user_modal">Search</a>
                  </li>-->
                  
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
                <b>Indexing</b>
             </div>
            <!--                <p style="padding: 15px;background: rgba(199, 199, 199, 0.5);">
               <b>ADD DATA</b>
               </p> -->  
            <form id="from_data" action="ajax/add_data.php" method="POST" style="padding: 15px 20px 30px; background: #B9C3C3;">
                



              <ul class="error-box" id="data_error_footer">
                          
              </ul>


               <div class="row" style="padding: 5px;">
                   
                  <div class="col-md-6">
                     <div class="col-md-6" style="padding: 0;">
                        <p>Pub Date</p>
                        <input  id="pub_datepicker"  name="date" placeholder="Select Date" class="form-control" style="margin-bottom: 0px;" value="<?php echo date('d-m-Y') ?>">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <p>Publication</p>
                     <select name="publication" onchange="pub_changed(this.value,'edition','language','suppliment')"  data-live-search="true" class="selectpicker show-menu-arrow form-control">
                        <option value="">Select Publication</option>
                        <?php print_r(get_publication()); ?>
                     </select>
                  </div>
               </div>
               <div class="row" style="padding: 5px;">
                  <div class="col-md-6">
                     <p>Edition</p>
                     <select id="edition" name="edition" data-live-search="true" class="show-menu-arrow form-control " >
                        <option value="">Select Edition</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <p>Language</p>
                     <select id="language" name="language"  data-live-search="true" class="show-menu-arrow form-control ">
                        <option value="">Select Language</option>
                     </select>
                  </div>
               </div>


               <div class="row" style="padding: 5px;">
                  <div class="col-md-6">
                     <p>Suppliment</p>
                     <select id="suppliment" name="suppliment" data-live-search="true" class="show-menu-arrow form-control ">
                        <option value="">Select Suppliment</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <p>Industry</p>
                     <select name="industry" onchange="get_client(this.value,'data_client')" data-live-search="true" class="selectpicker show-menu-arrow form-control ">
                        <option value="">Select Industry</option>
                        <?php  print_r(get_industry()); ?>
                     </select>
                  </div>
               </div>
               <div class="row" style="padding: 5px;">
                   
                   <div class="col-md-6">
                           <p>Client</p>
                           <select id="data_client" name="client"  data-live-search="true" class="show-menu-arrow form-control">
                              <option value="">Select Client</option>
                           </select>
                   </div>
                   
                  <div class="col-md-6">
                     <p>News Type</p>
                     <select id="news_type" name="news_type"  data-live-search="true" class="show-menu-arrow form-control">
                        <option value="">Select News Type</option>
                        <option value="information">Information</option>
                        <option value="positive">Positive</option>
                        <option value="negative">Negative</option>
                     </select>
                  </div>
               </div>
               <div class="row" style="padding: 5px;">
                  <div class="col-md-12">
                     <p>Summary</p>
                     <textarea name="summary" class="form-control"  placeholder="Enter Summary"></textarea>
                     <p>Title</p>
                     <input type="text" name="title" class="form-control" placeholder="Enter Title" />
                  </div>
               </div>
               <div class="row" style="padding: 5px;">
                  <div class="col-md-6">
                     <p>Jouronalist</p>
                     <input type="text" name="journalist" class="form-control" placeholder="Enter Journalist Name"/>
                  </div>
                  <div class="col-md-6">
                     <p>Guest</p>
                     <input type="text" name="guest" class="form-control" placeholder="Enter Guest Name"/>
                  </div>
               </div>







               <div class="row" style="padding: 5px;">
                  <div class="col-md-12">
                     <p><button id="add_input" type="button" class="btn btn-default btn-sm">Add</button></p>
                  </div>
               </div>

               <div class="row" style="padding: 5px;">
                  <div id="input_box">
                     <div class="col-md-12" style="padding: 0;">
                        <!--style="display: flex"-->


                        <div class='col-md-3'>

                                <input name='files[]' onchange='readURL1(this)' style='display:none;margin:5px' type='file'  id='1' class='inputfile inputfile-1' >
                                
                                <label for='1'>
                                   <svg xmlns='http://www.w3.org/2000/svg' width='20' height='17' viewBox='0 0 20 17'>
                                      <path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'>
                                      </path>
                                   </svg>
                                   <span id='name1'>Select a file</span>
                                </label>
                       </div>

                        
                        <div class="col-md-3" >
                           <input id="pg" name="page[]" type="text" placeholder="PageNo" class="form-control input-sm"/>
                        </div>
                        
                        <div class="col-md-3" >
                           <!--<b style="margin-top: 5px">Position:</b>&nbsp;-->
                           <select id="pos" name="position[]" class="form-control input-sm">
                              <option value="">Select Position</option>
                              <option value="top">Top</option>
                              <option value="bottom">Bottom</option>
                              <option value="left">Left</option>
                              <option value="right">Right</option>
                              <option value="center">Center</option>
                              
                           </select>
                        </div>
                        <div class="col-md-3" >
                           <!--<b style="margin-top: 5px">Position:</b>&nbsp;-->
                           <select id="logo" name="logo[]"  class="form-control input-sm">
                              <option value="">Select logo</option>
                              <option value="no">No</option>
                              <option value="yes">Yes</option>
                              
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               
               
               <input id="data_submit" class="btn btn-lg btn-primary btn-block" style="margin-top: 10px"  type="submit" value="Submit"> 

            </form>


         </div>
         <div class="col-md-6">
            <div id="image-box" class="my-gallery" >
               <div id="img-div1" style="margin-bottom: 30px; display: none" class="col-md-6">
                  <figure>
                     <a id="b-image1" href="../images/1.jpg" data-size="1024x1024">
                     <img class="box-img" id="s-image1" src="#"  alt="Image not loaded"/>
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
      </div>
      <div style="clear:both"></div>
      <div class="" style='text-align: center'>
         <p class="bg-success" style="padding:10px;margin-top:20px"><small>Copyright © 2016 Design Croweye.in</small></p>
      </div>
      

      
     
      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
      <script src="assets/js/jquery-ui.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- for datepicker start-->
      <script>
         //      $("#success-alert").alert();
                 $("#success-alert").fadeTo(2000, 500).fadeOut(3000, function(){
                         
                     $("#success-alert").alert('close');
                        
                 });   
                   
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
                  
                      $( "#user_dob" ).datepicker();
                  
                  });
               
      </script>
      <script src="assets/js/index.js"></script>

      <script src='assets/js/photoswipe.min.js'></script>
      <script src='assets/js/photoswipe-ui-default.min.js'></script>
      <script src="assets/js/custom-file-input.js"></script>
      <script src="assets/js/functions.js"></script>
      <script src="http://malsup.github.com/jquery.form.js"></script> 
      <script src="assets/js/cust_script.js"></script>
   </body>
</html>