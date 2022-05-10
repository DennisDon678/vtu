<?php
session_start();
include('../../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../../');
}

if (isset($_GET['id'])) {
    $trans_id = $_GET['id'];

    // delete from pending
    $sql = "DELETE FROM manual_deposits where trans_id = $trans_id";
    $query = mysqli_query($conn, $sql);

    header('location: ../');
}
