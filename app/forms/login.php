<?php
session_start();
include('../../connection/database.php');

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    // $hash = hash('md5',$password,true);
    // $password = password_verify( $password , $hash );


    $sql = "SELECT * FROM users WHERE username= '$user' && password= '$password'  ";
    $query = mysqli_query($conn, $sql);
    
    if ($query) {
        $result = mysqli_fetch_array($query);
        if ($result) {
            $_SESSION['user'] = $result['username'];
            header('location: ../../dashboard'); 
        } else {
            $msg = 'Invalid username or password';
            $msg = urlencode($msg);
            header('location: ../../login/index.php?msg=' . $msg . '');
        }
       
    } else {
        echo('errror');
    }
} else {
    echo('error');
}
