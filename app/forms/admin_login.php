<?php
session_start();
include('../../connection/database.php');

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username= '$user' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    $userpass = $result['password'];

    if ($result &&  $pass == password_verify($password, $userpass)) {
        $_SESSION['admin'] = $result['username'];
        header('location: ../../admin/dashboard');
    } else {
        $msg = 'Invalid username or password';
        $msg = urlencode($msg);
        header('location: ../../admin/index.php?msg=' . $msg . '');
    }
}
