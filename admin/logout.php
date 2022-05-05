<?php
session_start();
$val = $_GET['action'];
if (!empty($val)) {
    if (isset($_SESSION['admin'])) {
        session_unset();
        header('location: ./');
    } else {
        echo ('error');
    }
}
