<?php
session_start();
include('../../../connection/database.php');


if (isset($_POST['submit'])) {
    $siteName = $_POST['site_name'];
    $siteDescription = $_POST['description'];

    $sql = "UPDATE site_settings SET id =1, site_name = '$siteName',site_description = '$siteDescription' ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('location: ../../../admin/site');
    }
} else {
    header('location: ../../../admin/site');
}
