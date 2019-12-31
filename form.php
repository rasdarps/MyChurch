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


 $msg_success="";$msg_title="";$msg_fname="";$msg_mname="";$msg_lname="";$msg_gender="";$msg_dob="";$msg_phone1="";$msg_phone2="";$msg_email="";$msg_addres="";
 $msg_maritalstatus="";$msg_spouse="";$msg_htown="";$msg_occupation="";$msg_baptised="";$msg_branch="";$msg_family="";$msg_fellowship1="";$msg_fellowship2="";$msg_emergename="";
 $msg_emergcontact="";$msg_image="";

 $title="";$fname="";$mname="";$lname="";$gender="";$dob="";$phone1="";$phone2="";$email="";$addres="";$maritalstatus="";$spouse="";
$htown="";$occupation="";$baptised="";$branch="";$family="";$fellowship1="";$fellowship2="";$emergname="";$emergcontact="";$image="";

 if(isset($_POST['submit'])){
    $title=mysqli_real_escape_string($conn, $_POST['title']);
    $fname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['fname']);
    $mname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['mname']);
    $lname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['lname']);
    $gender=mysqli_real_escape_string($conn, $_POST['gender']);
    $dob =mysqli_real_escape_string($conn, $_POST['dob']); 
    $phone1=preg_replace('#[^0-9+-]#', '', $_POST['phone1']);
    $phone2=preg_replace('#[^0-9+-]#', '', $_POST['phone2']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $addres=mysqli_real_escape_string($conn, $_POST['addres']);
    $htown=mysqli_real_escape_string($conn, $_POST['htown']);
    $maritalstatus=mysqli_real_escape_string($conn, $_POST['maritalstatus']);
    $spouse=mysqli_real_escape_string($conn, $_POST['spouse']);
    $occupation=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['occupation']); 
    $baptised=mysqli_real_escape_string($conn, $_POST['baptised']);
    $branch=mysqli_real_escape_string($conn, $_POST['branch']);
    $family=mysqli_real_escape_string($conn, $_POST['family']);
    $fellowship1=mysqli_real_escape_string($conn, $_POST['fellowship1']);
    $fellowship2=mysqli_real_escape_string($conn, $_POST['fellowship2']);
    $emergname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['emergname']);
    $emergcontact=preg_replace('#[^0-9+-]#', '', $_POST['emergcontact']);  
    $image=$_FILES['img']['name'];
    $tmp_image=$_FILES['img']['tmp_name'];
    $size_image=$_FILES['img']['size'];
    

    if(EMPTY($fname)){
        $msg_fname="<div class='error'>Enter First Name or format must be text</div>";
      }

      else if(EMPTY($lname)){
        $msg_lname="<div class='error'>Enter Last Name or format must be text</div>";
      }

      else if(EMPTY($gender)){
        $msg_gender="<div class='error'>Choose gender</div>";
      }
      
      else if(EMPTY($dob)){
        $msg_dob="<div class='error'>Select Date of Birth</div>";
      }

      else if(EMPTY($phone1)){
        $msg_phone1="<div class='error'>Enter Phone Number</div>";
      }
      
       //Function to check email duplication
       else if(phone_exists($phone1,$conn))
       {
         $msg_phone1="<div class='error'>Phone number Exists</div>";
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

      else if(EMPTY($addres)){
        $msg_addres="<div class='error'>Enter Address</div>";
      }

      else if(EMPTY($htown)){
        $msg_htown="<div class='error'>Enter Hometown</div>";
      }

      else if(EMPTY($occupation)){
        $msg_occupation="<div class='error'>Enter Occupation</div>";
      } 
      
      else if(EMPTY($baptised)){
        $msg_baptised="<div class='error'>Choose yes or no</div>";
      }  

      else if(EMPTY($branch)){
        $msg_branch="<div class='error'>Choose brancho</div>";
      }  

      else if(EMPTY($family)){
        $msg_family="<div class='error'>Choose Family</div>";
      }  

      else if(EMPTY($emergname)){
        $msg_emergename="<div class='error'>Enter emergency person's name</div>";
      } 
      
      else if(EMPTY($emergcontact)){
        $msg_emergcontact="<div class='error'>Enter emergency person's contact</div>";
      }  

      
     else if($image==''){
       $msg_image="<div class='error'>Please Upload A Profile Image</div>";
    }

      else if($size_image>=1000000){
       $msg_image="<div class='error'>Please Upload Image less than or equal 1mb</div>";
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
        move_uploaded_file($tmp_image,"member_images/$image");
      
      //PHP CODE TO INSERT DATA INTO DATABASE
     //PHP CODE TO INSERT DATA INTO DATABASE
     mysqli_query($conn,"INSERT INTO members (title,fname,mname,lname,gender,dob,phone1,phone2,email,addres,maritalstatus,spouse,
     htown,occupation,baptised,branch,family,fellowship1,fellowship2,emergname,emergcontact,img)
     VALUES('$title','$fname','$mname','$lname','$gender','$dob','$phone1','$phone2','$email','$addres','$maritalstatus','$spouse',
            '$htown','$occupation','$baptised','$branch','$family','$fellowship1','$fellowship2','$emergname','$emergcontact','$image')") or die('error');
   
      $msg_success='<div class="success">Form Submission Succesfully!!</div>';
      $title="";$fname="";$mname="";$lname="";$gender="";$dob="";$phone1="";$phone2="";$email="";$addres="";$maritalstatus="";$spouse="";
$htown="";$occupation="";$baptised="";$branch="";$family="";$fellowship1="";$fellowship2="";$emergname="";$emergcontact="";$image="";
      
      echo '<script>
      alert("Data Inserted Successfully!");
      window.location = "form.php";
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
<title>Forms</title>
<?php include("includes/form-header.php");?> 
<style>
   body{
        background: url(images/logobg.png) repeat fixed;
  
}
    


.jumbotron{
    color:#fff;
    margin-top:10px;
    padding-top:10px;
    background:#460322;
    font-size:15px;
}

label{
    text-align:right;
}

#ctn-btn{
    border-color: #fff !important;
    color:#460322 !important;
    background:#fff;
}

#ctn-btn:hover{
    background:#460322 !important;
    color:#fff !important;
}

