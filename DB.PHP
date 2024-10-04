<?php 
$servername="localhost"; 
$username="root"; 
$password=""; 
$database="online_quiz"; 
$conn=mysqli_connect($servername,$username,$password,$database); 
if(mysqli_connect_error()){ 
die("database connection failed".mysqli_connect_error($conn)); 
} 
?>