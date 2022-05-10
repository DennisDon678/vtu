<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];
    $username = $_POST['username'];

    $user = "SELECT * from users where username = '$username'";
    $exc = mysqli_query($conn,$user);
    $result = mysqli_fetch_assoc($exc);

    if ($result) {

        $id = $result['id'];
        $oldbalance = $result['balance'];
        $newbalance = $oldbalance + $amount;

        $sql = "UPDATE users  SET balance = $newbalance WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        header('location: ./Details.php?id=' . $id . '');
    } else {
        
    }
} else {
    header('location: ./');
}