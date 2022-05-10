<?php
session_start();
include('../connection/database.php');
if (!isset($_SESSION['user'])) {
    header('location: ../login');
}

// users details
$current_user = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE username = '$current_user' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
if ($result > 0) {
    $id = $result['id'];
    $balance = $result['balance'];
}


// deposits
$sql = "SELECT * FROM deposit  WHERE id = '$id' ORDER BY time DESC limit 5";
$query = mysqli_query($conn, $sql);
$results = mysqli_num_rows($query);

// transactions
$sql2 = "SELECT * FROM transactions  WHERE id = '$id' ORDER BY time DESC limit 5";
$query2 = mysqli_query($conn, $sql2);
$results2 = mysqli_num_rows($query2);

// pending deposits
$sql3 = "SELECT * FROM manual_deposits where id = $id";
$query3 = mysqli_query($conn, $sql3);
$results3 = mysqli_num_rows($query3);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
    <section class="section mb-5" id="dashboard">
        <nav class="navbar navbar-light bg-light  fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="../">VTU</a>
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
                                <a class="nav-link active" aria-current="page" data-bs-target="#dashboard">Dashboard</a>
                            </li>
                            <li onclick="show(2)" class="nav-item">
                                <a class="nav-link" data-bs-target="#account">Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../app/logout.php?action=logout">Log out</a>
                            </li>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <!-- Dashboard -->
    <section class="container-fluid py-5 h bg" id="dash">
        <div class="container px-3 text-dark enclose bg-light">
            <div class="d-sm-flex justify-content-center gap-4 py-5 text-center">
                <!-- account balance -->
                <div class="col-sm-3 section cardcontainer">
                    <h2 class="ml-auto">Account Balance</h2>
                    <h3>NGN <?= $balance ?></h3>
                </div>
                <!-- Deposite -->
                <div class="col-sm-4 section cardcontainer">
                    <h2 class="ml-auto">Deposit</h2>
                    <h3 class=""><a class=" w-50 btn getStarted" href="../deposit/">Add funds</a> </h3>
                </div>
                <!-- purchase -->
                <div class="col-sm-3 section cardcontainer">
                    <h2 class="ml-auto">Perform a Tranaction</h2>
                    <h3 class=""><a class=" w-50 btn getStarted" href="../services/">Make purchase</a> </h3>
                </div>
            </div>
        </div>
        <!-- Histories -->
        <div class="trans container py-4 my-4 bg-light section cardcontainer">
            <div class="d-sm-flex flex-wrap justify-content-center gap-4">
                <!-- Transactions -->
                <div class="col-sm-5 px-3 cardcontainer ">
                    <h3 class="text-center">Transaction History</h3>
                    <?php
                    if ($results2) {


                        while ($res2 = mysqli_fetch_assoc($query2)) {

                            $amount2 = $res2['amount'];
                            $status2 = $res2['status'];
                            echo ('<div class="d-flex flex-wrap text-dark">');
                            echo ('<div class="col-sm-6">');
                            echo ('<h6>Account funding</h6>');
                            echo ('<p>Tranaction status: <span>' . $status2 . ' </span></p>');
                            echo ('</div>');
                            echo ('<div class="col-sm-6">');
                            echo ('<h6 class="text-end">NGN ' . $amount2 . '</h6>');
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

                <!-- Deposit -->
                <div class="col-sm-5 px-3 cardcontainer">
                    <h3 class="text-center">Deposit History</h3>

                    <?php
                    if ($results) {


                        while ($res = mysqli_fetch_assoc($query)) {

                            $amount = $res['amount'];
                            $status = $res['status'];
                            echo ('<div class="d-flex flex-wrap text-dark">');
                            echo ('<div class="col-sm-6">');
                            echo ('<h6>Account funding</h6>');
                            echo ('<p>Tranaction status: <span>' . $status . ' </span></p>');
                            echo ('</div>');
                            echo ('<div class="col-sm-6">');
                            echo ('<h6 class="text-end">NGN ' . $amount . '</h6>');
                            echo ('</div>');
                            echo ('</div>');
                        }
                    } else {
                        echo ('
                                <p class="text-center text-dark mt-3"> No Deposit has been made</p>
                            ');
                    }
                    ?>
                </div>

                <div class=" col-sm-5  cardcontainer ">
                    <!-- Transactions -->
                    <h3 class="text-center">Pending Deposits</h3>

                    <?php
                    if ($results3) {
                        echo ('
                    
                <div class="col-sm-10 px-2 mx-auto py-3   ">
                     ');

                        while ($result = mysqli_fetch_assoc($query3)) {
                            $id = $result['trans_id'];
                            $email = $result['email'];
                            $time = $result['time'];
                            $amount = $result['amo'];
                            $depositors_name = $result['depositor'];
                            echo ('
                    <div class="d-flex mb-3 ps-3 pt-3  text-dark">
                        <div class="col-sm-5">
                            <h6>A pending proof</h6>
                            <p>From: <span>' . $email . '</span> </p>
                            <p>Bank Name: <span>' . $depositors_name . '</span> </p>
                            <p>At: <span>' . $time . '</span> </p>
                        </div>
                        <div class="col-sm-6 text-end">
                            <h6 class="">NGN ' . $amount . '</h6>
                        </div>
                    </div>
                    ');
                        }
                    } else {
                        echo ('
                <p class="text-center text-dark mt-3"> No pending transaction </p>
                ');
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- Account -->
    <section class="container-fluid hide py-5 h bg" id="acc">
        <div class="container py-4 section bg-light enclose">
            <h3 class=" text-center">Update Account</h3>
            <form class="text-dark" action="" method="post">
                <div class="form mb-3">
                    <label for="fullname">Modify your full name</label>
                    <input class="form-control" type="text" name="fullname" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Modify your username</label>
                    <input class="form-control" type="text" name="fullname" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Modify your email</label>
                    <input class="form-control" type="text" name="fullname" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Modify your password</label>
                    <input class="form-control" type="text" name="fullname" id="" required>
                </div>

                <div class="form justify-content-center text-dark mb-3">
                    <input class="form-control w-50 btn getStarted" type="submit" name="fullname" value="Update" id="">
                </div>
            </form>
        </div>

    </section>















    <script src="../assets/js/index.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>