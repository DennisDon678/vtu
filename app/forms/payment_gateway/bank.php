<?php
session_start();
include('../../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

if (isset($_POST['submit'])) {
    $bank_name = $_POST['bank_name'];
    $account_name = $_POST['ac_name'];
    $account_number = $_POST['ac_number'];

    $sql = "UPDATE bank_account SET id =1, bank_name='$bank_name',account_name='$account_name', account_number = $account_number WHERE 1";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('location: ../../../admin/payment');
    }
}
