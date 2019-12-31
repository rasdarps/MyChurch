<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 
 //print_r ($_SESSION);
 if(isset($_GET["id"])){
    $id = $_GET["id"];

    //php code to select data from uploads table in the database and put at the detail page
    $feed = mysqli_query($conn, "SELECT * FROM hymns where id = '$id'");
    while ($row = mysqli_fetch_assoc($feed)){
        $title = $row["title"];
        $hymn = $row["hymn"];
       

    }
//php code to terminate page when the id is null
}else{
    header("location:post.php");
    //die("Cannot Find id!");
//echo '<script>window.location.href = "post.php";</script>';

}

 ?>
 <title>HYMN DETAILS</title>
<?php include("includes/nav-header.php");?> 

<style>
 body{
  background: url(images/logobg.png) repeat fixed;
  
}

#ctn-btn{
    border-color:#00324E !important;
    color:#00324E !important;
}

#ctn-btn:hover{
    background:#00324E !important;
    color:#fff !important;
}
   
   /*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
    

}

@media (max-width: 576px) {
   

}

</style>
<div class="container padding" style="margin-bottom:50px; margin-top:50px;">
	<div class="row padding">
		<div class="col-md-6 mx-auto">
			<div class="card" style="border:none !important;">
            
			</div>
            <div class="card-body" style="background:#fff;">
				<h2 class="card-title" style="color:#00324E !important; text-align:center;"><?php echo $title; ?></h2>
                    <p class="card-text" style="text-align:justify!important;">
                    <?php echo $hymn; ?>
                    </p>
            </div>

	    </div>
    </div>
</div>

<?php include("includes/footer.php");?>