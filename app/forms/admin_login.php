<?php
session_start();
include('../../connection/database.php');

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username= '$user' && password= '$password'  ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $result = mysqli_fetch_array($query);
        if ($result) {
            $_SESSION['admin'] = $result['username'];
            header('location: ../../admin/dashboard');
        } else {
            echo ('errror');
        }
    } else {
        echo ('errror');
    }
} else {
    echo ('error');
}
