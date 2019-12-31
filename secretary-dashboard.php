<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();

 //Calling logged function to prevent user from accessing profile page if logged out
if(!isset($_SESSION['username']) || $_SESSION['user_role']!='secretary') 
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
$result_msg=mysqli_query($conn,"SELECT id FROM messages");
$row_msg=mysqli_num_rows($result_msg);


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

<DOCTYPE! html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=".../favicon.ico">
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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

    .navbar{
       
        background:#460322!important;
    }

    .main-color{
        background:#460322!important;
        border-color:#c0392b !important;
        color:#fff;
    }
     
    /*-Header-*/
    #header{
     background:#000;
     color:#fff;
     padding-top:10px;
     padding-bottom:10px;
     margin-bottom:15px; 
    }

.drop-btn{
    background:blue!important;
}
    .manage{
    margin-top:-40px!important;

    }


    label{
        font-weight:bold;
    }

.manage2{
    display:none;
    margin-top:-40px!important;
    }
    /*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
  
   .navbar{
       display:none;
   }

   .list-font{
       font-size:12px;
   }

   .drop-bg{
       margin-right:15px;
   }

.manage{
    display:none;
    
    }

.manage2{
    float:right;
    display:block;
    margin-top:-30px!important;
    
    }
}

@media (max-width: 576px) {
    .navbar{
       display:none;
   }

   .list-font{
       font-size:12px;
   }

   .drop-bg{
       margin-right:15px;
   }

.manage{
    display:none;
    
    }
    
    .manage2{
        float:right;
        display:block;
        margin-top:-30px!important;
        

    
    }
}


	
    </style>
</head>
<body>
    <div class="container" style="margin-top:100px;">
        <div class="jumbotron col-md-6 mx-auto">
            <h3>Welcome, <?php echo ucfirst($username) ;?> </h3>
            <h1 style="color:red;">SECRETARY DASHBOARD UNDER CONSTRUCTION</h1>
            <a href="home.php"><button class="btn btn-success">GO HOME</button></a>
        </div>
    </div>

</body>
</html>