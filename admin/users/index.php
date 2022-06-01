<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

$sql = "SELECT * FROM users ORDER BY registered_at desc";
$query = mysqli_query($conn, $sql);


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
            <div class="table-responsive enclose p-4 bg-light">
                <h4 class="text-dark text-center mb-3">Registered users</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Balance</th>
                            <th>View more</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 0;

                        while ($result = mysqli_fetch_assoc($query)) {
                            $sn++;
                            $name = $result['fullname'];
                            $email = $result['email'];
                            $balance = $result['balance'];
                            $id = $result['id'];

                            echo ('
                        <tr>
                            <td>' . $sn . '</td>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>NGN ' . $balance . '</td>
                            <td><a class=" btn btn-primary" href="./Details.php?id=' . $id . '">View Details</a></td>
                        </tr>
                           ');
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>


    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>