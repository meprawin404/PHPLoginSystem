<?php

$server = "localhost";
$userName = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($server, $userName, $password, $database);

if(!$conn){
    die("error".mysqli_connect_error());
}

// echo "success";

?>