
<?php 

      session_start();
    
      if(!isset($_SESSION['is_logged_in'])){
      
         header("Location:../");
         exit();

      }else if($_SESSION['login_type'] != 'user' && $_SESSION['login_type'] != 'admin' ){


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
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
      <link rel="stylesheet" href="assets/css/jquery-ui.css">
      <!-- for image gallery start -->
      <link rel='stylesheet' href='assets/css/photoswipe.css'>
      <link rel='stylesheet' href='assets/css/default-skin.css'>
      <!--       <link href="css/demo.css" rel="stylesheet">
         <link href="css/normalize.css" rel="stylesheet"> -->
      <link href="assets/css/component.css" rel="stylesheet">
      <!-- for image gallery end -->
      <!-- <link rel="stylesheet" href="path/to/Zebra_Pagination/public/css/zebra_pagination.css" > -->

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


      
      <div class="">
         <div class="col-md-3">
            <div class="filter-box panel panel-grey margin-bottom-40">
                <div class="panel-heading" style="background: #FF5722;">
                  <h3 class="panel-title"><i class="fa fa-tasks"></i><b>Filter</b></h3>
                  </div> 
<!--               <p>
                       <b>Filter</b>
               </p>-->
               <div class="panel-body">
                   
                   
                   <form id="filterForm">
                       
                       <div class="" style="padding: 5px;">
                            <div>
                               <div class="">
                                  <p>From</p>
                                  <input name="from" id="from_datepicker" placeholder="Select Date" class="form-control input-sm" >
                               </div>
                               <div class="">                        
                                  <p>To</p>
                                  <input name="to" onchange="search_change()" id="to_datepicker" placeholder="Select Date" class="form-control input-sm">
                               </div>
                            </div>
                            <div >
                               <p >Publication</p>
                               <select id="publication" name="publication" onchange="pub_changed(this.value,'edition','language','suppliment')" data-live-search="true" class="selectpicker show-menu-arrow form-control input-sm">
                                  <option value=''>Select publication</option>
                                  <?php print_r(get_publication()); ?>
                               </select>
                            </div>
                            <div >
                               <p>Edition</p>
                               <select name="edition" id="edition" data-live-search="true" class="show-menu-arrow form-control input-sm">
                                  <option value=''>Select Edition</option>
                               </select>
                            </div>
                            <div >
                               <p>Language</p>
                               <select name="language" id="language" data-live-search="true" class="show-menu-arrow form-control input-sm ">
                                  <option value=''>Select Language</option>
                               </select>
                            </div>
                            <div>
                               <p>Suppliment</p>
                               <select name="suppliment"  id="suppliment" data-live-search="true" class="show-menu-arrow form-control input-sm ">
                                  <option value=''>Select Suppliment</option>
                               </select>
                            </div>
                         </div>

                         <div style="margin-left: 5px;margin-top: 10px;">
                             <input type="submit" onclick="event.preventDefault(); search_click()" name="filterSubmitted" class="btn btn-primary" value="Search">
                         </div>
                       
                   </form>
                   
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div id="no-more-tables">
               <table class="col-md-12 table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                     <tr>
                        <th>Publish Date</th>
                        <th>New Type</th>
                        <th>Title</th>
                        <th>Publication</th>
                        <th>Edition</th>
                        <th>Supliment</th>
                        <th>Language</th>
                        <!-- <th>Summary</th> -->
              
                        <th>View Clips</th>
                        <th></th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody id="dynamic_values">
                      
                    <?php 


                        // $sql = "SELECT f.*, s.`id_tran_idmg_name`  FROM `tbl_transaction` f join `tbl_img_data` s on f.`t_id` = s.`id_tran_id` LIMIT $start, $limit";

                        $sql = "SELECT `t_id`, `t_u_id`, `t_pub_date`, `t_title`, `t_news_type`, `t_journalist`, `t_guest`, `t_pub_name`, `t_pub_edition`, `t_pub_suppliment`, `t_pub_language`, `t_industry`, `t_client_name`, `t_summary` FROM `tbl_transaction` LIMIT $start, $limit";

                        if($query=mysqli_query($con,$sql)){


                          $num_rows = mysqli_num_rows($query);

                          

                          if($num_rows>0){


                            // <a href='#' id='view_".$query2['t_id']."' 
                            //                             onclick='open_view(this.id,'".$query2['t_pub_date']."','".$query2['t_industry']."')'>
                            //                         View
                            //                         </a>
                              while($query2=mysqli_fetch_array($query))
                              {
                                    echo    "<tr id='row_".$query2['t_id']."'>";
                                      echo    "<td data-title='Publish Date'>".date( "d-m-Y", strtotime($query2['t_pub_date']) )."</td>";
                                      echo    "<td data-title='Title'>".$query2['t_news_type']."</td>";
                                      echo    "<td data-title='Title'>".$query2['t_title']."</td>";
                                      echo    "<td data-title='Publication'>".$query2['t_pub_name']."</td>";
                                      echo    "<td data-title='Edition'>".$query2['t_pub_edition']."</td>";
                                      echo    "<td data-title='Supliment'>".$query2['t_pub_suppliment']."</td>";
                                      echo    "<td data-title='Language'>".$query2['t_pub_language']."</td>";
                                      // echo    "<td data-title='Summary'>".$query2['t_summary']."</td>";

    echo    "<td data-title='View Clips'><a href='#' id='view_".$query2['t_id']."' onclick=\"open_view(this.id,'".$query2['t_pub_date']."','".$query2['t_industry']."')\"> View </a></td>";

                                      echo    "<td data-title=''><a href='edit.php?id=".$query2['t_id']."'><b>EDIT</b></a></td>";

  echo    "<td data-title=''><a id='del_".$query2['t_id']."' onclick='delete_news(this.id)'; style='color:red'><b>DELETE</b></a></td>";
                                    echo    "</tr>";
                                     
                              }




                              if($num_rows>14){



                                   $rows=mysqli_num_rows(mysqli_query($con,"SELECT `t_id` FROM `tbl_transaction`"));
                                   $total=ceil($rows/$limit);

                                    // $id>1


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
                                echo  "<td colspan='11'>NO DATA</td>";
                                echo "<tr>";


                            }


                        }else{


                                echo $sql;

                                echo "<tr>";
                                echo  "<td colspan='11'>Failed</td>";
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
      
     
     
      
      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
      <script src="assets/js/index.js"></script>
      <script src="assets/js/jquery-ui.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      
       <script>
           
         $(function() {
         
             $( "#from_datepicker" ).datepicker();
         
         });
         
         $(function() {
         
             $( "#to_datepicker" ).datepicker();
         
         });
      
         
      </script>
      

      
      <script src='assets/js/photoswipe.min.js'></script>
      <script src='assets/js/photoswipe-ui-default.min.js'></script>
      <script src='assets/js/photoswipe-ui-default.min.js'></script>
      <script src="assets/js/custom-file-input.js"></script>
      <script src="assets/js/functions.js"></script>

      <!-- <script type="text/javascript" src="path/to/Zebra_Pagination/public/javascript/zebra_pagination.js"></script> -->
      <script src="assets/js/cust_script.js"></script>
      <!-- Latest compiled and minified JavaScript -->
   </body>
</html>