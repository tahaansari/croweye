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
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <!-- for image gallery start -->
      <link rel='stylesheet' href='css/photoswipe.css'>
      <link rel='stylesheet' href='css/default-skin.css'>
      <!--       <link href="css/demo.css" rel="stylesheet">
         <link href="css/normalize.css" rel="stylesheet"> -->
      <link href="css/component.css" rel="stylesheet">
      <!-- for image gallery end -->
      <!-- custom css starts -->
      <link href="css/cust_style.css" rel="stylesheet">
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
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
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
                  <!--                   <li>
                     <a href="../index.php">Home</a>
                     </li> -->
                  <li>
                     <!-- style="border: 1px solid #FECE1A;" -->
                     <a href="" style="border: 1px solid #FECE1A;">Home</a>
                  </li>
                  <li>
                     <!-- style="border: 1px solid #FECE1A;" -->
                     <a href="">Add Client</a>
                  </li>
                  <li>
                     <!-- style="border: 1px solid #FECE1A;" -->
                     <a href="">Add User</a>
                  </li>
                  <li>
                     <a href="" data-toggle="modal" data-target="#user_modal">Search</a>
                  </li>
                  <li>
                     <h4 href="#" style="padding: 5px;font-family: cursive;margin-top: 15px; color: whitesmoke;"> <?php # echo $_SESSION['username']; ?> </h4>
                  </li>
                  <li>
                     <a href="logout.php">Logout</a>
                  </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
      
      
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap-select.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- for datepicker start-->
      
      <script>
         $(function() {
         
             $( "#datepicker" ).datepicker();
         
         });
      </script>
      <!-- Bootstrap Core JavaScript -->
      <!-- Latest compiled and minified JavaScript -->
      <!-- for image gallery start -->
      <script src="js/index.js"></script>
      <script src='js/photoswipe.min.js'></script>
      <script src='js/photoswipe-ui-default.min.js'></script>
      <script src="js/custom-file-input.js"></script>
      <!-- <script src="js/jquery.custom-file-input.js"></script>-->
      <!-- <script src="js/jquery-v1.min.js"></script> -->
      <!-- for image gallery end -->
      <script src="js/functions.js"></script>
      <script src="js/cust_script.js"></script>
   </body>
</html>