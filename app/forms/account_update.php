<?php
session_start();
include('../../connection/database.php');
$user = $_SESSION['user'];

if (isset($_POST['submit'])) {
       
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql = "UPDATE 	users SET 
                                  fullname = '$fullname',
                                  username = '$username',
                                  email    = '$email'
                                  where username = '$user'";
        $query = mysqli_query($conn, $sql);

        header('location: ../../dashboard');
   
}