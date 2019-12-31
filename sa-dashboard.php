<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();

 //Calling logged function to prevent user from accessing profile page if logged out
if(!isset($_SESSION['username']) || $_SESSION['user_role']!='sa') 
{
    echo '<script>
	alert("You are not Authorized To access page!");
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

//TO SEARCH AND SHOW TOTAL NUMBER OF MEMBERS
$result_members=mysqli_query($conn,"SELECT id FROM members");
$row_members=mysqli_num_rows($result_members);

//TO SEARCH AND SHOW TOTAL DUES
$result = mysqli_query($conn, 'SELECT SUM(amount) AS value_sum FROM welfare'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];


//TO SEARCH AND SHOW TOTAL NUMBER OF Messages
$result_msg=mysqli_query($conn,"SELECT id FROM messages");
$row_msg=mysqli_num_rows($result_msg);


//TO SEARCH AND SHOW TOTAL NUMBER OF Messages
//$result_msg=mysqli_query($conn,"SELECT id FROM messages");
//$row_msg=mysqli_num_rows($result_msg);

//print_r($retrieve);

//This id will show who is logged in and will allow the user to edit his profile or change password
$id=$retrieve['id'];
$username=$retrieve['username'];
$fullname=$retrieve['fullname'];
$image=$retrieve['img'];
$user_role=$retrieve['user_role'];


 //print_r ($_SESSION);
 
 ?>
 
<title>SA | DASHBOARD</title>
<?php include("includes/sa-header.php");?>

<style>
 /*Breadcrumb*/
     #main{
         margin-bottom:100px;
     }
    .main-color{
        background:#460322!important;
        border-color:#000 !important;
        color:#fff;
    }



    .dash-box{
        background:#fff; 
        padding:10px; 
        color:#000;
        text-align:center;
        }

     

 /*MEDIA QUERY*/

@media (max-width: 992px) {

}

@media (max-width: 768px) {
    .dash-box h4, h5{
      font-size:19px;
  }

  .dash-box{
        background:#fff; 
        padding:5px; 
        color:#fff;
        margin:5px;
        
        }


.side-menu{
    display:none;
}

}

@media (max-width: 576px) {
    .dash-box h4, h5{
      font-size:19px;
  }

  .dash-box{
        background:#fff; 
        padding:5px; 
        color:#fff;
        margin:5px;
        
        }

   
.side-menu{
    display:none;
}

}

 </style>




