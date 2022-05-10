<?php
session_start();
include('../../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../../');
}

if (isset($_GET['id'])) {
    $trans_id = $_GET['id'];
    
    $sql = "SELECT * FROM manual_deposits WHERE trans_id = $trans_id";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);

    $name = $result['depositor'];
    $status = 'successs';
    $email = $result['email'];
    $amount = $result['amo'];
    $id = $result['id'];
    $rad = rand(0,999999999);
    $ref = 'AC-' .$rad + 3;


    // insert to deposit
    $sql = "INSERT INTO deposit (id, status, depositors_email, amount, transaction_id)             
     VALUES ($id,'$status', '$email', $amount, '$ref');";
    $query = mysqli_query($conn, $sql);


    // Get user
    $sql = "SELECT * FROM users WHERE id = $id ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    if ($result > 0) {
        $oldBalance = $result['balance'];
    }
    // update amount
    $newBalance = $oldBalance + $amount;
    $sql = "UPDATE users  SET balance = $newBalance WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    // delete from pending
    $sql = "DELETE FROM manual_deposits where trans_id = $trans_id";
    $query = mysqli_query($conn, $sql);

    header('location: ../');
    
}