<?php
session_start();
include('../../../connection/database.php');
$user = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE username = '$user' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
if ($result > 0) {
    $id = $result['id'];
    $email = $result['email'];
}


// submitting to database

if (isset($_POST['submit'])) {
    $depositors_name = $_POST['name'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO manual_deposits (id, depositor, email, amo) VALUES ($id, '$depositors_name', '$email', $amount)";
    $query = mysqli_query($conn,$sql);

    if ($query) {
        header('location: ../../../dashboard');
    }
}
