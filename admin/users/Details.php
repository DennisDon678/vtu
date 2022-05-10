<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $count = mysqli_num_rows($query);

    if ($count == 1) {

        $fullname = $result['fullname'];
        $username = $result['username'];
        $email = $result['email'];
        $balance = $result['balance'];
        $registered_at = $result['registered_at'];
        $fullname = $result['fullname'];
    } else {
        header('location: ./');
    }
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

    <!-- User card info -->
    <section>
        <div class="my-5 pt-4">
            <div class="container mt-4 enclose p-4 bg-light">
                <h5 class="text-center mb-3 section">User informations</h5>
                <div class="content gap-4 justify-content-center d-md-flex flex-wrap">
                    <div class="col-md-5 p-3 cardcontainer">
                        <h5>Registration Details</h5>
                        <div class="name mb-2 ps-3">
                            <h6>Users Fullname: <span><?= $fullname ?></span></h6>
                        </div>
                        <div class="username mb-2 ps-3">
                            <h6>Users username: <span><?= $username ?></span></h6>
                        </div>
                        <div class="email mb-2 ps-3">
                            <h6>Users email: <span><?= $email ?></span></h6>
                        </div>
                        <div class="registered_at mb-2 ps-3">
                            <h6>Registration Date: <span><?= $registered_at ?></span></h6>
                        </div>
                    </div>

                    <div class="col-md-5 p-3 cardcontainer">
                        <h5>Finacial Details</h5>
                        <div class="balance mb-3 ps-3">
                            <h6>Users Account Balance: <span> NGN <?= $balance ?></span></h6>
                        </div>
                        <h5>Finacial Operations</h5>
                        <p class="alert alert-success">This will alter the users transaction details.</p>
                        <div class="operations d-flex gap-3 mb-2 ps-3">
                            <a class="btn btn-primary" href="./FundUser.php?id=<?= $id ?>">Fund User</a>
                            <a class="btn btn-danger" href="./DebitUser.php?id=<?= $id ?>">Debit User</a>
                        </div>
                    </div>

                    <div class="col-md-5 p-3 cardcontainer">
                        <h5>General Operations</h5>
                        <p class="alert alert-success"> Here you can change users details</p>
                        <div class="operations d-flex gap-3 mb-2 ps-3">
                            <a class="btn btn-danger" href="./DeleteUser.php?id=<?= $id ?>">Delete User</a>
                        </div>
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