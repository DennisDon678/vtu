<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

// api key
$sql = "SELECT * FROM vtu_api";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_array($query);
$api = $results['API_key'];

// site details
$sql2 = "SELECT * FROM site_settings";
$query1 = mysqli_query($conn, $sql2);
$results1 = mysqli_fetch_array($query1);
$siteName = $results1['site_name'];
$siteDescription = $results1['site_description'];


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
                <a class="navbar-brand" href="../../"><?=$siteName?><</a>
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


    <section class="container-fluid mt-5 py-5 h">
        <div class="container py-4 section bg-light enclose">


            <h3 class=" text-center">Update Website settings options</h3>
            <div class="notice">
                <p class="alert alert-success">This where you configure the name of your website and the descriptions, add details that would be nice to your users.</p>
            </div>
            <form class="text-dark" action="../../app/forms/site/site.php" method="post">
                <div class="form mb-3">
                    <label for="fullname">Site Name</label>
                    <input class="form-control" value="<?= $siteName ?>" type="text" name="site_name" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Site Description</label>
                    <textarea class="form-control" type="text" name="description" id="" required><?= $siteDescription ?></textarea>
                </div>

                <div class="form justify-content-center text-dark mb-3">
                    <input class="form-control w-50 btn adlog" type="submit" name="submit" value="Update">
                </div>
            </form>


            <h3 class=" text-center">API key set-up</h3>

            <form class="text-dark" action="../../app/forms/API/api.php" method="post">
                <div class="form mb-3">
                    <label for="fullname">API Key</label>
                    <input class="form-control" value="<?= $api ?>" type="text" name="api_key" id="" required>
                </div>
                <div class="form justify-content-center text-dark mb-3">
                    <input class="form-control w-50 btn adlog" type="submit" name="submit" value="Update">
                </div>
            </form>
        </div>

    </section>



    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>