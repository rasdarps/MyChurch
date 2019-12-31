<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 //Calling logged function to prevent user from accessing profile page if logged out
if(!isset($_SESSION['username']) || $_SESSION['user_role']!='sa')
{
    echo '<script>
	alert("Log In To Access This Page!");
	window.location = "login.php";
	</script>';
  //header("Location:staff-login.php");
  //echo '<script>window.location.href = "admin.php";</script>';
}

//when session starts the variable is fetched from the login page and stored in the $email variable on profile page
$username=$_SESSION['username'];
$user_role=$_SESSION['user_role'];

//Select statement to query details of logged in account from the database
$result=mysqli_query($conn,"SELECT id,username,fullname,user_role,img FROM users WHERE username='$username' AND user_role='$user_role'");

//Data is fetched from the database When username matches entered matches any of the emails in the database
$retrieve=mysqli_fetch_array($result);

//This id will show who is logged in and will allow the user to edit his profile or change password
$id=$retrieve['id'];
$username=$retrieve['username'];
$fullname=$retrieve['fullname'];
$image=$retrieve['img'];
$user_role=$retrieve['user_role'];


//print_r($retrieve);

 ?>

<title>Inbox</title>
<style>
#pagination_control{
    font-family: arial,sans-serif;
    font-size: small;
    margin-bottom:10px;
}

#pagination_control a{
        color:#06f;
}

#pagination_control a:visit{
    color:#06f;
}

.textline{
    font-family: arial,sans-serif;
    font-size: small;
    margin-bottom:10px;
}

table td a{
    color:#06f!important; 
}

a{
    text-decoration:none;
}

</style>

<?php include("includes/sa-header.php");?>
<?php
                // define how many results you want per page
                    $page_rows = 5;

                // find out the number of results stored in database
                    $sql="SELECT * FROM messages";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_num_rows($result);

                    // determine number of total pages available
                    $last = ceil($row/$page_rows);

                   //preventing last from being less than 1
                    if($last < 1){
                        $last = 1;

                    }
                        //Establishpage numvariable
                        $pagenum = 1;

                        // determine which page number visitor is currently on
                        if (isset($_GET['page'])) {

                        //preg_replace makes value only numbers
                        $pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
                        }

                        //preventing page numbers from being less than 1 or more than last page

                        if($pagenum < 1){
                            $pagenum = 1;

                        }else if($pagenum > $last){
                            $pagenum = $last;

                            }

                    // determine the sql LIMIT starting number for the results on the displaying page
                    $this_page_first_result = ($pagenum-1)*$page_rows;


             // retrieve selected results from database and display them on page
                $sql='SELECT * FROM messages ORDER BY messages.msg_time ASC LIMIT ' . $this_page_first_result . ',' .  $page_rows;
                $result = mysqli_query($conn, $sql);

                //Showing user what page they are on and number of data rows
                $textline1 = "Total Records (<b>$row</b>)";
                $textline2 = "Page <b>$pagenum<b> of <b>$last</b>";

                 //Pagination controls variable
                 $paginationCtrls='';

                 //If there is more than 1 page worth of results
                 if($last != 1){
                 //if on page one no need to show previous link or1 link 
                 
                 if($pagenum > 1){
                     $previous = $pagenum - 1;
                     $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'">Previous</a> &nbsp;';
                 
                     //Setting clickable number links on left 
                     for($i = $pagenum-4; $i < $pagenum; $i++){
                         if($i > 0){
                             $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp;';

                         }
                     }
                  }
                  //Render target page
                  $paginationCtrls .=''.$pagenum.' &nbsp;';

                  //Setting clickable number links on right
                  for($i = $pagenum + 1; $i <= $last; $i++){
                      $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp;';
                      if($i >= $pagenum + 4){
                          break;
                     }
                 }

                 if($pagenum !=$last){
                     $next = $pagenum + 1;
                     $paginationCtrls .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a>';

                 }

                 }
                 ?>
 <!--user TABLE-->
    <div class="container-fluid" style="margin-bottom:210px; margin-top:10px;"> 
        <div style="margin-bottom:30px;">
               <p class="textline"><?php echo $textline1;?> &nbsp; / &nbsp; <?php echo $textline2;?></p>
                           
            <div class="row">
                    <div class="table-responsive" id="results2">
                       <table class="table table-bordered table-striped table-hover" id="table" style="background:#fff;">
                                <thead style="background:#460322; color:#fff;">
                                    <tr>
                                        
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Name</th>   
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Content</th>
                                        <th>View</th>
                                        <th>Delete</th>                       
                                    </tr>
                                </thead>
                    
                        
                        <?php

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $msg_date = $row['msg_date'];
                                $msg_time = $row['msg_time'];
                                $name = $row['fullname'];
                                $contact = $row['contact'];
                                $email = $row['email'];
                                $content = $row['content'];
                                
                                
                                ?>
                           
                            <tr>
                           
                            
                            <td><a href='sa-message.php?msgid=<?php echo$id;?>'><?php echo $msg_date;?></a></td>
                            <td><a href='sa-message.php?msgid=<?php echo$id;?>'><?php echo $msg_time;?></a></td>
                            <td><a href='sa-message.php?msgid=<?php echo$id;?>'><?php echo $name;?></a></td>   
                            <td><a href='sa-message.php?msgid=<?php echo$id;?>'><?php echo $contact;?></a></td>
                            <td><a href='sa-message.php?msgid=<?php echo$id;?>'><?php echo $email;?></a></td>
                            <td><a href='sa-message.php?msgid=<?php echo$id;?>'><?php echo substr($content,0,50); ?>...</a></td> 
                            <td><?php echo "<a href='sa-message.php?msgid=$id' data-toggle='tooltip' data-placement='top' title='View'><i class='fas fa-eye' style='color:orange; font-size:16px'></i></a></th>";?></td>
                            <td><?php echo "<a href='sa-message-del.php?del=$id' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fas fa-trash-alt' style='color:red; font-size:16px'></i></a></th>";
                            ?></td>
                              
                            </tr>
                            
                           
                            </tr>

                            <?php

                                }
                                }else{
                                ?>
                                <tr>
                                    <td>Data Not Found</td> 
                                </tr>
                                <?php

                                }
                                        

                                ?>

            
                        </table>
                    </div>
            </div>        
                    <div id="pagination_control">
                        <center> <?php echo $paginationCtrls?></center>
                    </div>
        </div>   
        
    </div>

     
<?php include("includes/footer.php");?>