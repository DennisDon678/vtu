<?php
session_start();
include('../../connection/database.php');

if (isset($_POST['submit']) && isset($_POST['checkbox'])) {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_verify = mysqli_real_escape_string($conn, $_POST['password_verify']);
    $balance = 0;


    if ($fullname && $username && $email && $password && $password_verify) {
        $sql = "SELECT * from users where username = '$username'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query);


        if (!$result) {
            $sql2 = "SELECT * from users where email = '$email'";
            $query2 = mysqli_query($conn, $sql2);
            $result2 = mysqli_fetch_array($query2);

            if (!$result2) {
                if ($password === $password_verify) {
                    $password = password_hash( $password, PASSWORD_DEFAULT);
                    $sql3 = "INSERT INTO users ( fullname, username, email, password, balance)
                                            
                                                                    VALUES ( '$fullname', '$username', '$email', '$password', $balance);";
                    $query3 = mysqli_query($conn, $sql3);
                    $_SESSION['user'] = $username;
                    if ($query) {
                        header('location: ../../dashboard');
                    } else {
                    }
                } else {
                    $msg = 'Password needs to be the same';
                    header('location: ../../register/index.php?msg=' . $msg . '');
                }
            } else {
                $msg = 'Email is already taken';
                $msg = urlencode($msg);
                header('location: ../../register/index.php?msg=' . $msg . '');
            }
        } else {
            $msg = 'Username is already taken';
            $msg = urlencode($msg);
            header('location: ../../register/index.php?msg=' . $msg . '');
        }
    } else {
        $msg = 'Form field cannot be empty';
        $msg = urlencode($msg);
        header('location: ../../register/index.php?msg=' . $msg . '');
    }
} else {
    $msg = 'Agree to our terms and conditions';
    $msg = urlencode($msg);
    header('location: ../../register/index.php?msg=' . $msg . '');
}
