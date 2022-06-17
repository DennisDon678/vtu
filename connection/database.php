<?php

$host = 'localhost';
$username = 'root';
$pass = '';
$database = 'vtu';

$conn = mysqli_connect($host, $username, $pass, $database);


if (mysqli_error($conn)) {
    header('location: ./welcome');
}

?>