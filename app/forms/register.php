<?php
session_start();
include('../../connection/database.php');

if (isset($_POST['submit']) && $_POST['checkbox'] === 'on') {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_verify = mysqli_real_escape_string($conn, $_POST['password_verify']);
    $balance = 0;


    if ($fullname && $username && $email && $password && $password_verify) {

        if ($password === $password_verify) {

            $sql = "INSERT INTO users ( fullname, username, email, password, balance)
        
                                 VALUES ( '$fullname', '$username', '$email', '$password', $balance);";
            $query = mysqli_query($conn, $sql);
            $_SESSION['user'] = $username;
           if ($query) {
               header('location: ../../dashboard');
           } else{

           }
        } else {
            echo('error');
        }
    } else {
        echo ('empty input');
    }
} else {
    echo ('no');
}
