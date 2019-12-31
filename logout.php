<?php
session_start();
session_destroy();
//code to send you to another page
header("location:home.php")
//echo '<script>window.location.href = "main.php";</script>';
?>
