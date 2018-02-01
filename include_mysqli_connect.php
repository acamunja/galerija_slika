<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'galerijaslika';

$connection = mysqli_connect ($servername, $username, $password, $database);

if (!$connection){
   die ("Imate problem sa konekcijom servera na bazu " . mysqli_connect_error());
}

?>