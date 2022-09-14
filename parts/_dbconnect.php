<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "lms";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection to database failed due to :".mysqli_connect_error());
}
?>