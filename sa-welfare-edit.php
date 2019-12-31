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

<title>Welfare Update</title>
<?php include("includes/form-header.php");?>

<?php 
  $msg_amount="";$msg_paydate="";
 
  $paydate_up="";$fname_up="";$mname_up="";$lname_up="";$phone1_up="";$amount_up="";

 //Get ID from Database to pull data of loggedin account to edit
 $id=$_GET['duesid'];

 //if id is picked where id=$staffid to select who is logged in
 if(isset($id))
 {
 $result=mysqli_query($conn,"SELECT welfare.*,members.* FROM welfare INNER JOIN members ON welfare.member_id=members.id WHERE welfare.id='$id'");

 $retrieve=mysqli_fetch_array($result);

//Data is put in new update array after retrieving
$fname_up=$retrieve['fname'];
$mname_up=$retrieve['mname'];
$lname_up=$retrieve['lname'];
$phone1_up=$retrieve['phone1'];
$amount_up=$retrieve['amount'];
$paydate_up=$retrieve['paydate'];    
    
 }

 //print_r($retrieve); 

 if(isset($_POST['submit'])){


  //New Values are put in old array and use to updat database values
 
  $paydate=mysqli_real_escape_string($conn, $_POST['paydate_up']); 
  $amount=mysqli_real_escape_string($conn, $_POST['amount_up']); 
  

   if(EMPTY($amount)){
    $msg_amount="<div class='error'>Enter Amount</div>";

    }
     
    else if(EMPTY($paydate)){
        $msg_paydate="<div class='error'>Enter payment date</div>";
    }
      else
      {
       
      
     //PHP CODE TO INSERT DATA INTO DATABASE
      mysqli_query($conn,"UPDATE welfare SET paydate='$paydate',amount='$amount' WHERE welfare.id='$id'");
      $msg_success='<div class="success">Welfare Updated Succesfully</div>';
      $paydate_up="";$amount_up="";
      
      echo '<script>
      alert("Data Updated Successfully!");
      window.location = "sa-welfare-list.php";
      </script>';
      
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

#ctn-btn-reset{
    background-color: #00324E;
    border-color: #fff;
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
         <a href="sa-welfare-list.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px;"/></a>                
        </center>
      </div>
    
      <div class="jumbotron col-md-8 offset-md-2">
            <form method='post' enctype='multipart/form-data' action=''>
                <center>
                    <h4 style="margin-bottom:20px; font-weight:bold;">UPDATE DUES</h4>
                </center>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputname">Name</label>
                        <input type="text" name="name" placeholder="Enter date" class="form-control" value="<?php echo $fname_up.' '.$mname_up.' '.$lname_up;?>" readonly/>
    
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputname">Payment Date</label>
                        <input type="date" name="paydate_up" placeholder="Enter date" class="form-control" value="<?php echo $paydate_up;?>"/>
    
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="inputname">Amount</label>
                        <input type="number" name="amount_up" placeholder="Enter Amount" class="form-control" value="<?php echo $amount_up;?>"/>
                        
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