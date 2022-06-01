<?php
session_start();
include('../../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

if (isset($_POST['submit'])) {
    $mtnsme = $_POST['mtnsme'];
    $mtn500 = $_POST['mtn500'];
    $airtelsme = $_POST['airtelsme'];
    $airtel500 = $_POST['airtel500'];
    $g1 = $_POST['g1'];
    $g2 = $_POST['g2'];
    $g3 = $_POST['g3'];
    $g4 = $_POST['g4'];
    $g5 = $_POST['g5'];
    $g6 = $_POST['g6'];
    $m1 = $_POST['m1'];
    $m2 = $_POST['m2'];
    $m3 = $_POST['m3'];
    $m4 = $_POST['m4'];
    $m5 = $_POST['m5'];
    $m6 = $_POST['m6'];

    $sql = "UPDATE 	price_list SET id = 1 ,
                                    mtn =  $mtnsme ,
                                    mtn500 =  $mtn500 ,
                                    airtel = $airtelsme ,
                                    airte = $airtel500 ,
                                    g1 =$g1 ,
                                    g2 =$g2 ,
                                    g3 =$g3 ,
                                    g4 =$g4 ,
                                    g5 =$g5 ,
                                    g6 =$g6 ,
                                    m1 =$m1 ,
                                    m2 =$m2 ,
                                    m3 =$m3 ,
                                    m4 =$m4 ,
                                    m5 =$m5 ,
                                    m6 =$m6 ";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('location: ../../../admin/vtu');
    }
}
