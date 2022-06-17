<?php
session_start();
include('../../../connection/database.php');


if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $message = $_POST['message'];
    $sql = "UPDATE notification SET title ='$title', message = '$message' where id = 1";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('location: ../../../admin/notification');
    }
}
