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
    $fullname = $result['fullname'];
    $username = $result['username'];
    $email = $result['email'];
    $balance = $result['balance'];
}


// deposits
$sql = "SELECT * FROM deposit WHERE id = '$id' ORDER BY time DESC limit 3";
$query = mysqli_query($conn, $sql);
$results = mysqli_num_rows($query);

// transactions
$sql2 = "SELECT * FROM transactions WHERE id = '$id' ORDER BY time DESC limit 3";
$query2 = mysqli_query($conn, $sql2);
$results2 = mysqli_num_rows($query2);

// pending deposits
$sql3 = "SELECT * FROM manual_deposits where id = $id ORDER BY time DESC ";
$query3 = mysqli_query($conn, $sql3);
$results3 = mysqli_num_rows($query3);

// site details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];

// notification
$notice_sql = "SELECT * FROM notification";
$notice_query = mysqli_query($conn, $notice_sql);
$notication = mysqli_fetch_array($notice_query);
$title = $notication['title'];
$message = $notication['message'];

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
                <a class="navbar-brand" href="../"><?= $siteName ?></a>
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
                            <li  class="nav-item">
                                <a class="nav-link active" href="./" aria-current="page" data-bs-target="#dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#transaction">Transactions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#deposit">Deposits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../support">Contact support</a>
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

            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
               
            ?>
                <div class="msg pt-2 text-center ">
                    <p class="alert alert-danger "><?= $msg ?></p>
                </div>
            <?php
                
            }
            ?>


            <div class="d-md-flex justify-content-center gap-4 py-5 text-center">
                <!-- account balance -->
                <div class="col-md-3 section cardcontainer">
                    <h2 class="ml-auto">Account Balance</h2>
                    <h3>NGN <?= $balance ?></h3>
                </div>
                <!-- Deposite -->
                <div class="col-md-4 section cardcontainer">
                    <h2 class="ml-auto">Deposit</h2>
                    <h3 class=""><a class=" w-50 btn getStarted" href="../deposit/">Add funds</a> </h3>
                </div>
                <!-- purchase -->
                <div class="col-md-3 section cardcontainer">
                    <h2 class="ml-auto">Perform a Tranaction</h2>
                    <h3 class=""><a class=" w-50 btn getStarted" href="../services/">Make purchase</a> </h3>
                </div>
            </div>
        </div>
        <!-- Histories -->
        <div class="trans container py-4 my-4 bg-light section cardcontainer" id="transaction">
            <div class="d-sm-flex flex-wrap justify-content-center gap-4">
                <!-- Transactions -->
                <div class="col-sm-5 px-3 cardcontainer ">
                    <h3 class="text-center">Transaction History</h3>
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
                            echo ('<h6>' . $network . ' ' . $plan . '</h6>');
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

                    <div class="more pb-3">
                        <a class="btn btn-primary" href="../transaction/">All Transaction</a>
                    </div>
                </div>

                <!-- Deposit -->
                <div class="col-sm-5 px-3 cardcontainer" id="deposit">
                    <h3 class="text-center">Deposit History</h3>

                    <?php
                    if ($results) {


                        while ($res = mysqli_fetch_assoc($query)) {
                            $trans_id = $res['transaction_id'];
                            $amount = $res['amount'];
                            $status = $res['status'];
                            echo ('<div class="d-flex cardcontainer2 mb-3 p-2 flex-wrap text-dark">');
                            echo ('<div class="col-6">');
                            echo ('<h6>Account funding</h6>');
                            echo ('<p >Transaction Id: ' . $trans_id . '</p>');
                            echo ('<p>Tranaction status: <span>' . $status . ' </span></p>');
                            echo ('</div>');
                            echo ('<div class="col-6">');
                            echo ('<h5 class="text-end">Amount</h5>');
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
                    <div class="more pb-3">
                        <a class="btn btn-primary" href="../deposit/allDeposits.php">All Deposit</a>
                    </div>
                </div>

                <div class=" col-sm-5  cardcontainer ">
                    <!-- Pending Proof -->
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
                    <div class="d-flex mb-2 p-3 cardcontainer2 text-dark">
                        <div class="col-6">
                            <h6>A pending proof</h6>
                            
                            <p>Bank Name: <span>' . $depositors_name . '</span> </p>
                            <p>At: <span>' . $time . '</span> </p>
                        </div>
                        <div class="col-6 text-end">
                        
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
            <form class="text-dark" action="../app/forms/account_update.php" method="post">
                <div class="form mb-3">
                    <label for="fullname">Modify your full name</label>
                    <input class="form-control" value="<?= $fullname ?>" type="text" name="fullname" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="username">Modify your username</label>
                    <input class="form-control" value="<?= $username ?>" type="text" name="username" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="email">Modify your email</label>
                    <input class="form-control" value="<?= $email ?>" type="text" name="email" id="" required>
                </div>

                <div class="form justify-content-center text-dark mb-3">
                    <input class="form-control w-50 btn getStarted" type="submit" name="submit" value="Update" id="">
                </div>
            </form>


            <div class="pass">
                <h3 class=" text-center">Password Reset</h3>
                <form class="text-dark" action="../app/forms/password_update.php" method="post">
                    <div class="form mb-3">
                        <label for="fullname">New password</label>
                        <input class="form-control"  type="password" name="password" id="" required>
                    </div>

                    <div class="form mb-3">
                        <label for="username">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm" id="" required>
                    </div>

                    <div class="form justify-content-center text-dark mb-3">
                        <input class="form-control w-50 btn getStarted" type="submit" name="submit" value="Update" id="">
                    </div>
                </form>
            </div>
        </div>

    </section>














    <script src="../assets/js/sweetalert/sweetalert.js"></script>
    <script src="../assets/js/index.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>



    <script>
        swal({
            title: "<?= $title ?>",
            text: "<?= $message ?>",
            button: "Continue",
        });
    </script>
</body>

</html>