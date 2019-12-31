<?php
include("includes/db_config.php");
include("includes/function.php");
session_start();

  $id=$_GET['del'];
mysqli_query($conn,"DELETE FROM messages WHERE id='$id'");
echo '<script>
	alert("Delete Successful!");
	window.location = "sa-inbox.php";
    </script>';

?>
