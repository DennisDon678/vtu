<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}



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
                <a class="navbar-brand" href="../../">VTU</a>
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
                                <a class="nav-link" href="../logout.php?action=logout">Log out</a>
                            </li>

                    </div>
                </div>
            </div>
        </nav>
    </section>

    <!-- Dashboard -->
    <section class="container-fluid py-5 h " id="dash">
        <div class="container px-3 text-dark enclose bg-light">
            <div class="d-sm-flex  justify-content-center gap-4 py-5 text-center">
                <!-- account balance -->
                <div class="col-sm-3 section cardcontainer">
                    <h2 class="ml-auto">API Balance</h2>
                    <h3>NGN 4000</h3>
                </div>
                <!-- Deposite -->
                <div class="col-sm-4 section cardcontainer">
                    <h2 class="ml-auto">Number of users</h2>
                    <h3 class="">45 </h3>
                </div>
                <!-- purchase -->
                <div class="col-sm-4 section cardcontainer">
                    <h2 class="ml-auto">Number of Tranaction</h2>
                    <h3 class="">100</h3>
                </div>
            </div>
        </div>

        <!-- Deposit -->

        <div class="trans container py-4 my-4 bg-light section cardcontainer">
            <div class="  ">
                <!-- Transactions -->
                <h3 class="text-center">Pending Deposits</h3>
                <div class="col-sm-10 px-3 mx-auto py-3  cardcontainer ">

                    <div class="d-flex text-dark">
                        <div class="col-sm-5">
                            <h6>A pending proof</h6>
                            <p>From: <span>dennisdon678@gmail.com</span> </p>
                            <p>At: <span>2022-03-04 7:20 AM</span> </p>
                        </div>
                        <div class="col-sm-6 text-end">
                            <h6 class="">NGN 250</h6>
                            <a class="btn btn-primary" href="">Approve</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Histories -->
        <div class="trans container py-4 my-4 bg-light section cardcontainer">
            <div class="">
                <!-- Transactions -->
                <h3 class="text-center">Transaction History</h3>
                <div class="col-sm-10 px-3 mx-auto py-3 cardcontainer ">

                    <div class="d-flex pb-3 text-dark">
                        <div class="col-sm-5">
                            <h6>1Gb MTN SME data</h6>
                            <p>Tranaction status: <span>succcess</span> </p>
                        </div>
                        <div class="col-sm-6 text-end ">
                            <h6 class="">NGN 250</h6>
                            <a class="btn btn-primary" href="">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>