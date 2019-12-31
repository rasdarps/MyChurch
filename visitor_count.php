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
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>

                    <div class="progress side-menu" style="margin-top:30px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">65%</div>
                    </div>
               

            </div>

           <div class="col-md-9 col-xs-12 col-sm-12">
                <div class="card ">
                    <h5 class="card-header main-color">Overview</h5>
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
                    <h5 class="card-header main-color">TIME</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 col-sm-4">
                            <iframe src="http://free.timeanddate.com/clock/i6wdk2w4/szw110/szh110/hoc000/hbw2/hfceee/cf100/hncccc/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98" frameborder="0" width="110" height="110"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>     
        
        </div>
    </div>
</section>

<?php include("includes/footer.php");?>