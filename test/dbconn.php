<?php

$servername = "localhost";
$username = "Sheila";
$password = "FYPdlbs2021";
$database  = "final_year_project";

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    
	die("Connection failed: " . mysqli_connect_error());
}
?>