<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 //Calling logged function to prevent user from accessing profile page if logged out
 if(!isset($_SESSION['username']) || $_SESSION['user_role']!='sa')
 {
     echo '<script>
     alert("You are not Authorized to Access Page!");
     window.location = "login.php";
     </script>';
   //header("Location:login.php");
   //echo '<script>window.location.href = "login.php";</script>';
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


$msg_success="";$msg_posttitle="";$msg_post="";$msg_catt="";
$title="";$hymn="";$catt="";

if(isset($_POST['submit'])){
 //mysqli_real_escape_string() Use to prevent sql Injection
 //Field variables
$title=mysqli_real_escape_string($conn, $_POST['title']);
$hymn=mysqli_real_escape_string($conn, $_POST['hymn']);
$catt=mysqli_real_escape_string($conn, $_POST['catt']);

//echo $_SESSION['username'];

//echo $firstname. "<br>" .$lastname. "<br>" .$email. "<br>" .$date. "<br>" .$password. "<br>" .$c_password. "<br>" .$image;
//Field Validation codes
if(empty($title)){
 $msg_posttitle="<div class='error'>Please Enter hymn Title</div>";
}

else if(empty($hymn)){
 $msg_post="<div class='error'>Please create hymn</div>";
}

else if(empty($catt)){
    $msg_catt="<div class='error'>Please choose a category</div>";
   }

else
{
 

//PHP CODE TO INSERT DATA INTO DATABASE
mysqli_query($conn,"INSERT INTO hymns (title,hymn,category)
VALUES('$title','$hymn','$catt')");
$msg_success='<div class="success">Hymn Succesfully</div>';
$title="";$hymn="";$catt="";

echo '<script>
      alert("Data Inserted Successfully!");
      window.location = "sa-hymn-new.php";
      </script>';
      
      //header('Location:login.php');
      //echo '<script>window.location.href = "admin.php";</script>';
      }
      
 }

 ?>
<title>POST HYMN</title>
<?php include("includes/form-header.php");?> 
<style>
    body{
        background: url(images/logobg.png) repeat fixed;
  
}
    
#editor{
    color:#000 !important;
}

.jumbotron{
    color:#000;
    margin-top:10px;
    padding-top:10px;
    background:#00324E;
    font-size:15px;
}

label{
    color:fff;
}


#ctn-btn{
    border-color: #fff !important;
    color:#fff !important;
}

#ctn-btn:hover{
    background:#fff !important;
    color:#00324E !important;
}

#ctn-btn-reset{
    background-color: #00324E;
    border-color: #fff;
}

.close-btn{
  padding-top:20px;
  margin-bottom:-10px;
}


@media (max-width: 575px) {
    .jumbotron{
    font-size:12px;
}


  
}

@media (max-width: 767px) {
    .jumbotron{
    font-size:12px;
}
 

}

@media (max-width: 991px) {
 
}

@media (max-width: 1199px) {
  
}
</style> 

<div class="container">
    <div class="close-btn">
          <center>
         <a href="sa-dashboard.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#00324E; border-radius:50px;"/></a>                
        </center>
    </div>
    
    <div class="jumbotron col-md-8 offset-md-2">
         <center>
            <h4 style="color:#fff; margin-bottom:20px; font-weight:bold; border-bottom:1px solid #fff; padding-bottom: 13px;">
           HYMNALS
            </h4>
        </center>
        <form method='post' enctype='multipart/form-data'>

            <div class='form-group row'>
                <label for="inputsname" class="col-sm-4 col-form-label">Title *</label>
                <div class="col-sm-8">
                <input type="text" name="title" class="form-control" id="inputPassword" value='<?php echo $title;?>'>
                    <?php echo $msg_posttitle;?>
                </div>
            </div>

            <div class='form-group row'>
                <label for="inputsname" class="col-sm-4 col-form-label">Hymn *</label>
                    <div class="col-sm-8">
                            <textarea id='editor' class='form-control' name='hymn' cols="30" rows="5"><?php echo $hymn;?></textarea>
                                    
                                <?php echo $msg_post;?>
                    </div>
            </div>

            <div class='form-group row'>
                    <label for="inputsname" class="col-sm-4 col-form-label">Choose Category *</label>
                <div class="col-sm-8">
                    <select class='form-control' name='catt' value='<?php echo $catt;?>'>
                        <option value='<?php echo $catt;?>'><?php echo $catt;?></option>
                        <option value='english'>english</option>
                        <option value='twi'>twi</option>
                      
                        
                    </select>
                            <?php echo $msg_catt;?>
                </div>
            </div>

            <div class="form-group">
                <center> 
                <button id="ctn-btn" class="btn btn-outline-success" name="submit"  value='submit'>Submit</button>
                   
                </center>               
             </div> 
          <center><p style="color:#fff;">All fields with asterics (*) is required</p></center>


        </form>
    </div>
</div>
        <!-- /.container -->
<?php include("includes/formfooter.php");?>