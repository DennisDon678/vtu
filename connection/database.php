<?php

$host = 'localhost';
$username = 'root';
$pass = '';
$database = 'vtu';

$conn = new mysqli($host, $username, $pass, $database);


if (!$conn) {
    echo ('An error occured while connection to database'.mysqli_error($conn));
}
?>