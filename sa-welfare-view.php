<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 //Calling logged function to prevent user from accessing profile page if logged out
if(!isset($_SESSION['username']) || $_SESSION['user_role']!='sa')
{
    echo '<script>
	alert("Log In To access page!");
	window.location = "login.php";
	</script>';
  //header("Location:staff-login.php");
  //echo '<script>window.location.href = "admin.php";</script>';
}

//when session starts the variable is fetched from the login page and stored in the $email variable on profile page
$username=$_SESSION['username'];
$user_role=$_SESSION['user_role'];

//Select statement to query details of logged in account from the database
$result=mysqli_query($conn,"SELECT id,fullname,username,user_role,img FROM users WHERE username='$username' AND user_role='$user_role'");

//Data is fetched from the database When username matches entered matches any of the emails in the database
$retrieve=mysqli_fetch_array($result);

//print_r($retrieve);

//This id will show who is logged in and will allow the user to edit his profile or change password
    $id=$retrieve['id'];
    $fullname=$retrieve['fullname'];
	$username=$retrieve['username'];
	$image=$retrieve['img'];
    $user_role=$retrieve['user_role']

 ?>

 <?php
 
   //Pulling Total dues of a member
$id=$_GET['duesid'];

$result = mysqli_query($conn, "SELECT members.id, SUM(amount) AS value_sum FROM welfare INNER JOIN members ON welfare.member_id=members.id WHERE members.id='$id' GROUP BY member_id"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];



 ?>

<?php 
  
 //Get ID from Database to pull data of loggedin account to edit
 $id=$_GET['duesid'];

 //if id is picked where id=$staffid to select who is logged in
 if(isset($id))
 {
 $result=mysqli_query($conn,"SELECT welfare.*,members.* FROM welfare INNER JOIN members ON welfare.member_id=members.id WHERE welfare.id='$id'");

 $retrieve=mysqli_fetch_array($result);

//Data is put in new update array after retrieving
$fname=$retrieve['fname'];
$mname=$retrieve['mname'];
$lname=$retrieve['lname'];
$phone1=$retrieve['phone1'];
$amount=$retrieve['amount'];
$paydate=$retrieve['paydate']; 
 }

  ?>
  <title>Member Profile</title>
<?php include("includes/form-header.php");?>
<style>
body{
        background: url(images/logobg.png) repeat fixed;
  
}

.jumbotron{
    color:#fff;
    font-weight:bold;
    margin-top:10px;
    padding-top:10px;
    background:#460322;
    /*background: url(images/bg.jpg) no-repeat;*/
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover; 
}



@media (max-width: 575px) {
  
}

@media (max-width: 767px) {
  
}

@media (max-width: 991px) {
 
}

@media (max-width: 1199px) {
  
}
</style> 

<div class="container">
    <div class="close-btn">
          <center>
         <a href="sa-welfare-list.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px;"/></a>                
        </center>
      </div>
    
    <div class="jumbotron col-md-12">
    
    <form>
        <center>
            <h4 style="margin-bottom:30px; font-weight:bold;">WELFARE VIEW</h4>
        </center>
        
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color:#fff;">
			<tbody>
                <tr><td><tag>Name: </tag></td><td><?php echo $fname .' '. $mname .' '. $lname ;?></td></tr>
				<tr><td><tag>Contact: </tag></td><td><?php echo $phone1 ;?></td></tr>
				<tr><td><tag>Payment Date: </tag></td><td><?php echo date('dS F Y', strtotime($paydate)) ;?></td></tr>
				<tr><td><tag> Amount: </tag></td><td>Gh¢<?php echo $amount ;?>.00</td></tr>
                <tr><td><tag> Total Payment: </tag></td><td><?php echo $sum ;?></td></tr>
							
			</tbody>
        </table>
    </form>

    </div>
</div>
 <!-- /.container -->
 <?php include("includes/formfooter.php");?>