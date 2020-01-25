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
//$result_members=mysqli_query($conn,"SELECT id FROM membership_form");
//$row_members=mysqli_num_rows($result_members);

//TO SEARCH AND SHOW TOTAL DUES
$result = mysqli_query($conn, 'SELECT SUM(amount) AS value_sum FROM welfare INNER JOIN members ON welfare.member_id=members.id'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
//print_r($retrieve);

//This id will show who is logged in and will allow the user to edit his profile or change password
    $id=$retrieve['id'];
    $fullname=$retrieve['fullname'];
	$username=$retrieve['username'];
	$image=$retrieve['img'];
    $user_role=$retrieve['user_role']

 ?>


 <!DOCTYPE html>
<html>
<head>
<title>Search Records</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
	

    <style>
    body{
    background:#f0f0f0;
}

    .admin_header{
       width:100%;
       height:55px;
       background:#009945; 
       color:#fff;
       
    }

    .admin_sidebar{
       width:12rem; 
       height:450px;
       background:#fff;
       box-shadow: 0 1px 2px 0 rgba(34,36,38,.15);
       float:left;
       margin-right:10px;
       
    }

    .nav-link{
        padding:20px;
     color: rgba(0,0,0,.87) !important;
     border-bottom:1px solid #009945;
    }
    
    .admin_body{
      height:700px;
      float:left;
      background-color:red;
    } 

	.card-bg{
		background:#343A40 !important;
	}

    label{
        font-weight:bold;
    }
    .close-btn{
  padding-top:20px;
  margin-bottom:-40px;
}

/*MEDIA QUERY*/

@media (max-width: 992px) {
    
}

@media (max-width: 768px) {
    .admin_sidebar{
       width:6rem; 
      font-size:10px;
       } 

       nav{
           font-size:14px !important;
       }

       .h4-title{
           font-size:18px;
       }
}

@media (max-width: 576px) {
    .admin_sidebar{
       width:6rem; 
       font-size:10px;
       }

       nav{
           font-size:14px !important;
       }
    }
	
    </style>
</head>
<body>

	<!-- Admin Header -->

<!--<div class=" container-fluid admin_header">
    <nav>
    <a class="navbar-brand" href="admin-dashboard.php" style="text-decoration:none; color:#fff;"><i class='fa fa-tachometer-alt' style="color:#fff"></i> Dashboard</a>
        <div style="float:right; margin-top:5px;">
        <img src='profile_images/<?php echo $image ?>' class='img-fluid img-thumbnail' width='40px' style='border-radius:50%; margin-right:10px;'/><span style='margin-right:10px; color:#fff;'>Welcome, <?php echo $username ?></span>
        </div>  
    </nav> 
</div>-->
        <div class="close-btn">
          <center>
         <a href="sa-dashboard.php"><img src="images/close-btn.png" alt="close" width="50px" height="50px" style="background:#460322; display:inline-block; border-radius:100%;"/></a>                
        </center>
      </div>



    <div class="container-fluid" style="margin-bottom:100px; margin-top:40px;">
        <div class="table-responsive">

            <form action="search_results.php" method="get">
                <label for="">Search By Name</label>
                <div class="input-group">
                <input type="search" name="search">
               <div class="input-group-append">
                  <span class="input-group-text"> <button type="submit" name="find"><i class="fas fa-search" style="color: blue;"></i></button></span>
               </div>

           </div>
            </form>

            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>No.</th>
                                    <th>Date</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Amount</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                   

                                   
                    </tr>
                </thead>
                <tbody style="margin-botton:50px;">
                <?php
                $sql='SELECT welfare.id,welfare.paydate,welfare.amount,members.fname,members.mname,members.lname FROM welfare INNER JOIN members ON welfare.member_id=members.id ORDER BY welfare.paydate DESC';
                $result = mysqli_query($conn, $sql);
                $i=0;

               if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $paydate = $row['paydate'];
                            $fname = $row['fname'];
                            $mname = $row['mname'];
                            $lname = $row['lname'];
                            $amount = $row['amount'];
                                
                                ?>
                        
                            <tr>
                        
                        <td><?php echo $i=$i+1;?></td>
                        <td><?php echo date('dS F Y', strtotime($paydate));?> </td>
                        <td><?php echo $fname;?></td>
                        <td><?php echo $mname;?></td>
                        <td><?php echo $lname;?></td>
                        <td><?php echo $amount;?></td>
                       
                        <td><?php echo "<a href='sa-welfare-view.php?duesid=$id' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye' style='color:#000; font-size:16px'></i></a></th>";?></td>
                        <td><?php echo "<a href='sa-welfare-edit.php?duesid=$id' data-toggle='tooltip' data-placement='right' title='Edit'><i class='fas fa-user-edit' style='color:blue; font-size:16px'></i></a></th>";?></td>
                        <td><?php echo "<a href='sa-welfare-del.php?del=$id' data-toggle='tooltip' data-placement='right' title='Delete'><i class='fas fa-minus-circle' style='color:red; font-size:16px'></i></a></th>";?></td>
                                
                            </tr>
                        
                            </tr>

                            <?php
                               
                                }
                                }else{
                                ?>
                                <tr>
                                    <td>Data Not Found</td> 
                                </tr>
                                <?php
                                

                                }
                                        

                                ?>
                
                </tbody>

            </table>
        </div>
    </div> 

<div class="container-fluid"> 
    <form class="col-md-6">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color:blue; font-weight:bold!important;">
			<tbody>
                <tr><td><tag>Total Received Dues: </tag></td><td>Gh¢<?php echo $sum ;?>.00</td></tr>
							
			</tbody>
        </table>
    </form>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/general.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'copy', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

</body>
</html>
