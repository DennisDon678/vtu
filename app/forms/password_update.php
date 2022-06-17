<?php
session_start();
include('../../connection/database.php');
$user = $_SESSION['user'];

if (isset($_POST['submit']) && $_POST['password']===$_POST['confirm']) {
    $pass = $_POST['password'];
    $password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "UPDATE users set password = '$password' where username = '$user'";
    $query = mysqli_query($conn,$sql);
    header('location: ../../dashboard');
} else {
    $msg = "Password reset failed";
    header('location: ../../dashboard?msg='.$msg.'');
}
