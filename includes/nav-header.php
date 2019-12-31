<!DOCTYPE html>
<html>
<head>
<title>CHURCH PORTAL</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=".../favicon.ico">
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css"> 
	<script defer src="fontawesome/js/all.js"></script>
	<link href="/fontawesome/css/all.css" rel="stylesheet">
	<link href="css/waypoints.css" rel="stylesheet" type="text/css">
	
	
   
    <style>
     
    
     
    label{
        font-weight:bold;
    }

	
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top" >
        <div class="container-fluid">
                <a class="navbar-brand" href="home.php">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>

                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                            
                            <li class="nav-item"><a class="nav-link" href="home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php"><i class="fa fa-envelope"></i> Contact</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <?php
                                if(EMPTY($_SESSION)){
                                    echo'<a class="dropdown-item" href="#"><i class="fas fa-exclamation-triangle" style="color:red;"></i> Log in to access dasboard</a>';
    
                                        }

                                else if($user_role=$_SESSION['user_role']=='sa'){
                                echo'<a class="dropdown-item" href="sa-dashboard.php"><i class="fa fa-tachometer-alt" style="color:red;"></i> Admin Dashboard</a>';

                                    }

                                    else if($user_role=$_SESSION['user_role']=='member'){
                                        echo'<a class="dropdown-item" href="member-dashboard.php"><i class="fa fa-tachometer-alt" style="color:green;"></i> Member Dashboard</a> ';
                                    }

                                    else if($user_role=$_SESSION['user_role']=='secretary'){
                                        echo'<a class="dropdown-item" href="secretary-dashboard.php"><i class="fa fa-tachometer-alt" style="color:green;"></i> Secretary Dashboard</a> ';
                                    }
        
                                ?>
                                    </div>
                                </li>
                         
                        

                        <?php
                            if(isset($_SESSION['username'])){
                            echo  '<li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>';
                            }
                            
                            else{
                                echo '<li class="nav-item"><a class="nav-link" href="signup.php"><i class="fas fa-user-edit"></i> Sign Up</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a></li>';
                            }
                           
                            ?>
                       
                    </ul>
            </div>
        </div>
    </nav>
    
