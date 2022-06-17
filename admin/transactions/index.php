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


include('../inc/header.php');
?>



<section class="my-5">
    <div class="mt-5 container py-5 ">
        <div class="trans container py-4 my-4 bg-light section cardcontainer">

            <div class="container">

                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="col-md-6">

                        <div class="form">
                            <form class="d-flex align-items-center" action="" method="get">
                                <input type="text" name="id" class="form-control form-input me-1" placeholder="Search Transaction by Id...">
                                <button class="btn btn-primary mb-2" type="submit"> <i class="fa fa-search " name="submit"></i></button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <div class="notice">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    Only the first ten(10) transactions will appear here! Use the load more button to view all of each transaction.
                </div>

            </div>
            <!-- Transactions -->
            <h3 class="text-center">Transactions History</h3>
            <?php

            if (!isset($_GET['id'])) {
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
                        echo ('<a class="btn btn-primary" target="blank" href="../../transaction/success.php?id=' . $trans_id . '">Details</a>');
                        echo ('</div>');
                        echo ('</div>');
                    }
                } else {
                    echo ('
                                <p class="text-center text-dark mt-3"> No Transaction has been made</p>
                            ');
                }
            } else {
                $id = $_GET['id'];
                $sql2 = "SELECT * FROM transactions where trans_id = '$id' ORDER BY time DESC limit 10";
                $query2 = mysqli_query($conn, $sql2);
                $results2 = mysqli_num_rows($query2);
                $res2 = mysqli_fetch_assoc($query2);

                if ($results2 > 0) {
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
                    echo ('
                     <a class="btn btn-primary" href="./">All Transaction</a>
                    ');
                } else {
                    echo ('
                    <p class="text-center text-dark mt-3"> Transaction was not found on this server</p>
                     <a class="btn btn-primary" href="./">All Transaction</a>
                    ');
                }
            }
            ?>
        </div>

        <div class="trans container py-4 my-4 bg-light section cardcontainer">

            <div class="container">

                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="col-md-6">

                        <div class="form">
                            <form class="d-flex align-items-center" action="" method="get">
                                <input type="text" name="deposit" class="form-control form-input me-1" placeholder="Search Transaction by Id...">
                                <button class="btn btn-primary mb-2" name="submit"> <i class="fa fa-search " name="submit"></i></button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Deposits -->
            <h3 class="text-center">Deposits History</h3>
            <?php
            if (!isset($_GET['deposit'])) {
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
            } else {
                $deposit = $_GET['deposit'];
                $sql = "SELECT * FROM deposit where transaction_id = '$deposit' ORDER BY time DESC limit 10";
                $query = mysqli_query($conn, $sql);
                $results = mysqli_num_rows($query);

                if ($results > 0) {
                    $res = mysqli_fetch_assoc($query);
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
                    echo ('
                                 <a class="btn btn-primary" href="./">All Transaction</a>
                            ');
                } else {
                    echo ('
                                <p class="text-center text-dark mt-3"> Transaction was not found on this server</p>
                                 <a class="btn btn-primary" href="./">All Transaction</a>
                            ');
                }
            }
            ?>
        </div>
    </div>
</section>


<script src="../../assets/js/index.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>