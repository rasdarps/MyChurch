<?php
define("SERVER","localhost");
define("DATABASE","mychurch");
define("USER","root");
define("PASSWORD","");

//PHP code to connect Database in MySql
$conn = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
//PHP code to tell database to display a not connection error message !conn means false. It is a variable
if(!$conn){
	die("Cannot Connect To The Server");
}

//PHP code to select database from MySQL Database
$feed = mysqli_select_db($conn, DATABASE);
//PHP code to tell database to display a cannot select database error
if(!$feed){
	die("Cannot Select The Database");
}


?>
