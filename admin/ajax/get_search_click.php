<?php


        if($_POST['publication']==""){

            echo 0;
            exit();
          
        }

//      echo "success";
        session_start(); 

        $login_type = $_SESSION['login_type'];
        
        include '../../includes/config.php';
        include '../../includes/functions.php';

        $start=0;
        $limit=15;


        

        if(isset($_GET['id']))
        {
          $id=$_GET['id'];
          $start=($id-1)*$limit;
        }else{

          $id=1;
        }

        if($_POST['from']  && $_POST['to'] !=""){
            
            $from = date('Y-m-d', strtotime($_POST['from']));
            $to = date('Y-m-d', strtotime($_POST['to']));
            
            $date = " and `t_pub_date` between '".$from."' and '".$to."'";

            
        }else{
            
            $date = "";
        }
        
        $publication = "'".$_POST['publication']."'";
        

        if($_POST['edition'] != ""){
            
            $edition = " and `t_pub_edition`="."'".$_POST['edition']."'";
            
        }else{
            
            $edition = "";
            
        }

        
        if($_POST['language'] !=""){
            
            $language = " and `t_pub_language`="."'".$_POST['language']."'";
            
        }else{
            
            $language = "";
        }
        
        if($_POST['suppliment'] !=""){
            
            $supplement = " and `t_pub_suppliment`="."'".$_POST['suppliment']."'";
            
        }else{
            
            $supplement = "";
            
        }
        
        
 
        

        
        $query = "SELECT `t_id`, `t_u_id`, `t_pub_date`, `t_title`, `t_news_type`, `t_journalist`, `t_guest`, `t_pub_name`, `t_pub_edition`, `t_pub_suppliment`, `t_pub_language`, `t_industry`, `t_client_name`, `t_summary` FROM `tbl_transaction` WHERE `t_pub_name`=".$publication.$edition.$language.$supplement.$date." LIMIT $start, $limit";






          // echo $query;
          // exit();   
        

        
        if($run_select = mysqli_query($con, $query)){

            $num_rows = mysqli_num_rows($run_select);

            if($num_rows>0){

                        if($_SESSION['login_type']=='user' || $_SESSION['login_type']=='admin'){
                                  
                           while($query2=mysqli_fetch_array($run_select))
                            {
                                   echo    "<tr>";
                                    echo    "<td data-title='Publish Date'>".date( "d/m/Y", strtotime($query2['t_pub_date']) )."</td>";
                                    echo    "<td data-title='Title'>".$query2['t_news_type']."</td>";
                                    echo    "<td data-title='Title'>".$query2['t_title']."</td>";
                                    echo    "<td data-title='Publication'>".$query2['t_pub_name']."</td>";
                                    echo    "<td data-title='Edition'>".$query2['t_pub_edition']."</td>";
                                    echo    "<td data-title='Supliment'>".$query2['t_pub_suppliment']."</td>";
                                    echo    "<td data-title='Language'>".$query2['t_pub_language']."</td>";
                                    echo    "<td data-title='Summary'>".$query2['t_summary']."</td>";

                                    echo    "<td data-title='View Clips'><a href='#' id='view_".$query2['t_id']."' onclick=\"open_view(this.id,'".$query2['t_pub_date']."','".$query2['t_industry']."')\"> View </a></td>";

                                    echo    "<td data-title=''><a href='edit.php?id=".$query2['t_id']."'><b>EDIT</b></a></td>";

                                    echo    "<td data-title=''><a id='del_".$query2['t_id']."' onclick='delete_news(this.id)'; style='color:red'><b>DELETE</b></a></td>";
                                  echo    "</tr>";
                            }


                          
                      }else{
                          
                          while($query2 = mysqli_fetch_assoc($run_select)){
                      
                                          echo    "<tr>";
                                            echo    "<td data-title='Publish Date'>".date( "d/m/Y", strtotime($query2['t_pub_date']) )."</td>";
                                            echo    "<td data-title='Title'>".$query2['t_news_type']."</td>";
                                            echo    "<td data-title='Title'>".$query2['t_title']."</td>";
                                            echo    "<td data-title='Publication'>".$query2['t_pub_name']."</td>";
                                            echo    "<td data-title='Edition'>".$query2['t_pub_edition']."</td>";
                                            echo    "<td data-title='Supliment'>".$query2['t_pub_suppliment']."</td>";
                                            echo    "<td data-title='Language'>".$query2['t_pub_language']."</td>";
                                            echo    "<td data-title='Summary'>".$query2['t_summary']."</td>";
                                            echo    "<td data-title='View Clips'><a href='#' data-toggle='modal' data-target='#myModal'>View</a></td>";

                                            // echo    "<td data-title=''><a href='edit.php?id=".$query2['t_id']."'><b>EDIT</b></a></td>";

                                            // echo    "<td data-title=''><a id='del_".$query2['t_id']."' onclick='delete_news(this.id)'; style='color:red'><b>DELETE</b></a></td>";
                                          echo    "</tr>";


                                            

                          }
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
                            echo  "<td colspan='11'>NO DATA AVAILABLE</td>";
                            echo "<tr>";
                
            }
            
            
            
        }else{
            
                            echo "<tr>";
                            echo  "<td colspan='11'>Failed</td>";
                            echo "<tr>";
        }
        
        