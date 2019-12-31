<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 //Calling logged function to prevent user from accessing profile page if logged out
if(!isset($_SESSION['username']) || $_SESSION['user_role']!='sa')
{
    echo '<script>
	alert("Log In To access page!");
	window.location = "login.php";
	</script>';
  //header("Location:staff-login.php");
  //echo '<script>window.location.href = "admin.php";</script>';
}

//when session starts the variable is fetched from the login page and stored in the $email variable on profile page
$username=$_SESSION['username'];
$user_role=$_SESSION['user_role'];

//Select statement to query details of logged in account from the database
$result=mysqli_query($conn,"SELECT id,fullname,username,user_role,img FROM users WHERE username='$username' AND user_role='$user_role'");

//Data is fetched from the database When username matches entered matches any of the emails in the database
$retrieve=mysqli_fetch_array($result);

//print_r($retrieve);

//TO SEARCH AND SHOW NUMBER OF USERS
$result3=mysqli_query($conn,"SELECT id FROM post");
$row2=mysqli_num_rows($result3);

//This id will show who is logged in and will allow the user to edit his profile or change password
    $id=$retrieve['id'];
    $fullname=$retrieve['fullname'];
	$username=$retrieve['username'];
	$image=$retrieve['img'];
	$user_role=$retrieve['user_role']
	
	

 ?>

 <?php
 
   

  ?>
  <title>Member Profile</title>
<?php include("includes/sa-header.php");?>
<style>
body{
        background: url(images/logobg.png) repeat fixed;
  
}

#ctn-btn{
    background-color:#fff !important;
    color:#460322 !important;
	border-color:#460322;
}

#ctn-btn:hover{
    background:#460322 !important;
    color:#fff !important;
}

.jumbotron{
    color:#fff;
    font-weight:bold;
    margin-top:10px;
    padding-top:10px;
    background:#460322;
    /*background: url(images/bg.jpg) no-repeat;*/
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover; 
}



@media (max-width: 575px) {
  
}

@media (max-width: 767px) {
  
}

@media (max-width: 991px) {
 
}

@media (max-width: 1199px) {
  
}
</style> 
<div class="container" style="margin-bottom:20px;">
    <div class="col-md-4" style="margin-top:20px;">
        <h4>POSTS </h4>
		
		<a href="sa-post-new.php"><button id="ctn-btn" class="btn btn-success">Add New</button></a>
		
        <h5 style="color:red;">Total Posts (<?php echo $row2; ?>)</h5>
    </div>
</div>

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
<div class="container">

		<div class="card mb-3" style="">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="post_images/<?php echo $image; ?>" class="card-img" alt="post image">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<a href="announcement-details.php?id=<?php echo $id?>">
						<h5 class="card-title"><?php echo $posttitle; ?></h5>
						</a>
						<p class="card-text"><?php echo substr($post,0,200); ?>.....<a href="announcement-details.php?id=<?php echo $id;?>"><br><br><button id="ctn-btn" class="btn btn-outline-success">Read More</button></a></p>
						<p class="card-text">
						<span><small class="text-muted"><i class="fas fa-user" style="color:#460322;"></i> <?php echo $username; ?></small></span>
						<span><small class="text-muted"><i class="far fa-clock" style="color:#460322;"></i> <?php echo date('d-m-Y', strtotime($date)); ?></small></span>
						<span><small class="text-muted"><i class="fas fa-folder-open" style="color:#460322;"></i> <?php echo $category; ?></small></span>
						</p>
                         
					     	<p class="card-text">
							<span style="margin-right:10px !important;"><a href="sa-post-edit.php?id=<?php echo $id;?>">Edit</a></span>
							<span style="margin-right:10px !important;"><a href="sa-post-del.php?del=<?php echo $id;?>">Delete</a></span>
						  </p>
						
					</div>
				</div>
			</div>
		</div>
</div>
<?php


}
?>

 <!-- /.container -->
 <?php include("includes/footer.php");?>