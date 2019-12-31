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

.jumbotron{
    color:#fff;
    margin-top:10px;
    padding-top:50px;
    background:#00324E;
    /*background: url(images/bg.jpg) no-repeat;*/
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover; 
}

/*HOVER TEXT*/



   
   /*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
    .card{
    width: 15rem;
    }
   

}

@media (max-width: 576px) {
    .card{
    width: 15rem;
    }

    body{
  background:url(images/headbg.jpg) center no-repeat !important;
  
}
    


}

</style>
<section>
    
    <div class="container" style="margin-bottom:280px; margin-top:30px;">
    
        <center>
        <h3 style="margin-bottom:20px;">SEARCH BIBLE</h3>
        </center>
            <div class="col-md-5 mx-auto">
           
               <script id="bw-widget-src" src="//bibles.org/widget/client"></script>
                    <script>
                    BIBLESEARCH.widget({
                        "versions": "eng-KJV"
                    });
                    </script>
            </div>         
        
    </div>
    

		
</section><!--  End billboard  -->  
<?php //include("includes/formfooter.php");?>
</body>
</html>