<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

$sql2 = "SELECT * FROM transactions  ORDER BY time DESC limit 10";
$query2 = mysqli_query($conn, $sql2);
$results2 = mysqli_num_rows($query2);


$sql = "SELECT * FROM deposit  ORDER BY time DESC limit 10";
$query = mysqli_query($conn, $sql);
$results = mysqli_num_rows($query);

// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
</head>

<body style="background-color: blue;">
    <section class=" section mb-5" id="dashboard">
        <nav class="navbar navbar-light bg-light  fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="../../"><?=$siteName?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li onclick="show(1)" class="nav-item">
                                <a class="nav-link active" href="../dashboard/">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../users">Users </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../transactions/">Transactions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../payment/">Payment Gateways</a>
                            </li>
                            <li onclick="show(2)" class="nav-item">
                                <a class="nav-link" href="../account">Account update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../site">Site settings </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../vtu">vtu settings </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php?action=logout">Log out</a>
                            </li>

                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="my-5">
        <div class="m-5  py-5 ">
            <div class="trans container py-4 my-4 bg-light section cardcontainer">
<div class="notice">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
        Only the first ten(10) transactions will appear here! Use the load more button to view all of each transaction.
    </div>
    
</div>
                <!-- Transactions -->
                <h3 class="text-center">Transactions History</h3>
                <?php
                if ($results2) {


                    while ($res2 = mysqli_fetch_assoc($query2)) {
                        $trans_id = $res2['trans_id'];
                        $amount2 = $res2['amount'];
                        $plan = $res2['plan_name'];
                        $network = $res2['network'];
                        $status2 = $res2['status'];
                        echo ('<div class="d-flex flex-wrap cardcontainer2 mb-3 p-2 text-dark">');
                        echo ('<div class="col-6">');
                        echo ('<h6>Account Transaction</h6>');
                        echo ('<p>Newtork: <span>' . $network . ' </span></p>');
                        echo ('<p>Plan: <span>' . $plan . ' </span></p>');
                        echo ('<p >Transaction Id: <span>' . $trans_id . ' </span></p>');
                        echo ('<p>Tranaction status: <span>' . $status2 . ' </span></p>');
                        echo ('</div>');
                        echo ('<div class="col-6 text-end">');
                        echo ('<h5 >Amount</h5>');
                        echo ('<h6 >NGN ' . $amount2 . '</h6>');
                        echo ('<a class="btn btn-primary" href="../transaction/success.php?id=' . $trans_id . '">Details</a>');
                        echo ('</div>');
                        echo ('</div>');
                    }
                } else {
                    echo ('
                                <p class="text-center text-dark mt-3"> No Transaction has been made</p>
                            ');
                }
                ?>
            </div>

            <div class="trans container py-4 my-4 bg-light section cardcontainer">

                <!-- Deposits -->
                <h3 class="text-center">Deposits History</h3>
                <?php
                if ($results) {


                    while ($res = mysqli_fetch_assoc($query)) {
                        $trans_id = $res['transaction_id'];
                        $amount = $res['amount'];
                        $status = $res['status'];
                        echo ('<div class="d-flex flex-wrap cardcontainer2 mb-3 p-2 text-dark">');
                        echo ('<div class="col-6">');
                        echo ('<h6>Account Funding</h6>');
                        echo ('<p >Transaction Id: ' . $trans_id . '</p>');
                        echo ('<p>Tranaction status: <span>' . $status . ' </span></p>');
                        echo ('</div>');
                        echo ('<div class="col-6 text-end">');
                        echo ('<h5 >Amount</h5>');
                        echo ('<h6 >NGN ' . $amount . '</h6>');
                        echo ('</div>');
                        echo ('</div>');
                    }
                } else {
                    echo ('
                                <p class="text-center text-dark mt-3"> No Transaction has been made</p>
                            ');
                }
                ?>
            </div>
        </div>
    </section>


    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>