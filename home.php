<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 
 //print_r ($_SESSION);


 ?>
<?php include("includes/nav-header.php");?> 
<style>
 body{
    background: url(images/logobg.png) repeat fixed;
            
  
}

.card{
    width: 18rem;
    margin-bottom: 20px;
    border-radius:10px;
    text-align:center;

}

.leader{
    background:#000000;
    color:#fff;
}

.announce{
    background:#6e5406;
    color:#fff;
}

.hymn{
    background:#00324E;
    color:#fff;
}

.bible{
    background:#01acc4;
    color:#fff;
}

.hist{
    background:#0e26d5;
    color:#fff;
}
.dash{
    background:#900020;
    color:#fff;
}

.sadash{
    background:#017A5B;
    color:#fff;
}

.memdash{
    background:#54e20d;
    color:#fff;
}

.secdash{
    background:#fff;
    
}

a:hover{
    text-decoration:none;
}
   
   /*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
    .card{
    width: 15rem;
    }
    body{
        background: url(images/logobg.png) repeat fixed;
  
}

}

@media (max-width: 576px) {
    .card{
    width: 15rem;
    }

    body{
        background: url(images/logobg.png) repeat fixed;
  
}
    


}

</style>
<section>
    
    <div class="container" style="margin-bottom:70px; margin-top:50px;">
        <div class="row">
            
            <div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
                <a href="leaders.php">
                    <div class="card leader">
                        <div class="card-body">
                        <h5 class="card-title">LEADERSHIP</h5>
                        <h1 class="card-subtitle"><i class="fas fa-users"></i></h1>
                        <p class="card-text">learn more about your Church leadership body by clicking the card.</p>     
                        </div>
                    </div>
                </a>
            </div>
              
            <div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
            <a href="announcement.php">
                <div class="card announce">
                    <div class="card-body">
                        <h5 class="card-title">ANNOUNCEMENT</h5>
                        <h1 class="card-subtitle"><i class="fas fa-bullhorn"></i></i></h1>
                        <p class="card-text">Don't want to miss announcements, events etc, click to view.</p>
            
                        
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
            <a href="hymncategory.php">
                <div class="card hymn">
                    <div class="card-body">
                        <h5 class="card-title">HYMNALS</h5>
                        <h1 class="card-subtitle"><i class="fas fa-music"></i></h1>
                        <p class="card-text">Dont have church hymnal? Get all Church hymnals here, by clicking on the card.</p>
            
                        
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
            <a href="bible.php">
                <div class="card bible">
                    <div class="card-body">
                        <h5 class="card-title">BIBLE</h5>
                        <h1 class="card-subtitle"><i class="fas fa-book-reader"></i></i></h1>
                        <p class="card-text">Do you want to search for bible verses quickly? Click on card to search for bible.</p>
            
                        
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
            <a href="history.php">
                <div class="card hist">
                    <div class="card-body">
                        <h5 class="card-title">CHURCH HISTORY</h5>
                        <h1 class="card-subtitle"><i class="fas fa-history"></i></h1>
                        <p class="card-text">Do you want to know history of the church? Click on card to get all about the church</p>           
                    </div>
                </div>
                </a>
            </div>
            
            <?php
                            if(!isset($_SESSION['username'])){
                            echo  '<div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
                            <a href="login.php">
                                <div class="card dash">
                                    <div class="card-body">
                                        <h5 class="card-title">LOGIN</h5>
                                        <h1 class="card-subtitle"><i class="fas fa-sign-in-alt"></i></h1>
                                        <p class="card-text">Log in to dashboard to add a member, recieve welfare dues,membership records etc.</p>
                            
                                        
                                    </div>
                                </div>
                            </a>
                        </div>  ';
                            }
                            
                            else if($user_role=$_SESSION['user_role']=='sa'){
                                echo '<div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
                                <a href="sa-dashboard.php">
                                    <div class="card sadash">
                                        <div class="card-body">
                                            <h5 class="card-title">ADMIN DASHBOARD</h5>
                                            <h1 class="card-subtitle"><i class="fas fa-tachometer-alt"></i></h1>
                                            <p class="card-text">Already logged in click to go back to Admin dashboard to view profile.</p>                              
                                        </div>
                                    </div>
                                </a>
                            </div>  ';
                            }

                            else if($user_role=$_SESSION['user_role']=='member'){
                                echo '<div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
                                <a href="member-dashboard.php">
                                    <div class="card memdash">
                                        <div class="card-body">
                                            <h5 class="card-title">MEMBER DASHBOARD</h5>
                                            <h1 class="card-subtitle"><i class="fas fa-tachometer-alt"></i></h1>
                                            <p class="card-text">Already logged in click to go back to Member dashboard to view profile.</p>
                                
                                            
                                        </div>
                                    </div>
                                </a>
                            </div>  ';
                            }

                            else if($user_role=$_SESSION['user_role']=='secretary'){
                                echo '<div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
                                <a href="secretary-dashboard.php">
                                    <div class="card secdash">
                                        <div class="card-body">
                                            <h5 class="card-title">SECRETARY DASHBOARD</h5>
                                            <h1 class="card-subtitle"><i class="fas fa-tachometer-alt"></i></h1>
                                            <p class="card-text">Already logged in click to go back to Member dashboard to view profile.</p>
                                
                                            
                                        </div>
                                    </div>
                                </a>
                            </div>  ';
                            }
                           
                            ?>
                       <div class="progress side-menu" style="margin-top:40px;">
                        <?php
                        //visitors stats
                        $find_count=mysqli_query($conn,"SELECT * FROM visitors");
                        while($row = mysqli_fetch_assoc($find_count)){
                        $current_count = $row['home_count'];
                        $new_count = $current_count + 1;
                        $update_count = mysqli_query($conn,"UPDATE visitors SET home_count='$new_count'");
                        }
                        echo '<p>VisStat: '.$new_count.'</p>';
                        ?>
                        </div>
        </div>    
    </div>

</section><!--  End billboard  -->  
<?php include("includes/footer.php");?>