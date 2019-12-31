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
    background:#cd079c;
    color:#fff;
}



.hymnen{
    background:#017A5B;
    color:#fff;
}

.hymntwi{
    background:#4a2c08;
    color:#fff;
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
    
    <div class="container" style="margin-top:100px; margin-bottom:120px;">
        <div class="row">              
            <div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
            <a href="hymnsen.php">
                <div class="card hymnen">
                    <div class="card-body">
                        <h5 class="card-title">ENGLISH HYMNALS</h5>
                        <h1 class="card-subtitle"><i class="fas fa-bullhorn"></i></i></h1>
                        <p class="card-text">Dont have church hymnal? Get all CAC hymnals here, by clicking on the card.</p>
            
                        
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-6 mx-auto">
            <a href="hymnstwi.php">
                <div class="card hymntwi">
                    <div class="card-body">
                        <h5 class="card-title">TWI HYMNALS</h5>
                        <h1 class="card-subtitle"><i class="fas fa-music"></i></h1>
                        <p class="card-text">Dont have church hymnal? Get all CAC hymnals here, by clicking on the card.</p>
            
                        
                    </div>
                </div>
                </a>
            </div>

           
            
        </div>    
    </div>
    

		
</section><!--  End billboard  -->  
<?php include("includes/footer.php");?>