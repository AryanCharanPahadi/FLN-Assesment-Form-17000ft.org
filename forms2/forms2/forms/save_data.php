<?php

$servername = "localhost";
$username = "root";
$password = "";
$databaseNAme = "demo";

$conn = mysqli_connect($servername,$username,$password,$databaseNAme);

if($conn){
    // echo "Created Successfully";
}else{
    echo "Failed";
}











?>