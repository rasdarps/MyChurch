<?php
 include("includes/db_config.php");
 include("includes/function.php");
$msg_email="";$msg_date="";$msg_password="";$msg_cpassword="";$msg_success="";
$email="";$date="";$password="";$cpassword="";

if(isset($_POST['submit']))
{
$email=$_POST['email'];
$date=$_POST['dob'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];

if(empty($email))
{
  $msg_email="<div class='error'>Please Enter Your Email</div>";
}

else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$msg_email="<div class='error'>Please Enter a valid Email</div>";
}

else if(empty($date))
{
  $msg_date="<div class='error'>Please Enter Your Date of birth</div>";
}

else if(empty($password))
{
  $msg_password="<div class='error'>Please Enter Password</div>";
}

else if(strlen($password)<5){
  $msg_password="<div class='error'>Password Lenght should be 5 characters or more</div>";
}

else if(empty($cpassword))
{
  $msg_cpassword="<div class='error'>Please Enter Confirmation Password</div>";
}

else if($password!==$cpassword){
  $msg_cpassword="<div class='error'>Confirmation password mismatch</div>";
}

else if(email_exists($email,$conn))
{
  $result=mysqli_query($conn,"SELECT dob FROM users WHERE email='$email'");
  $retrieve=mysqli_fetch_array($result);
  $DOB=$retrieve['dob'];
  if($date==$DOB)
  {
    $pass=md5($password);

    //update code to update data in database
    mysqli_query($conn,"UPDATE users SET pass='$pass' WHERE email='$email'");
    $msg_success="<div class='success'>Password Changed Succesfuly</div>";
    $email="";$date="";$password="";$cpassword="";
    
    echo '<script>
    alert("Password changed Successfully!");
    window.location = "login.php";
    </script>';
   
  }
  else {
    $msg_date="<div class='error'>Wrong Date of birth</div>";
  }

}
else{
    $msg_email="<div class='error'>Email Does not Exist</div>";
}



}

?>

<?php include("includes/form-header.php");?>
<title>Forgotten Password</title>
<style>
body{
        background: url(images/logobg.png) repeat fixed;
  
}

#ctn-btn-reset{
    background-color: #F4B402;
    border-color: #F4B402;
}

.error{
  color:red;
}

.success{
  color:#fff;
  font-weight:bold;
  font-size:20px;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color:#fff;
  opacity: 1; /* Firefox */
}

</style>

	<div class='container'>
	<div class='login-form col-md-4 offset-md-4'>
  <div class='jumbotron' style='margin-top:20px; padding-top:20px; padding-bottom:30px; background-color: #fff; color:#F4B402; box-shadow: 3px 3px 4px rgba(0, 0, 0, .5);'>
  <h3 align='center'>Forgotten Password</h3>
  <center><?php echo $msg_success;?></center>
	   <form method='post'>
       <div class='form-group'>
         <label>Email</label>
         <input type='email' name='email' class='form-control' placeholder='enter your email' value='<?php echo $email ?>' />
         <?php echo $msg_email; ?>
       </div>

       <div class='form-group'>
         <label>Date of Birth</label>
         <input type='date'  name='dob' class='form-control'  value='<?php echo $date ?>'/>
         <?php echo $msg_date; ?>
       </div>

       <div class='form-group'>
         <label>New Password</label>
         <input type='password'  name='pass' class='form-control' placeholder='enter new password'  value='<?php echo $password ?>'/>
          <?php echo $msg_password; ?>
       </div>

       <div class='form-group'>
         <label>Re-enter Password</label>
         <input type='password'  name='cpass' class='form-control' placeholder='re-enter new password'  value='<?php echo $cpassword ?>'/>
        <?php echo $msg_cpassword; ?>
       </div>
        <center><button id="ctn-btn-reset" name='submit' class='btn btn-success'>Submit</button></center>
	</form>
	</div>
</div>
	</div>

    
  <?php
include("includes/formfooter.php");
?>
