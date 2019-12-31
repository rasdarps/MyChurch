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



 ?>

<title>MESSAGES</title>
<style>
h6 {
    color:#460322 !important;
}

span{
    color:#000;  
}
</style>
<?php include("includes/sa-header.php");?>

<?php 
 //Get ID from Database to pull data of Selected member account to view
 $id=$_GET['msgid'];

 //if id is picked
 if(isset($id))
 {
 $result=mysqli_query($conn,"SELECT * FROM messages WHERE id='$id'");

 $retrieve=mysqli_fetch_array($result);

//Fetching data of selected member to view
    $id=$retrieve['id'];
    $msg_date = $retrieve['msg_date'];
    $msg_time = $retrieve['msg_time'];
    $name = $retrieve['fullname'];
    $contact = $retrieve['contact'];
    $email = $retrieve['email'];
    $content = $retrieve['content'];
    
 }

 if($id < 1){
    $id = 1;

}
 //print_r($retrieve); 

 

  ?>
    <div class="container-fluid" style="margin-top:20px; margin-bottom:200px; background:#f0f9db;">     
        <div class="jumbotron col-md-8 offset-md-2" style="padding-top:20px; background:#f0f9db;">
            <div class="card">
                    <div class="card-header" style=" color:#fff; background:#460322 !important">
                      Message
                    </div>
                <div class="card-body">

                    <div class="row col-md-6" style="margin-bottom:20px">
                     <h6>From: <span style="font-size:small;"><?php echo $name;?> <span style="color:blue;">(<?php echo $email;?>)</span></span></h6>
                    </div>


                    <div class="row col-md-6" style="margin-bottom:20px">
                     <h6>Date: <span style="font-size:small;"><?php echo $msg_date;?> at <span style="color:blue;"><?php echo $msg_time;?></span.</span></h6>
                    </div>


                    <div class="row col-md-6" style="margin-bottom:20px">
                     <h6>Contact: <span style="font-size:small;"><?php echo $contact;?></span></h6>
                    </div>

                    <div class="row col-md-6" style="margin-bottom:20px">
                     <h6 class="card-text">Message Body</h6>  
                    </div>

                    <div class="row col-md-12" style="text-align:justify;">
                      <p><?php echo $content;?></p>
                      </div>
                </div>
            </div>                                
        </div>
    </div>
       
    

<?php include("includes/footer.php");?>