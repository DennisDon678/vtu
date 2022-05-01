<?php
session_start();
$val = $_GET['action'];
if (!empty($val)) {
    if (isset($_SESSION['user'])) {
        session_unset();
        header('location: ../login');
    }else {
        echo('error');
    }
}
