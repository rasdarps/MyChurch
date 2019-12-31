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

<title>Member Update</title>
<?php include("includes/form-header.php");?>

<?php 
  $msg_success="";$msg_title="";$msg_fname="";$msg_mname="";$msg_lname="";$msg_gender="";$msg_dob="";$msg_phone1="";$msg_phone2="";$msg_email="";$msg_addres="";
  $msg_maritalstatus="";$msg_spouse="";$msg_htown="";$msg_occupation="";$msg_baptised="";$msg_branch="";$msg_family="";$msg_fellowship1="";$msg_fellowship2="";$msg_emergename="";
  $msg_emergcontact=""; 
 
  $title_up="";$fname_up="";$mname_up="";$lname_up="";$gender_up="";$dob_up="";$phone1_up="";$phone2_up="";$email_up="";$addres_up="";$maritalstatus_up="";
  $spouse_up="";$htown_up="";$occupation_up="";$baptised_up="";$branch_up="";$family_up="";$fellowship1_up="";$fellowship2_up="";$emergname_up="";$emergcontact_up="";
        

 //Get ID from Database to pull data of loggedin account to edit
 $id=$_GET['memberid'];

 //if id is picked where id=$staffid to select who is logged in
 if(isset($id))
 {
 $result=mysqli_query($conn,"SELECT * FROM members WHERE id='$id'");

 $retrieve=mysqli_fetch_array($result);

//Data is put in new update array after retrieving
$title_up=$retrieve['title'];
$fname_up=$retrieve['fname'];
$mname_up=$retrieve['mname'];
$lname_up=$retrieve['lname'];
$gender_up=$retrieve['gender'];
$dob_up =$retrieve['dob']; 
$phone1_up=$retrieve['phone1'];
$phone2_up=$retrieve['phone2'];
$email_up=$retrieve['email'];
$addres_up=$retrieve['addres'];
$maritalstatus_up=$retrieve['maritalstatus']; 
$spouse_up=$retrieve['spouse'];
$htown_up=$retrieve['htown'];
$occupation_up=$retrieve['occupation'];
$baptised_up=$retrieve['baptised'];
$branch_up=$retrieve['branch'];
$family_up=$retrieve['family'];
$fellowship1_up=$retrieve['fellowship1'];  
$fellowship2_up=$retrieve['fellowship2'];
$emergname_up=$retrieve['emergname'];
$emergcontact_up=$retrieve['emergcontact'];    
    
 }

 //print_r($retrieve); 

 if(isset($_POST['submit'])){


  //New Values are put in old array and use to updat database values
 
  if(isset($_POST['submit'])){
    $title=mysqli_real_escape_string($conn, $_POST['title_up']);
    $fname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['fname_up']);
    $mname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['mname_up']);
    $lname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['lname_up']);
    $gender=mysqli_real_escape_string($conn, $_POST['gender_up']);
    $dob =mysqli_real_escape_string($conn, $_POST['dob_up']); 
    $phone1=preg_replace('#[^0-9+-]#', '', $_POST['phone1_up']);
    $phone2=preg_replace('#[^0-9+-]#', '', $_POST['phone2_up']);
    $email=mysqli_real_escape_string($conn, $_POST['email_up']);
    $addres=mysqli_real_escape_string($conn, $_POST['addres_up']);
    $htown=mysqli_real_escape_string($conn, $_POST['htown_up']);
    $maritalstatus=mysqli_real_escape_string($conn, $_POST['maritalstatus_up']);
    $spouse=mysqli_real_escape_string($conn, $_POST['spouse_up']);
    $occupation=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['occupation_up']); 
    $baptised=mysqli_real_escape_string($conn, $_POST['baptised_up']);
    $branch=mysqli_real_escape_string($conn, $_POST['branch_up']);
    $family=mysqli_real_escape_string($conn, $_POST['family_up']);
    $fellowship1=mysqli_real_escape_string($conn, $_POST['fellowship1_up']);
    $fellowship2=mysqli_real_escape_string($conn, $_POST['fellowship2_up']);
    $emergname=preg_replace('#[^A-Za-z-?! ]#', '', $_POST['emergname_up']);
    $emergcontact=preg_replace('#[^0-9+-]#', '', $_POST['emergcontact_up']); 
    

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

      else if(!FILTER_VAR($email, FILTER_VALIDATE_EMAIL))
      {
        $msg_email="<div class='error'>Enter a valid email address</div>";
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
        $msg_baptised="<div class='error'>Chose yes or no</div>";
      }  

      else if(EMPTY($branch)){
        $msg_branch="<div class='error'>Chose yes or no</div>";
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

      else
      {
       
      
     //PHP CODE TO INSERT DATA INTO DATABASE
      mysqli_query($conn,"UPDATE members SET title='$title',fname='$fname',mname='$mname',lname='$lname',gender='$gender',dob='$dob'
      ,phone1='$phone1',phone2='$phone2',email='$email',addres='$addres',maritalstatus='$maritalstatus',spouse='$spouse',
      htown='$htown',occupation='$occupation',baptised='$baptised',branch='$branch',family='$family',fellowship1='$fellowship1',fellowship2='$fellowship2'
      ,emergname='$emergname',emergcontact='$emergcontact' WHERE id='$id'");
      $msg_success='<div class="success">Member Updated Succesfully</div>';
      $title_up="";$fname_up="";$mname_up="";$lname_up="";$gender_up="";$dob_up="";$phone1_up="";$phone2_up="";$email_up="";$addres_up="";$maritalstatus_up="";
      $spouse_up="";$htown_up="";$occupation_up="";$baptised_up="";$branch_up="";$family_up="";$fellowship1_up="";$fellowship2_up="";$emergname_up="";$emergcontact_up="";
            
      echo '<script>
      alert("Data Updated Successfully!");
      window.location = "sa-member-list.php";
      </script>';
    }
 }
 }
  ?>
   
