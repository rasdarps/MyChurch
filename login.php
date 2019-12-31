<?php
include("includes/db_config.php");
include("includes/function.php");
//function to start a session
session_start();

//When logged in prevent loading login page again
if(isset($_SESSION['username'])){
    echo '<script>
		alert("You are Logged in Already Select dashboard from Menu!");
		window.location = "home.php";
		</script>';
  //header("Location:home.php");
  //echo '<script>window.location.href = "home.php";</script>';
}

$msg_name="";
$username="";


if(isset($_POST['submit'])){

  //mysql_real_escape_string() Use to prevent sql Injection
  //Field variables
$username=mysqli_real_escape_string($conn, $_POST['username']);
$password=mysqli_real_escape_string($conn, $_POST['pass']);
//encrypting password
$password=md5($password);
$user_role=$_POST['user_role'];

//Select statement to select username, password and user role from database
$sql="SELECT * FROM users WHERE username=? AND pass=? AND user_role=?";

$stmt=$conn->prepare($sql);
$stmt->bind_param("sss",$username,$password,$user_role);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();

//Session Variable to store and send session data of logged in user from one page to another
session_regenerate_id();
$_SESSION['username'] = $row['username'];
$_SESSION['user_role'] = $row['user_role'];
session_write_close(); 

if($result->num_rows==1 && $_SESSION['user_role']=="member"){
  header("Location:member-dashboard.php");
  //echo '<script>window.location.href = "staff-dashboard.php";</script>';
}
else if($result->num_rows==1 && $_SESSION['user_role']=="secretary"){
    header("Location:secretary-dashboard.php");
    //echo '<script>window.location.href = "staff-dashboard.php";</script>';
}
else if($result->num_rows==1 && $_SESSION['user_role']=="sa"){
      header("Location:sa-dashboard.php");
      //echo '<script>window.location.href = "admin-dashboard.php";</script>';
}


$msg_name = "Username or password is incorrect or unauthourized!";
}



?>

<!DOCTYPE html>
<html>
<head>
<title>LOGIN</title>
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
  margin-bottom:-40px;
}

.card{
  background-color:#460322 !important; 
  border-radius:10px !important; 
  color:#fff !important;
}

.card:hover{
  box-shadow: 1px 2px 8px rgba(0, 0, 0, .5);
}

.form-check{
  text-align:center!important;
}

#ctn-btn{
  border-color:#fff!important;
  color:#fff;
}
#ctn-btn:hover{
  background:#fff;
  color:#460322;
}

/*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
 
  

}

@media (max-width: 576px) {
 
}
</style>
</head>


<div class='container' style="margin-bottom:50px;">

  <div class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.2s">
    <div class="close-btn">
      <center>
      <a href="home.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px; margin-bottom:45px;"/></a>                
      </center>
    </div>

    <div class="card mx-auto" style="width: 20rem;">
       
      <div class="card-body">
        <h5 class="card-title"></h5>
        <form method='post' action="<?php $_SERVER['PHP_SELF']?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" value='<?php echo $username;?>'>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>

          <div class="form-group form-check">
            <label for="title">Please Select A Role Before Login</label><br>
             <input type="radio" name="user_role" value='member'/><span> Member</span>
              <input type="radio" name="user_role" value='secretary'/><span> Secretary</span>
              <input type="radio" name="user_role" value='sa' checked="true" style="display:none;"/><span style="display:none;"> Admin</span>
          </div>

            <center><button type="submit" name="submit" id="ctn-btn" class="btn btn-outline-success">Login</button></center>
            <center><h5 style="color:red;"><?php echo $msg_name;?></h5></center>
        </form>
      </div>
    </div>
      <br>
      <center><span>Have Account?<span><a href='signup.php' style='color:#460322; font-weight:bold;'> Sign Up </a><br><span><span>Forgoten Password?</span> <a href='forgot.php' style='color:#460322; font-weight:bold;'>Reset Password</a></span></center>
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
