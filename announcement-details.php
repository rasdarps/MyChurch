<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 
 //print_r ($_SESSION);
 if(isset($_GET["id"])){
    $id = $_GET["id"];

    //php code to select data from uploads table in the database and put at the detail page
    $feed = mysqli_query($conn, "select * from post where id = '$id'");
    while ($row = mysqli_fetch_assoc($feed)){
        $posttitle = $row["posttitle"];
        $date = $row["postdate"];
        $category = $row["category"];
        $image = $row["img"];
        $post = $row["post"];
        $username = $row["username"];

    }
//php code to terminate page when the id is null
}else{
   // header("location:announcement.php");
    //die("Cannot Find id!");
echo '<script>window.location.href = "announcement.php";</script>';

}

 ?>
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
		<div class="col-md-8">
			<div class="card" style="border:none !important;">
				<img src="post_images/<?php echo $image; ?>" class="card-img-top" alt="postimg" height="350px">
			</div>
            <div class="card-body" style="background:#fff;">
				<h2 class="card-title" style="color:#00324E !important;"><?php echo $posttitle; ?></h2>
					<p class="card-text" style="font-size:18px;">
						<span style="margin-right:5px;"><small class="text-muted"><i class="fas fa-user" style="color:#00324E;"></i> <?php echo $username; ?></small></span>
						<span style="margin-right:5px;"><small class="text-muted"><i class="far fa-clock" style="color:#00324E;"></i> <?php echo date('d-m-Y', strtotime($date)); ?></small></span>
						<span><small class="text-muted"><i class="fas fa-folder-open" style="color:#00324E;"></i> <?php echo $category; ?></small></span>
                    </p>
                    <p class="card-text">
                    <?php echo $post; ?>
                    </p>
            </div>

	    </div>



		<div class="col-md-4" style="background:#fff; padding:5px; border: 1px solid #eee;">

			<div class="msg-box">
					<center><h3 style="text-align:left; border-bottom: 1px solid #eee; margin-bottom:-25px;">
						Recent Announcement</h3>
					</center>
      </div>

						<?php
									if(isset($_GET["cat"])){
										$catt= $_GET["cat"];
										$data = mysqli_query($conn, "select * from post where category ='$catt'");
									}

									else{
										$data = mysqli_query($conn, "SELECT * from post ORDER BY post.postdate DESC");
									}
									//Php code to select data from upload folder in our website folder

									echo '<div class="container padding" style="margin-top:30px;">
												<div class="row padding">
													<table>';
									$counter = 0;
									//code to check rows in database
									if(mysqli_num_rows($data) < 1 ){
									echo "No Data Found Under Selected Category!";
									}else
										while($row = mysqli_fetch_assoc($data)){
												if($counter >=2){
												$counter = 0;
												echo '</tr>';
											}

											if($counter == 0){
												echo '<tr>';

											}

										echo
											'<div class="col-md-12" style="margin-top:5px">
															<a href="announcement-details.php?id='.$row["id"].'" style="text-decoration:none; color:#0D6F03  !important; marging:10px !important;">
			                            <div class="">
																	  <img src="post_images/'.$row["img"].'" alt="post image" width="100px"/>
																	</div>
																	<div class="">
																   <h5 style="border-bottom: 1px solid #eee;">'.$row["posttitle"].'</h5>
																	</div>
															</a>

											</div>';
											$counter = $counter + 1;
									}
									echo '</table>
												</div>
												</div>';

						?>

		</div>
    </div>
  </div>

<?php include("includes/footer.php");?>