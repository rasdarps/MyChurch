<?php
include("includes/db_config.php");
include("includes/function.php");
session_start();

//when session starts the variable is fetched from the login page and stored in the $email variable on profile page
//$username=$_SESSION['grnma_username'];
//$user_role=$_SESSION['user_role'];

  $id=$_GET['del'];
mysqli_query($conn,"DELETE FROM welfare WHERE id='$id'");
echo '<script>
	alert("Delete Successful!");
	window.location = "sa-welfare-list.php";
    </script>';

?>
