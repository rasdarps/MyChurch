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

//TO SEARCH AND SHOW NUMBER OF MEMBERS
$result_members=mysqli_query($conn,"SELECT id FROM members");
$row_members=mysqli_num_rows($result_members);


//print_r($retrieve);

//This id will show who is logged in and will allow the user to edit his profile or change password
    $id=$retrieve['id'];
    $fullname=$retrieve['fullname'];
	$username=$retrieve['username'];
	$image=$retrieve['img'];
    $user_role=$retrieve['user_role']

 ?>

<?php 
  
 //Get ID from Database to pull data of loggedin account to edit
 $id=$_GET['memberid'];

 //if id is picked where id=$staffid to select who is logged in
 if(isset($id))
 {
 $result=mysqli_query($conn,"SELECT * FROM members WHERE id='$id'");

 $retrieve=mysqli_fetch_array($result);

//Data is put in new update array after retrieving
$title=$retrieve['title'];
$fname=$retrieve['fname'];
$mname=$retrieve['mname'];
$lname=$retrieve['lname'];
$gender=$retrieve['gender'];
$dob=$retrieve['dob']; 
$phone1=$retrieve['phone1'];
$phone2=$retrieve['phone2'];
$email=$retrieve['email'];
$addres=$retrieve['addres'];
$maritalstatus=$retrieve['maritalstatus']; 
$spouse=$retrieve['spouse'];
$htown=$retrieve['htown'];
$occupation=$retrieve['occupation'];
$baptised=$retrieve['baptised'];
$branch=$retrieve['branch'];
$family=$retrieve['family'];
$fellowship1=$retrieve['fellowship1'];  
$fellowship2=$retrieve['fellowship2'];
$emergname=$retrieve['emergname'];
$emergcontact=$retrieve['emergcontact'];        
$image=$retrieve['img'];
 }

  ?>
  <title>Member Profile</title>
<?php include("includes/form-header.php");?>
<style>
body{
    font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
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
          <a href="sa-member-list.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px;"/></a>               
        </center>
      </div>
    
    <div class="jumbotron col-md-12">
    
    <form>
        <center>
            <h4 style="margin-bottom:30px; font-weight:bold;">MEMBER PROFILE</h4>
        </center>
        <center><img style="width: 14rem; border:1px solid #000; border-radius:5px; margin-bottom:20px;" src="member_images/<?php echo $image ?>" class="card-img-top" alt="passport"></center>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color:#fff;">
			<tbody>
                <tr><td><tag>Name: </tag></td><td><?php echo $fname .' '. $mname .' '. $lname ;?></td></tr>
				<tr><td><tag>Gender: </tag></td><td><?php echo $gender ;?></td></tr>
				<tr><td><tag>Date of Birth: </tag></td><td><?php echo date('dS F Y', strtotime($dob)) ;?></td></tr>
				<tr><td><tag>Contact (1): </tag></td><td><?php echo $phone1 ;?></td></tr>
				<tr><td><tag>Contact (2): </tag></td><td><?php echo $phone2 ;?></td></tr>
                <tr><td><tag>Email: </tag></td><td><?php echo $email ;?></td></tr>
				<tr><td><tag>Address: </tag></td><td><?php echo $addres ;?></td></tr>
                <tr><td><tag>Marital Status: </tag></td><td><?php echo $maritalstatus ;?></td></tr>
				<tr><td><tag>Spouse: </tag></td><td><?php echo $spouse ;?></td></tr>
				<tr><td><tag>Home Town: </tag></td><td><?php echo $htown ;?></td></tr>
				<tr><td><tag>Occupation: </tag></td><td><?php echo $occupation ;?></td></tr>
				<tr><td><tag> Baptised: </tag></td><td><?php echo $baptised ;?></td></tr>
                <tr><td><tag> Baptised: </tag></td><td><?php echo $branch ;?></td></tr>
				<tr><td><tag>Family: </tag></td><td><?php echo $family ;?></td></tr>
				<tr><td><tag>Fellowship1: </tag></td><td><?php echo $fellowship1 ;?></td></tr>
                <tr><td><tag>Fellowship2: </tag></td><td><?php echo $fellowship2 ;?></td></tr>
                <tr><td><tag>Emergency Contact Name: </tag></td><td><?php echo $emergname ;?></td></tr>
                <tr><td><tag>Emergency Contact No.: </tag></td><td><?php echo $emergcontact ;?></td></tr>					
			</tbody>
        </table>
    </form>

    </div>
</div>
 <!-- /.container -->
 <?php include("includes/formfooter.php");?>