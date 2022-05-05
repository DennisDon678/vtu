<?php
session_start();
include('../../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

if (isset($_POST['submit'])) {
    $secret = $_POST['secret_key'];
    $public = $_POST['public_key'];

    $sql = "UPDATE payment_gateways SET id =1, secret_key='$secret',public_key='$public' WHERE 1";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('location: ../../../admin/payment');
    }
}