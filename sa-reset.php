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
$result=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND user_role='$user_role'");

//Data is fetched from the database When username matches entered matches any of the emails in the database
$retrieve=mysqli_fetch_array($result);

//This id will show who is logged in and will allow the user to edit his profile or change password
    $id=$retrieve['id'];
    $username=$retrieve['username'];
	  $image=$retrieve['img'];

//pulling id from database
//$id=$_GET['said'];

//code to direct user to login page if not logged in and try to access change password page
if(isset($id))
{
$msg_password="";$msg_cpassword="";$msg_success="";

if(isset($_POST['submit']))
{
  $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];
    if(empty($password))
    {
      $msg_password="<div class='error'>Please Enter New Password</div>";
    }

    else if(strlen($password)<5){
      $msg_password="<div class='error'>Password Lenght should be 5 characters or more</div>";
    }

    else if(empty($cpassword))
    {
      $msg_password="<div class='error'>Please Enter New Confirmation password</div>";
    }

    else if($cpassword!==$cpassword)
    {
    $msg_cpassword="<div class='error'>Confirmation password mismatch</div>";
    }

  else{

      $pass=md5($password);

    mysqli_query($conn,"UPDATE users SET pass='$pass' where id='$id'");
    $msg_success="<div class='success'>Password Changed Succesfuly</div>";

    echo '<script>
    alert("Password changed Successfully!");
    window.location = "sa-dashboard.php";
    </script>';
   }

}


?>

<?php include("includes/form-header.php");?> 
<title>Change Password</title>
<style>
body{
  background: url(images/logobg.png) repeat fixed;
  
}

#ctn-btn{
    background-color: #00324E;
    border-color: #00324E;
}


.error{
  color:red;
}

.success{
  color:#93c757;
  font-weight:bold;
  font-size:20px;
}

</style>

<div class='container'>
<div class="close-btn">
          <center>
         <a href="sa-member-list.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px; margin-top:20px; margin-bottom:-20px;"/></a>                
        </center>
      </div>

  <div class='login-form col-md-4 offset-md-4'>
  <div class='jumbotron' style=' border:1px solid grey; margin-top:70px; padding-top:20px; padding-bottom:30px; background-color: #fff; color:#00324E; box-shadow: 3px 3px 3px grey;'>
  <center><h3 align='center'>Change Password</h3></center>
  <center><?php echo $msg_success;?></center>
  <form method='post'>
    <div class='form-group'>
      <label>New Password</label>
      <input type='password' name='pass' placeholder='enter new password' class='form-control'>
        <?php echo $msg_password; ?>
    </div>

    <div class='form-group'>
      <label>Re-enter New Password</label>
      <input type='password' name='cpass' placeholder='re-enter new password' class='form-control'>
        <?php echo $msg_cpassword; ?>
    </div>

      <center><button id="ctn-btn" name='submit' class='btn btn-success'>Submit</button></center>
      <br>
        <center><a href='sa-dashboard.php' style='color:#fff;'>Back To Profile Page</a></center>

  </form>
</div>
</div>
</div>


<?php include("includes/formfooter.php");?>
<?php
}
else {
  //header("location:login.php");
}
