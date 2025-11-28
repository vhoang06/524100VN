<?php
$server="localhost";
$username="root";
$password="";
$database="webphp";
$conn=mysqli_connect($server,$username,$password,$database);
mysqli_query($conn,'set names"utf8"');
?>