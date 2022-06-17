<?php
session_start();
include('../../../connection/database.php');


if (isset($_POST['submit'])) {

    $tel =$_POST['tel'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $street_num =$_POST['street_num'];
    $street_name =$_POST['Street_name'];
    $town =$_POST['town'];
    $sql = "UPDATE contact SET phone ='$tel', email = '$email', whatsapp = '$whatsapp', street_number = '$street_num', street_name = '$street_name', town = '$town' where id = 1";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('location: ../../../admin/site');
    }
} else {
    header('location: ../../../admin/site');
}
