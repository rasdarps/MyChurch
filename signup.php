 <?php
 
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 //When logged in prevent loading login page again

$msg_username="";$msg_fullname="";$msg_email="";$msg_date="";$msg_password="";$msg_cpassword="";$msg_image="";$msg_success="";
$username="";$fullname="";$email="";$date="";$password="";$c_password="";$image="";

if(isset($_POST['submit'])){
  //mysql_real_escape_string() Use to prevent sql Injection
  //Field variables
$username=mysqli_real_escape_string($conn, $_POST['username']);
$fullname=mysqli_real_escape_string($conn, $_POST['fullname']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$date=mysqli_real_escape_string($conn, $_POST['dob']);
$password=mysqli_real_escape_string($conn, $_POST['pass']);
$c_password=mysqli_real_escape_string($conn, $_POST['cpass']);
$image=$_FILES['image']['name'];
$tmp_image=$_FILES['image']['tmp_name'];
$size_image=$_FILES['image']['size'];

//echo $firstname. "<br>" .$lastname. "<br>" .$email. "<br>" .$date. "<br>" .$password. "<br>" .$c_password. "<br>" .$image;
//Field Validation codes
if(EMPTY($username)){
  $msg_username="<div class='error'>Enter a username</div>";
}

//Function to check email duplication
else if(username_exists($username,$conn))
{
  $msg_username="<div class='error'>Username Exists</div>";
}

else if(EMPTY($fullname)){
  $msg_fullname="<div class='error'>Enter your name</div>";
}

else if(!FILTER_VAR($email, FILTER_VALIDATE_EMAIL))
{
  $msg_email="<div class='error'>Enter a valid email address</div>";
}

//Function to check email duplication
else if(email_exists($email,$conn))
{
  $msg_email="<div class='error'>Email Exists</div>";
}

else if(EMPTY($date)){
  $msg_date="<div class='error'>Choose Your Date of Birth</div>";
}

else if(EMPTY($password)){
  $msg_password="<div class='error'>Please Enter Password</div>";
}

else if(strlen($password)<5){
  $msg_password="<div class='error'>Password Lenght should not be less than 5 characters</div>";
}

else if($password!==$c_password){
  $msg_cpassword="<div class='error'>Confirmation password mismatch</div>";
}

else if($image==''){
  $msg_image="<div class='error'>Please Upload A Profile Image</div>";
}
else if($size_image>=1000000){
 $msg_image="<div class='error'>Please Upload Image less than or equal 1mb</div>";
}
else
{
  //Password Encryption
  $password=md5($password);

  //IMAGE RESTRICTION
  $img_ext=explode(".", $image);
  $image_ext=$img_ext['1'];
  //Creating random image name to enable upload of same image
  $image=rand(1,1000).rand(1,1000).time().".".$image_ext;
  if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='JPG' || $image_ext=='PNG'){

//Code to move profile image to a profile image folder
  move_uploaded_file($tmp_image,"profile_images/$image");

//PHP CODE TO INSERT DATA INTO DATABASE
   mysqli_query($conn,"INSERT INTO users (username,fullname,email,dob,pass,img)
VALUES('$username','$fullname','$email','$date','$password','$image')");
$msg_success='<div class="success">Registration Succesfully You Can Login Now</div>';
$username="";$fullname="";$email="";$date="";$password="";$c_password="";$image="";

echo '<script>
	alert("Registration Successful Login!");
	window.location = "login.php";
	</script>';
}

 else{
  $msg_image="<div class='error'>Please Upload an Image File</div>";

 }
}
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>SIGN UP</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=".../favicon.ico">
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css"> 
	<script defer src="fontawesome/js/all.js"></script>
	<link href="/fontawesome/css/all.css" rel="stylesheet">
	<link href="css/waypoints.css" rel="stylesheet" type="text/css">
	

<style>
body{
        background: url(images/logobg.png) repeat fixed;
  
}

.close-btn{
  padding-top:20px;
  margin-bottom:-30px;
}

.jumbotron{
  color:#fff;
  margin-top:20px; 
  padding-bottom:20px; 
  padding-top:20px; 
  background:#460322; 
  
  
}

.jumbotron:hover{
  box-shadow: 1px 2px 8px rgba(0, 0, 0, .5);
}

#submit-btn{
 border-color:#fff;
 color:#fff;
}

#submit-btn:hover{
  background:#fff;
  color:#460322;
  border-color:#fff;
}

#reset-btn{
  background:#fff !important;
  color:#460322;
  border-color:#00324E;
}

.error{
  color:red;
}

.success{
  color:green;
  font-weight:bold;
  font-size:20px;
}

 /*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
 
  

}

@media (max-width: 576px) {
 
}

</style>
</head>

  <div class='container' style="margin-top:15px;">
    <div class='login-form col-md-6 mx-auto'>
    <div class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">
   
       <div class="close-btn">
          <center>
            <a href="login.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px; margin-bottom:10px;"/></a>                
      </center>
         </div>

      <div class='jumbotron'>
        <h3 align='center' style="font-size:bold;">ACCOUNT REGISTRATION</h3> <hr class='hr-signup'>
        <center><?php echo $msg_success;?></center>

        <form method='post' enctype='multipart/form-data' action=''>
          <div class='form-group'>
            <label>Username</label>
            <input type='text' name='username' placeholder='' class='form-control' value='<?php echo $username;?>'>
            <?php echo $msg_username;?>
        </div>
          <div class='form-group'>
              <label>Full Name</label>
              <input type='text' name='fullname' placeholder='' class='form-control' value='<?php echo $fullname;?>'>
              <?php echo $msg_fullname;?>
          </div>

        <div class='form-group'>
            <label>Email</label>
            <input type='email' name='email' placeholder='' class='form-control' value='<?php echo $email;?>'>
            <?php echo $msg_email;?>
        </div>

        <div class='form-group'>
          <label>Date of Birth</label>
          <input type='date' name='dob' placeholder='' class='form-control' value='<?php echo $date;?>'>
          <?php echo $msg_date;?>
      </div>

        <div class='form-group'>
          <label>Password</label>
          <input type='password' name='pass' placeholder='' class='form-control' value='<?php echo $password;?>'>
          <?php echo $msg_password;?>
      </div>

      <div class='form-group'>
          <label>Confirm Password</label>
          <input type='password' name='cpass' placeholder='' class='form-control' value='<?php echo $c_password;?>'>
          <?php echo $msg_cpassword;?>
      </div>

      <div class='form-group'>
        <label>Profile Image</label><br>
        <input type='file' name='image' value='<?php echo $image;?>'/>
        <?php echo $msg_image;?>
    </div>

    <div class='form-group'>
        <label for="title"></label>
        <input type='hidden' name='user_role' class='form-control' value='subscriber'>
        
    </div>

      <center><input id="submit-btn" type='submit' name='submit' value='Submit' class='btn btn-outline-success'/>
      <input id="reset-btn" type='reset' name='submit' value='Reset' class='btn btn-success'/></center> <br>
    <center><span style="color:#fff;">Have Account?</span> <a href='login.php'>Login</a></center>
        </form>
    </div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="js/general.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="js/waypoints.js" type="text/javascript"></script>
</body>
</html>