<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-3 col-sm-3">
          
                <div class="list-group list-group-text side-menu">
                    <a href="sa-dashboard.php" class="list-group-item list-group-item-action active  main-color">
                        DASHBOARD
                    </a>
                    <a href="form.php" class="list-group-item list-group-item-action"><i class="fas fa-user-plus" style="color:green;"></i> <span class="dash-text">Add Member</span></a>
                    <a href="sa-post-new.php" class="list-group-item list-group-item-action"><i class="fas fa-edit" style="color:#000;"></i> <span class="dash-text">Post Announcement</span></a> 
                    <a href="sa-hymn-new.php" class="list-group-item list-group-item-action"><i class="fas fa-edit" style="color:#000;"></i> <span class="dash-text">Post Hymn</span></a>
                    <a href="welfare.php" class="list-group-item list-group-item-action"><i class="fas fa-hand-holding-usd" style="color:brown;"></i> <span class="dash-text">Welfare</span></a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-hand-holding-usd" style="color:brown;"></i> <span class="dash-text"> Other Finacial Recordings</span></a>
                    <a href="sa-welfare-list.php" class="list-group-item list-group-item-action"><i class="fas fa-eye" style="color:#82C91E;"></i> <span class="dash-text">View Welfare List</span></a>
                    <a href="sa-member-list.php" class="list-group-item list-group-item-action"><i class="fas fa-search" style="color:#2B8A9A;"></i> <span class="dash-text">Membership List</span></a>
                    <a href="sa-post-view.php" class="list-group-item list-group-item-action"><i class="fas fa-eye" style="color:blue;"></i> <span class="dash-text">View Post</span></a>
                     
                </div>

               
                    <div class="progress side-menu" style="margin-top:40px;">
                    <?php
                        //visitors stats
                        $find_count=mysqli_query($conn,"SELECT * FROM visitors");
                        while($row = mysqli_fetch_assoc($find_count)){
                        $current_count = $row['dash_count'];
                        $new_count = $current_count + 1;
                        $update_count = mysqli_query($conn,"UPDATE visitors SET dash_count='$new_count'");
                        }
                        echo '<p>VisStat: '.$new_count.'</p>';
                        ?>
                    </div>

                    <div class="progress side-menu" style="margin-top:30px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">65%</div>
                    </div>
               

            </div>

           <div class="col-md-9 col-xs-12 col-sm-12">
                <div class="card ">
                    <h5 class="card-header main-color">STATUS</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 col-sm-4">
                            <a href="sa-member-list.php" style="text-decoration:none;">
                                <div class="dash-box">
                                    <h5><i class="fa fa-user" style="color:green;"></i> <span style="color:red;"><?php echo $row_members;?></span></h5>
                                    <h5 style="color:#2A3F54;">Members</h5>
                                </div>
                            </a>
                            </div>
                            
                            
                            <div class="col-md-2 col-xs-4 col-sm-4">
                            <a href="sa-welfare-list.php" style="text-decoration:none;">
                                <div class="dash-box">
                                    <h5><i class="fas fa-hand-holding-usd" style="color:#0D80D0;"></i></i> <span style="color:red;">Gh¢<?php echo $sum;?></span></h5>
                                    <h5 style="color:#2A3F54;">Total Dues</h5>
                                </div>
                                </a>
                            </div>
                            

                           <div class="col-md-2 col-xs-4 col-sm-4">
                                <a href="sa-member-list.php" style="text-decoration:none;">
                                    <div class="dash-box">
                                        <h5><i class="fas fa-search" style="color:#2B8A9A;"></i> <span></span></h5>
                                        <h5 style="color:#2A3F54;">Search</h5>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-2 col-xs-4 col-sm-4">
                            <a href="sa-inbox.php" style="text-decoration:none;">
                                <div class="dash-box">
                                    <h5><i class="fas fa-envelope" style="color:#0D80D0;"></i></i> <span style="color:red;"><?php echo $row_msg; ?></span></h5>
                                    <h5 style="color:#2A3F54;">Inbox</h5>
                                </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card" style="margin-top:50px;">
                    <h5 class="card-header main-color">UPCOMING BIRTHDAYS</h5>
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color:#000;">
                     <thead>
                    <tr>
                    
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Contact No. (1)</th>
                    <th>Branch</th>
                    
                      
                    </tr>
                    </thead>
                <tbody>
                <!-----------------------------Content------------------------------------>
                <?php
            

                $members_query = mysqli_query($conn,"SELECT * 
                FROM  members
                WHERE  DATE_ADD(STR_TO_DATE(dob, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(dob, '%Y-%m-%d')) YEAR) 
                            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)") or die(error());

                    if(mysqli_num_rows($members_query) > 0){
                        while($row = mysqli_fetch_array($members_query)){
                        $id = $row['id'];
                        $fname = $row['fname'];
                        $mname = $row['mname'];
                        $lname = $row['lname'];
                        $gender = $row['gender'];
                        $dob = $row['dob'];
                        $phone1 = $row['phone1'];
                        $branch = $row['branch'];
                            
                        ?>
                                                    
                        <tr>
                        <td><?php echo $fname.' '.$mname.' '.$lname;?> </td>
                            <td><?php echo $gender;?></td>
                            <td><?php echo date('d-m-Y', strtotime($dob));?></td> 
                            <td><?php echo $phone1;?></td>
                            <td><?php echo $branch;?></td>
                        
                            </tr>
                            
                                </tr>

                                <?php

                                    }
                                    }else{
                                    ?>
                                    <tr>
                                        <td>No upcoming birthday</td> 
                                    </tr>
                                    <?php

                                    }
                                            

                                    ?>  

                </tbody>
            </table>
                </div>

            </div>     
        

        </div>
    </div>
</section>

<?php include("includes/footer.php");?>