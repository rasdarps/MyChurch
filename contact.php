<?php
include("includes/db_config.php");
include("includes/function.php");
session_start();

$msg_name="";$msg_contact="";$msg_email="";$msg_content="";$msg_success="";
$name="";$contact="";$email="";$content="";$msg_date="";$msg_time="";
if(isset($_POST['submit'])){
  //mysql_real_escape_string() Use to prevent sql Injection
  //Field variables
$name=mysqli_real_escape_string($conn, $_POST['name']);

$contact=preg_replace('#[^0-9+]#', '', $_POST['contact']);

$email=mysqli_real_escape_string($conn, $_POST['email']);

$content =mysqli_real_escape_string($conn, $_POST['content']);

$msg_date=date('Y-m-d');

date_default_timezone_set("Africa/Accra");
$msg_time=date("h:i:sa");

//echo $name."<br>" .$contact. "<br>" .$email. "<br>" .$content. "<br>" .$msg_date. "<br>" .$msg_time;

//Field Validation codes
if(empty($name)){
  $msg_name="<div class='error'>Please enter Your Name</div>";
}

else if(EMPTY($contact)){
    $msg_contact="<div class='error'>Please Enter Your Contact</div>";
  }

else if(!FILTER_VAR($email, FILTER_VALIDATE_EMAIL))
{
  $msg_email="<div class='error'>Enter a valid email address</div>";
}

else if(EMPTY($content)){
  $msg_content="<div class='error'>Please Enter Message</div>";
}

else
{
//PHP CODE TO INSERT DATA INTO DATABASE
	   mysqli_query($conn,"INSERT INTO messages (fullname,contact,email,content,msg_date,msg_time)
VALUES('$name','$contact','$email','$content','$msg_date','$msg_time')");
$msg_success='<div class="success">Message delivered Succesfully</div>';
$name="";$contact="";$email="";$date="";$content="";$msg_date="";$msg_time="";

echo '<script>
      alert("Data Inserted Successfully!");
      window.location = "contact.php";
      </script>';

}
}

?>

<title>CONTACT</title>
<?php include("includes/nav-header.php");?>
<style>
 body{
        background: url(images/logobg.png) repeat fixed;
  
}

#ctn-btn{
    background:#460322 !important;
    border-color: #460322 !important;
    color:#fff !important;
}

#ctn-btn:hover{
    background:#fff !important;
    color:#460322 !important;
}


.error{
  color:red;
}

.success{
  color:00324E;
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



    <div class='container' style="margin-top:50px; margin-bottom:20px;">

        <div class="card col-md-6 mx-auto">
       
            <div class="card-body">
                <h5 class="card-title" style="margin-bottom:20px; color:#460322;">How Can We Help You?</h5>
                <p class="card-text">You can use this form to send us technical and enquiry message regarding the use ofthis site </p>
                     <hr>
                <form method="post" style="color:#460322;">
                        <center><h5>Send Us Message</h5></center>
                         <hr>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" value='<?php echo $name;?>'/>
                        <?php echo $msg_name;?>
                    </div>
               

                    <div class="form-group">
                        <label>Contact (format 02xxxxxx 0r +233024xxx)</label>
                        <input type="text" name="contact" class="form-control" placeholder="Enter your phone number" value='<?php echo $contact;?>'/>
                        <?php echo $msg_contact;?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" value='<?php echo $email;?>'/>
                        <?php echo $msg_email;?>
                    </div>
            
                
                    <div class="form-group">
                        <label>Message</label>
                        <textarea type="text" name="content" cols="40" rows="4" class="form-control" placeholder="Enter your message"><?php echo $content;?></textarea>
                        <?php echo $msg_content;?>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputDate4"></label>
                        <input type="hidden" name="msg_date" class="form-control" value='<?php echo $msg_date;?>'>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputDate4"></label>
                        <input type="hidden" name="msg_time" class="form-control" value='<?php echo $msg_time;?>'>
                    </div>
                

                    <div class="form-group">
                        <input type="submit" id="ctn-btn" name="submit" class="btn btn-success" value="Send"/>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
<?php
include("includes/footer.php");
?>