#ctn-btn-reset{
    background-color: #460322;
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

label{
    text-align:left;
}
  
}

@media (max-width: 767px) {
    body{
        background: url(images/logobg.png) repeat fixed;
  
}
    .jumbotron{
    font-size:12px;
}
 
label{
    text-align:left;
}
}

@media (max-width: 991px) {
    body{
        background: url(images/logobg.png) repeat fixed;
  
}
    .jumbotron{
    font-size:12px;

    label{
    text-align:left;
}
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
    
    <div class="jumbotron col-md-10 mx-auto">
    <form method='post' enctype='multipart/form-data' action=''>
        <center>
            <h4 style="margin-bottom:20px; font-weight:bold;">MEMBER FORM</h4>
        </center>

        <div class="form-group row">
            <label for="inputTitle" class="col-sm-4 col-form-label">Title</label>
            <div class="col-sm-8">
                <select class='form-control' name='title' value='<?php echo $title;?>'>
                    <option value='<?php echo $title;?>'><?php echo $title;?></option>
                    <option value='Mr'>Mr</option>
                    <option value='Mrs'>Mrs</option>
                    <option value='Miss'>Miss</option>
                    <option value='Rev'>Rev</option>
                    <option value='Deacon'>Deacon</option>
                    <option value='Deaconess'>Deaconess</option>
                    <option value='Dr'>Dr</option>
                    <option value='Prof'>Prof</option>
                    <option value='Prophet'>Prophet</option>
                    <option value='Evang'>Evang</option>

                </select>
            </div>
        </div>
        <hr>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">First Name *</label>
            <div class="col-sm-8">
            <input type="text" name="fname" class="form-control" id="inputPassword" placeholder="" value='<?php echo $fname;?>'>
            <?php echo $msg_fname;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Middle Name</label>
            <div class="col-sm-8">
            <input type="text" name="mname" class="form-control" id="inputPassword" placeholder="" value='<?php echo $mname;?>'>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Last name *</label>
            <div class="col-sm-8">
            <input type="text" name="lname" class="form-control" id="inputPassword" placeholder="" value='<?php echo $lname;?>'>
            <?php echo $msg_lname;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Gender *</label>
            <div class="col-sm-8">
            <select class='form-control' name='gender' value='<?php echo $gender;?>'>
                    <option value='<?php echo $gender;?>'><?php echo $gender;?></option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                </select>
                <?php echo $msg_gender;?>
            </div>
           
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Date of Birth *</label>
            <div class="col-sm-8">
            <input type="date" name="dob" class="form-control" id="inputPassword" placeholder="" value='<?php echo $dob;?>'>
            <?php echo $msg_dob;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Contact No. (1) *</label>
            <div class="col-sm-8">
            <input type="text" name="phone1" class="form-control" id="inputPassword" placeholder="" value='<?php echo $phone1;?>'>
            <?php echo $msg_phone1;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Contact No. (2)</label>
            <div class="col-sm-8">
            <input type="text" name="phone2" class="form-control" id="inputPassword" placeholder="" value='<?php echo $phone2;?>'>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
            <input type="email" name="email" class="form-control" id="inputPassword" placeholder="" value='<?php echo $email;?>'>
            <?php echo $msg_email;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Address *</label>
            <div class="col-sm-8">
            <textarea name='addres' cols="30" rows="3" class='form-control' placeholder='Enter Address'><?php echo $addres;?></textarea>
            <?php echo $msg_addres;?>
            </div>
           
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Home Town *</label>
            <div class="col-sm-8">
            <input type="text" name="htown" class="form-control" id="inputPassword" placeholder="" value='<?php echo $htown;?>'>
            <?php echo $msg_htown;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Marital Status</label>
            <div class="col-sm-8">
            <select class='form-control' name='maritalstatus' value='<?php echo $maritalstatus;?>'>
                    <option value='<?php echo $maritalstatus;?>'><?php echo $maritalstatus;?></option>
                    <option value='Married'>Married</option>
                    <option value='Single'>Single</option>
                    <option value='Widow'>Widow</option>
                    <option value='Widower'>Widower</option>
                    <option value='Divorced'>Divorced</option>
                </select>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Spouse Name</label>
            <div class="col-sm-8">
            <input type="text" name="spouse" class="form-control" id="inputPassword" placeholder="" value='<?php echo $spouse;?>'>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Occupation / Profession *</label>
            <div class="col-sm-8">
            <input type="text" name="occupation" class="form-control" id="inputPassword" placeholder="" value='<?php echo $occupation;?>'>
            <?php echo $msg_occupation;?>
            </div>
         
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Baptised *</label>
            <div class="col-sm-8">
            <input type="radio" name="baptised" value='Yes'/><span> Yes</span> 
            <input type="radio" name="baptised" value='No' checked="true"/><span> No</span>
            
                <?php echo $msg_baptised;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Branch *</label>
            <div class="col-sm-8">
            <select class='form-control' name='branch' value='<?php echo $branch;?>'>
                    <option value='<?php echo $branch;?>'><?php echo $branch;?></option>
                    <option value='Central'>Central</option>
                    <option value='Number Two'>Number Two</option>
                    <option value='58'>58</option>
                </select>
            
                <?php echo $msg_branch;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Family *</label>
            <div class="col-sm-8">
            <select class='form-control' name='family' value='<?php echo $family;?>'>
                    <option value='<?php echo $family;?>'><?php echo $family;?></option>
                    <option value='Peace'>Peace</option>
                    <option value='Love'>Love</option>
                    <option value='Faith'>Faith</option>
                    <option value='Hope'>Hope</option>
                    <option value='Hope'>No Group</option>
                </select>
                <?php echo $msg_family;?>
            </div>
           
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Fellowship (one)</label>
            <div class="col-sm-8">
            <select class='form-control' name='fellowship1' value='<?php echo $fellowship1;?>'>
                    <option value='<?php echo $fellowship1;?>'><?php echo $fellowship1;?></option>
                    <option value='Men Fellowship'>Men Fellowship</option>
                    <option value='Women Fellowship'>Women Fellowship</option>
                    <option value='Youth Fellowship'>Youth Fellowship</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Fellowship (Two)</label>
            <div class="col-sm-8">
            <select class='form-control' name='fellowship2' value='<?php echo $fellowship2;?>'>
                    <option value='<?php echo $fellowship2;?>'><?php echo $fellowship2;?></option>
                    <option value='Men Fellowship'>Men Fellowship</option>
                    <option value='Women Fellowship'>Women Fellowship</option>
                    <option value='Youth Fellowship'>Youth Fellowship</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Emergency Contact Name *</label>
            <div class="col-sm-8">
            <input type="text" name="emergname" class="form-control" id="inputPassword" placeholder="" value='<?php echo $emergname;?>'>
            <?php echo $msg_emergename;?>
            </div>
           
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Emergency Contact No. *</label>
            <div class="col-sm-8">
            <input type="text" name="emergcontact" class="form-control" id="inputPassword" placeholder="" value='<?php echo $emergcontact;?>'>
            <?php echo $msg_emergcontact;?>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Passport Picture *</label>
            <div class="col-sm-8">
            <input type="file" name="img" value='<?php echo $image;?>'/>
            <?php echo $msg_image;?>
            </div>
            
        </div>

 
             <div class="form-group">
                <center> 
                <button id="ctn-btn" class="btn btn-outline-success" name="submit"  value='submit'>Submit</button>
                    <input id="ctn-btn-reset" type="reset" class="btn btn-success" name="reset"  value='Reset'>
                    </center>               
                </div> 
          <center><p>All fields with asterics (*) is required</p></center>
        </form>    
    </div>
</div>
        <!-- /.container -->
<?php include("includes/formfooter.php");?>