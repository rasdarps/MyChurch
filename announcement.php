<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 
 //print_r ($_SESSION);
 

 ?>
<?php include("includes/nav-header.php");?> 

<?php
$result=mysqli_query($conn,"SELECT * FROM post ORDER BY post.postdate DESC");

while ($retrieve = mysqli_fetch_assoc($result))
{
//column Name in database
$id = $retrieve["id"];
$posttitle = $retrieve["posttitle"];
$date = $retrieve["postdate"];
$category = $retrieve["category"];
$image = $retrieve["img"];
$post = $retrieve["post"];
$username = $retrieve["username"];

?>

<style>
 body{
   
  
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
<section>
    
    <div class="container" style="margin-bottom:50px; margin-top:50px;">
        <div class="row">
            
        <div class="col-md-4">
					<img src="post_images/<?php echo $image; ?>" class="card-img" alt="post image">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<a href="announcement-details.php?id=<?php echo $id;?>">
						<h5 class="card-title"><?php echo $posttitle; ?></h5>
						</a>
						<p class="card-text"><?php echo substr($post,0,200);?>.....<a href="announcement-details.php?id=<?php echo $id;?>"><br><br><button id="ctn-btn" class="btn btn-outline-success">Read More</button></a></p>
						<p class="card-text">
						<span><small class="text-muted"><i class="fas fa-user" style="color:#00324E;"></i> <?php echo $username; ?></small></span>
						<span><small class="text-muted"><i class="far fa-clock" style="color:#00324E;"></i> <?php echo date('d-m-Y', strtotime($date)); ?></small></span>
						<span><small class="text-muted"><i class="fas fa-folder-open" style="color:#00324E;"></i> <?php echo $category; ?></small></span>
						</p>
					</div>
				</div>
            
        </div>    
    </div>
</section><!--  End billboard  --> 

<?php
}


?> 
<?php include("includes/footer.php");?>