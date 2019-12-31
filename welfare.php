<?php
 include("includes/db_config.php");
 include("includes/function.php");

 session_start();

 //Calling logged function to prevent user from accessing profile page if logged out
if(!isset($_SESSION['username']) || $_SESSION['user_role']!='sa') 
{
    echo '<script>
	alert("You are not Authorized To access page!");
	window.location = "login.php";
	</script>';
  //header("Location:staff-login.php");
  //echo '<script>window.location.href = "admin.php";</script>';
}

//when session starts the variable is fetched from the login page and stored in the $email variable on profile page
$username=$_SESSION['username'];
$user_role=$_SESSION['user_role'];

//Select statement to query details of logged in account from the database
$result=mysqli_query($conn,"SELECT id,username,fullname,user_role,img FROM users WHERE username='$username' AND user_role='$user_role'");

//Data is fetched from the database When username matches entered matches any of the emails in the database
$retrieve=mysqli_fetch_array($result);

//TO SEARCH AND SHOW TOTAL NUMBER OF MEMBERS
$result_members=mysqli_query($conn,"SELECT id FROM members");
$row_members=mysqli_num_rows($result_members);

//TO SEARCH AND SHOW TOTAL DUES
$result = mysqli_query($conn, 'SELECT SUM(amount) AS value_sum FROM welfare'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];


//TO SEARCH AND SHOW TOTAL NUMBER OF Messages
//$result_msg=mysqli_query($conn,"SELECT id FROM messages");
//$row_msg=mysqli_num_rows($result_msg);

//print_r($retrieve);

//This id will show who is logged in and will allow the user to edit his profile or change password
$id=$retrieve['id'];
$username=$retrieve['username'];
$fullname=$retrieve['fullname'];
$image=$retrieve['img'];
$user_role=$retrieve['user_role'];


 //print_r ($_SESSION);
 
 ?>
<title>Welfare Forms</title>
<?php include("includes/form-header.php");?> 
<style>
body{
        background: url(images/logobg.png) repeat fixed;
  
}

.jumbotron{
    color:#fff;
    padding-top:20px;
    background:#460322;
    
}

#ctn-btn{
    border-color: #fff !important;
    background:#460322 !important;
    color:#fff !important;
}

#ctn-btn:hover{
    background:grey !important;
    color:#fff !important;
}

.close-btn{
  padding-top:20px;
  margin-bottom:5px;
}

.search{
    padding-top:10px;
    padding-bottom:10px;
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
            <a href="sa-dashboard.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; border-radius:50px;"/></a>                
          </center>
      </div>
    <div class="jumbotron col-md-8 mx-auto search">
        
        <form method='post' enctype='multipart/form-data' action=''>
            <div class="input-group mb-3 col-md-6 mx-auto">
            <input type="text" name="phone1" placeholder="Search by phone number" class="form-control"/>
                <div class="input-group-append">
                <button id="ctn-btn" class="btn btn-outline-success" name="search"  value='submit'>Search</button>
                </div>
            </div>
            
        </form>    
    

        <?php
          
          if(isset($_POST['search'])){
                $phone1 =mysqli_real_escape_string($conn, $_POST['phone1']);
               
                if(EMPTY($phone1)){
                    echo '<script>
                    alert("Please Enter a Phone Number!");
                    window.location = "welfare.php";
                    </script>';
                  }
     
                if($phone1!=""){

                $query = "SELECT * FROM  members WHERE phone1='$phone1'";   
                
                $data = mysqli_query($conn, $query) or die('error');
                
                //spit number of the datain database
                $results = mysqli_num_rows($data);

                if(mysqli_num_rows($data) > 0){
                    while($row = mysqli_fetch_assoc($data)){
                        $id = $row['id'];
                        $fname = $row['fname'];
                        $mname = $row['mname'];
                        $lname = $row['lname'];
                        $phone1 = $row['phone1'];
                        $family = $row['family'];
                        

                    ?>

    
    
            <?php $amount="";?>
        
            <form method='post' enctype='multipart/form-data' action=''>
                    <div class="form-group col-md-6">
                        <label for="inputname"></label>
                        <input type="text" name="member_id" placeholder="" class="form-control" value="<?php echo $id;?>" hidden/>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputname">Name</label>
                        <input type="text" placeholder="" class="form-control" value="<?php echo $fname.' '.$mname.' '.$lname;?>" readonly/>
                    </div>
                </div>
    
                 <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input">Mobile Phone</label>
                        <input type="text" placeholder="" class="form-control" value="<?php echo $phone1;?>" readonly/>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="inputname">Family</label>
                        <input type="text" placeholder="Enter date" class="form-control" value="<?php echo $family;?>" readonly/>
    
                    </div>
                    
                </div> 
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputname">Payment Date</label>
                        <input type="date" name="paydate" placeholder="Enter date" class="form-control" value="<?php echo $paydate;?>"/>
    
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="inputname">Amount</label>
                        <input type="number" name="amount" placeholder="Enter Amount" class="form-control" value="<?php echo $amount;?>"/>
                        
                    </div>
                </div>
    
                    <div class="form-group">
                        <center> 
                        <button id="ctn-btn" class="btn btn-outline-success" name="submit"  value='submit'>Submit</button>
                            
                            </center>               
                        </div> 
                
            </form>    
    </div>
</div>

                    <?php

                    }
                    }else{
                    ?>
                    <center><h4 style="color:#fff;">Data Not Found</h4></center>
                    <?php

                    }
                    }
                    }

                    ?>

 <?php


$paydate="";$fname="";$mname="";$lname="";$phone1="";$amount="";$member_id="";

if(isset($_POST['submit'])){
  
   $member_id=mysqli_real_escape_string($conn, $_POST['member_id']);
   $paydate=mysqli_real_escape_string($conn, $_POST['paydate']); 
   $amount=mysqli_real_escape_string($conn, $_POST['amount']);

   
   

   if(EMPTY($amount)){
    echo '<script>
	alert("You did not Enter Amount!");
	window.location = "welfare.php";
	</script>';
    }
     
    else if(EMPTY($paydate)){
        echo '<script>
	alert("You did not Enter Date!");
	window.location = "welfare.php";
	</script>';

    }

     else
     {
       
     
    //PHP CODE TO INSERT DATA INTO DATABASE
    mysqli_query($conn,"INSERT INTO welfare (member_id,paydate,amount)
    VALUES('$member_id','$paydate','$amount')") or die('error');
  
     $member_id="";$paydate="";$fname="";$mname="";$lname="";$phone1="";$amount="";$family="";
     
     echo '<script>
	alert("Data Inserted Successfully!");
	window.location = "welfare.php";
	</script>';
   }
}
?>                   
        <!-- /.container -->
<?php include("includes/formfooter.php");?>