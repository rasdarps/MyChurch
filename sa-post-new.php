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


$msg_success="";$msg_catt="";$msg_posttitle="";$msg_date="";$msg_post="";$msg_image="";
$catt="";$posttitle="";$date="";$post="";$image="";

if(isset($_POST['submit'])){
 //mysqli_real_escape_string() Use to prevent sql Injection
 //Field variables
$posttitle=mysqli_real_escape_string($conn, $_POST['posttitle']);
$catt=mysqli_real_escape_string($conn, $_POST['catt']);
$date = date('Y/m/d');
$post=mysqli_real_escape_string($conn, $_POST['post']);
$image=$_FILES['image']['name'];
$tmp_image=$_FILES['image']['tmp_name'];
$size_image=$_FILES['image']['size'];
$username =$_SESSION['username'];
//echo $_SESSION['username'];

//echo $firstname. "<br>" .$lastname. "<br>" .$email. "<br>" .$date. "<br>" .$password. "<br>" .$c_password. "<br>" .$image;
//Field Validation codes
if(empty($posttitle)){
 $msg_posttitle="<div class='error'>Please Enter Post Title</div>";
}

else if(empty($catt)){
 $msg_catt="<div class='error'>Please choose a category</div>";
}

else if(EMPTY($date)){
  $msg_date="<div class='error'>Choose Date</div>";
}

else if(empty($post)){
 $msg_post="<div class='error'>Please Enter Your post content</div>";
}

else if($image==''){
  $msg_image="<div class='error'>Please a feature Images</div>";
}
else if($size_image>=2000000){
 $msg_image="<div class='error'>Please Upload Image less than or equal 2mb</div>";
}

else
{
  //IMAGE RESTRICTION
  $img_ext=explode(".", $image);
  $image_ext=$img_ext['1'];

  //Creating random image name to enable upload of same image
  $image=rand(1,1000).rand(1,1000).time().".".$image_ext;

  if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='JPG' || $image_ext=='PNG'){

//Code to move profile image to a profile image folder
  move_uploaded_file($tmp_image,"post_images/$image");


//PHP CODE TO INSERT DATA INTO DATABASE
mysqli_query($conn,"INSERT INTO post (posttitle,category,postdate,post,img,username)
VALUES('$posttitle','$catt','$date','$post','$image','$username')");
$msg_success='<div class="success">Post Succesfully</div>';
$catt="";$posttitle="";$date="";$post="";$image="";

echo '<script>
      alert("Data Inserted Successfully!");
      window.location = "sa-post-new.php";
      </script>';
      
      //header('Location:login.php');
      //echo '<script>window.location.href = "admin.php";</script>';
      }
      
       else{
        $msg_image="<div class='error'>Please Upload an Image File</div>";
      
       }
      }
 }

 ?>
<title>Post Announcement</title>
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
    background:#460322;
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
    color:#460322 !important;
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
         <a href="sa-dashboard.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px;"/></a>                
        </center>
    </div>
    
    <div class="jumbotron col-md-8 offset-md-2">
         <center>
            <h4 style="color:#fff; margin-bottom:20px; font-weight:bold; border-bottom:1px solid #fff; padding-bottom: 13px;">
           Announcement
            </h4>
        </center>
        <form method='post' enctype='multipart/form-data'>

            <div class='form-group row'>
                <label for="inputsname" class="col-sm-4 col-form-label">Title *</label>
                <div class="col-sm-8">
                <input type="text" name="posttitle" class="form-control" id="inputPassword" value='<?php echo $posttitle;?>'>
                    <?php echo $msg_posttitle;?>
                </div>
            </div>

            <div class='form-group row'>
                    <label for="inputsname" class="col-sm-4 col-form-label">Choose Category *</label>
                <div class="col-sm-8">
                    <select class='form-control' name='catt' value='<?php echo $catt;?>'>
                        <option value='<?php echo $catt;?>'><?php echo $catt;?></option>
                        <option value='General'>General</option>
                        <option value='Funeral'>Funeral</option>
                        <option value='Marriage'>Marriage</option>
                        <option value='Youth Fellowship'>Youth Fellowship</option>
                        <option value='Children Ministry'>Children Ministry</option>
                        <option value='Women Fellowship'>Women Fellowship</option>
                        
                    </select>
                            <?php echo $msg_catt;?>
                </div>
            </div>

                <div class='form-group row'>
                <label for="inputsname" class="col-sm-4 col-form-label">Content *</label>
                    <div class="col-sm-8">
                            <textarea id='editor' class='form-control' name='post' cols="30" rows="5"><?php echo $post;?></textarea>
                                    
                                <?php echo $msg_post;?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputsname" class="col-sm-4 col-form-label">Feature Image *</label>
                        <div class="col-sm-8">
                        <input type="file" name="image" value='<?php echo $image;?>'/>
                        <?php echo $msg_image;?>
                        </div>
            
                </div>

                <div class='form-group'>
                    <input type='hidden' name='postdate' placeholder='Enter Your date of birth' class='form-control' value='<?php echo $date;?>'>
                    <?php echo $msg_date;?>
                </div>

                <div class='form-group'>
                    <label for="title"></label>
                    <input type='hidden' name='username' class='form-control' readonly value='<?php echo $username;?>'>
                    
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