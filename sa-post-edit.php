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
  $msg_success="";$msg_catt="";$msg_posttitle="";$msg_date="";$msg_post="";$msg_image="";
  $catt_up="";$posttitle_up="";$post_up="";
  
  $id=$_GET['id'];
  
  //if id is picked
  if(isset($id))
  {
  $result=mysqli_query($conn,"SELECT posttitle,category,post FROM post WHERE id='$id'");
  
  $retrieve=mysqli_fetch_array($result);
  
  //When values are retrieved from database as results it is put in the new variables below
  $posttitle_up = $retrieve["posttitle"];
  $catt_up = $retrieve["category"];
  $post_up = $retrieve["post"];
  
  }
  /*else{
      header("location:post-view.php");
      //die("Cannot Find id!");
  //echo '<script>window.location.href = "admin.php";</script>';
  
  
  }*/
  
  
  if(isset($_POST['submit'])){
   //mysqli_real_escape_string() Use to prevent sql Injection
   //Field variables
  $posttitle=mysqli_real_escape_string($conn, $_POST['posttitle_up']);
  $catt=mysqli_real_escape_string($conn, $_POST['catt_up']);
  $post=mysqli_real_escape_string($conn, $_POST['post_up']);
  
  //echo $_SESSION['username'];
  
  //echo $firstname. "<br>" .$lastname. "<br>" .$email. "<br>" .$date. "<br>" .$password. "<br>" .$c_password. "<br>" .$image;
  //Field Validation codes
  if(empty($posttitle)){
   $msg_posttitle="<div class='error'>Please Enter Post Title</div>";
  }
  
  /*else if(empty($catt)){
   $msg_catt="<div class='error'>Please choose a category</div>";
  }*/
  
  
  else if(empty($post)){
   $msg_post="<div class='error'>Please Enter Your Services</div>";
  }
  
  else{
  //PHP CODE TO INSERT DATA INTO DATABASE
  mysqli_query($conn,"UPDATE post SET posttitle='$posttitle',category='$catt',post='$post' WHERE id='$id'");
  $msg_success='<div class="success">Post Updated Succesfully</div>';
  $posttitle_up="";$catt_up="";$post_up="";
  
  echo '<script>
      alert("Data Updated Successfully!");
      window.location = "sa-post-view.php";
      </script>';
  }
  
  }
  ?>
  
  <title>Post Edit</title>
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
    background:#460322 !important;
    color:#fff !important;
}

#ctn-btn-reset{
    background-color: #fff;
    border-color: #460322;
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
         <a href="sa-post-view.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px;"/></a>                
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
                <input type="text" name="posttitle_up" class="form-control" id="inputPassword" value='<?php echo $posttitle_up;?>'>
                    <?php echo $msg_posttitle;?>
                </div>
            </div>

            <div class='form-group row'>
                    <label for="inputsname" class="col-sm-4 col-form-label">Choose Category *</label>
                <div class="col-sm-8">
                    <select class='form-control' name='catt_up' value='<?php echo $catt_up;?>'>
                        <option value='<?php echo $catt_up;?>'><?php echo $catt_up;?></option>
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
                            <textarea id='editor' class='form-control' name='post_up' cols="30" rows="5"><?php echo $post_up;?></textarea>
                                    
                                <?php echo $msg_post;?>
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