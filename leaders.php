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

/*HOVER TEXT*/



   
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
    <center>
    <h3 style="margin-bottom:20px;">ABOUT THE CHURCH LEADERSHIP</h3>
    </center>
        <div class="row">

            <div class="col-md-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="images/pastor.png" class="card-img-top" alt="...">
                    <div class="card-body">
                     <h5 class="card-title">Rev Lorem Ipsum</h5>
                     <h5 class="card-title">Resident Pastor</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="images/woman.png" class="card-img-top" alt="...">
                    <div class="card-body">
                     <h5 class="card-title">Deaconess lorem Ipsum</h5>
                     <h5 class="card-title">women fellowship Leader</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
              
            <div class="col-md-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="images/chris.png" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Pastor Chris</h5>
                     <h5 class="card-title">Pastor</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="images/pastor.png" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Elder lorem Ipsum</h5>
                     <h5 class="card-title">Church Administrator</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="images/pastor2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Elder lorem Ipsum</h5>
                     <h5 class="card-title">Church Secretary</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="images/pastor.png" class="card-img-top" alt="...">
                    <div class="card-body">
                     <h5 class="card-title">Mr Lorem Ipsum</h5>
                     <h5 class="card-title">Youth Secretary</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="images/pastor2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                     <h5 class="card-title">Mr Lorem Ipsum</h5>
                     <h5 class="card-title">Music Director</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            
        </div>    
    </div>
    

		
</section><!--  End billboard  -->  
<?php include("includes/footer.php");?>