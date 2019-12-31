<!DOCTYPE html>
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
        
        background:#f4f4f4;
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
     background:#ae99a3;
     color:#fff;
     padding-top:10px;
     padding-bottom:10px;
     margin-bottom:15px; 
    }

.drop-btn{
    background:transparent!important;
}
    .manage{
    margin-top:-35px!important;

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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top" >
        <div class="container-fluid">
            <div>
                <img src='profile_images/<?php echo $image ?>' class='img-fluid img-thumbnail' width='40px' width="40px" style="border-radius:100%;"/><span style='margin-left:10px; color:#fff; font-weight:bold;'>Welcome, <?php echo ucfirst($username);?></span>
            </div>
                <!--<a class="navbar-brand" href="sa.php"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>

                </button>--> 

                
                
            <div class="collapse navbar-collapse" id="navbarResponsive">
                
                <ul class="nav navbar-nav ml-auto navbar-right">
                   
                <li class="nav-item"><a class="nav-link" href="home.php"><i class="fa fa-home"></i> Home</a></li>    
                <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                   
            
                </ul>
            </div>
        </div>
    </nav>
    <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-xs-9 col-sm-9 header-h4">
                    <a href="sa-dashboard.php" style="color:#fff; text-decoration:none;"><h5 class="dash-text"><i class="fa fa-tachometer-alt" ></i> Dashboard</h5></a>   
                </div>

                <div class="col-md-10 col-xs-9 col-sm-9">
                    <span class="dropdown manage2 dropleft">
                        <button class="btn btn-secondary dropdown-toggle drop-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Menu 
                        </button>
                        <div class="dropdown-menu list-font drop-bg1" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="home.php"><i class="fa fa-home" style="color:brown;"></i> Home</a>
                                 <a class="dropdown-item" href="form.php"><i class="fas fa-user-plus" style="color:green;"></i> Add Member</a>
                                 <a class="dropdown-item" href="sa-post-new.php"><i class="fas fa-edit" style="color:#2B8A9A;"></i> Post Announcement</a>
                                 <a class="dropdown-item" href="sa-hymn-new.php"><i class="fas fa-edit" style="color:#ae99a3;"></i> Post Hymn</a>
                                 <a class="dropdown-item" href="welfare.php"><i class="fas fa-hand-holding-usd" style="color:#0D80D0;"></i> Welfare</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd" style="color:#0D80D0;"></i> Other Finacial Recording</a>
                                 <a class="dropdown-item" href="sa-welfare-list.php"><i class="fas fa-clipboard-list" style="color:#82C91E;"></i> Welfare List</a>
                                 <a class="dropdown-item" href="sa-member-list.php"><i class="fas fa-search" style="color:#2B8A9A;"></i> Membership List</a>
                                 <a class="dropdown-item" href="sa-reset.php?said=<?php echo $id;?>"><i class="fa fa-key" style="color:blue;"></i> Change Password</a>
                                 <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out-alt" style="color:black;"></i> Logout</a>
                           
                        </div>
                    </span>
                </div> 

                <div class="col-md-2 col-xs-3 col-sm-3">
                    <div class="dropdown manage dropleft">
                        <button class="btn btn-secondary dropdown-toggle drop-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                        </button>
                        <div class="dropdown-menu list-font drop-bg" aria-labelledby="dropdownMenuButton">
                               <a class="dropdown-item" href="sa-reset.php?said=<?php echo $id; ?>"><i class="fa fa-key" style="color:blue;"></i> Change Password</a>
                               <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out-alt" style="color:#000;"></i> Logout</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
        
    