<style>
body{
    background: url(images/logobg.png) repeat fixed;
  
}

.jumbotron{
    color:#fff;
    margin-top:10px;
    padding-top:10px;
    background:#460322;
    /*background: url(images/bg.jpg) no-repeat;*/
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover; 
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

.close-btn{
  padding-top:20px;
  margin-bottom:-10px;
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
    
    <div class="jumbotron col-md-8 offset-md-2">
        <form method='post' enctype='multipart/form-data' action=''>
            <center>
                <h4 style="margin-bottom:20px; font-weight:bold;">MEMBER FORM</h4>
            </center>

            <div class="form-group row">
                <label for="inputTitle" class="col-sm-4 col-form-label">Title</label>
                <div class="col-sm-8">
                    <select class='form-control' name='title_up' value='<?php echo $title_up;?>'>
                        <option value='<?php echo $title_up;?>'><?php echo $title_up;?></option>
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
                <input type="text" name="fname_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $fname_up;?>'>
                <?php echo $msg_fname;?>
                </div>
                
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Middle Name</label>
                <div class="col-sm-8">
                <input type="text" name="mname_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $mname_up;?>'>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Last name *</label>
                <div class="col-sm-8">
                <input type="text" name="lname_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $lname_up;?>'>
                <?php echo $msg_lname;?>
                </div>
                
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Gender *</label>
                <div class="col-sm-8">
                <select class='form-control' name='gender_up' value='<?php echo $gender_up;?>'>
                        <option value='<?php echo $gender_up;?>'><?php echo $gender_up;?></option>
                        <option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                    </select>
                    <?php echo $msg_gender;?>
                </div>
            
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Date of Birth *</label>
                <div class="col-sm-8">
                <input type="date" name="dob_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $dob_up;?>'>
                <?php echo $msg_dob;?>
                </div>
                
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Contact No. (1) *</label>
                <div class="col-sm-8">
                <input type="text" name="phone1_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $phone1_up;?>'>
                <?php echo $msg_phone1;?>
                </div>
                
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Contact No. (2)</label>
                <div class="col-sm-8">
                <input type="text" name="phone2_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $phone2_up;?>'>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                <input type="email" name="email_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $email_up;?>'>
                <?php echo $msg_email;?>
                </div>
                
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Address *</label>
                <div class="col-sm-8">
                <textarea name='addres_up' cols="30" rows="3" class='form-control' placeholder='Enter Address'><?php echo $addres_up;?></textarea>
                <?php echo $msg_addres;?>
                </div>
            
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Home Town *</label>
                <div class="col-sm-8">
                <input type="text" name="htown_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $htown_up;?>'>
                <?php echo $msg_htown;?>
                </div>
                
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Marital Status</label>
                <div class="col-sm-8">
                <select class='form-control' name='maritalstatus_up' value='<?php echo $maritalstatus_up;?>'>
                        <option value='<?php echo $maritalstatus_up;?>'><?php echo $maritalstatus_up;?></option>
                        <option value='Male'>Married</option>
                        <option value='Female'>Single</option>
                        <option value='Female'>Widow</option>
                        <option value='Female'>Widower</option>
                        <option value='Female'>Divorced</option>
                    </select>
                </div>
                
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Spouse Name</label>
                <div class="col-sm-8">
                <input type="text" name="spouse_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $spouse_up;?>'>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Occupation / Profession *</label>
                <div class="col-sm-8">
                <input type="text" name="occupation_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $occupation_up;?>'>
                <?php echo $msg_occupation;?>
                </div>
            
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Baptised *</label>
                <div class="col-sm-8">
                <input type="radio" name="baptised_up" value='Yes' <?php if($retrieve['baptised']=="Yes"){ echo "checked";}?>/><span> Yes</span> 
                <input type="radio" name="baptised_up" value='No' <?php if($retrieve['baptised']=="No"){ echo "checked";}?>/><span> No</span>
                
                    <?php echo $msg_baptised;?>
                </div>
                
            </div>

             <div class="form-group row">
            <label for="inputsname" class="col-sm-4 col-form-label">Branch *</label>
            <div class="col-sm-8">
            <select class='form-control' name='branch_up' value='<?php echo $branch_up;?>'>
                    <option value='<?php echo $branch_up;?>'><?php echo $branch_up;?></option>
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
                <select class='form-control' name='family_up' value='<?php echo $family_up;?>'>
                        <option value='<?php echo $family_up;?>'><?php echo $family_up;?></option>
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
                <select class='form-control' name='fellowship1_up' value='<?php echo $fellowship1_up;?>'>
                        <option value='<?php echo $fellowship1_up;?>'><?php echo $fellowship1_up;?></option>
                        <<option value='Men Fellowship'>Men Fellowship</option>
                    <option value='Women Fellowship'>Women Fellowship</option>
                    <option value='Youth Fellowship'>Youth Fellowship</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Fellowship (Two)</label>
                <div class="col-sm-8">
                <select class='form-control' name='fellowship2_up' value='<?php echo $fellowship2_up;?>'>
                        <option value='<?php echo $fellowship2_up;?>'><?php echo $fellowship2_up;?></option>
                        <option value='Men Fellowship'>Men Fellowship</option>
                    <option value='Women Fellowship'>Women Fellowship</option>
                    <option value='Youth Fellowship'>Youth Fellowship</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Emergency Contact Name *</label>
                <div class="col-sm-8">
                <input type="text" name="emergname_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $emergname_up;?>'>
                <?php echo $msg_emergename;?>
                </div>
            
            </div>

            <div class="form-group row">
                <label for="inputsname" class="col-sm-4 col-form-label">Emergency Contact No. *</label>
                <div class="col-sm-8">
                <input type="text" name="emergcontact_up" class="form-control" id="inputPassword" placeholder="" value='<?php echo $emergcontact_up;?>'>
                <?php echo $msg_emergcontact;?>
                </div>
                
            </div>            

            <div class="form-group">
                <center> 
                 <button id="ctn-btn" class="btn btn-outline-success" name="submit"  value='submit'>Update</button>
                </center>               
            </div> 
            
        </form>    
    </div>
</div>
 <!-- /.container -->
 <?php include("includes/formfooter.php");?>