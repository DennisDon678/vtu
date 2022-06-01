<?php
session_start();
include('../../../connection/database.php');


if (isset($_POST['submit'])) {
    $api_key =$_POST['api_key'];

    $sql = "UPDATE vtu_api SET id =1, API_key = '$api_key'";
    $query = mysqli_query($conn,$sql);

    if ($query) {
        header('location: ../../../admin/site');
    }
} else {
    header('location: ../../../admin/site');
}
