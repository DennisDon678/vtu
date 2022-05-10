<?php
/*
---------------------------------------------------------------------------------
| # First we establishes a session check to see if a user is an admin
| # We establish from the deposit table if any deposit has been made that awaits   | approval
| # We check out the transactions table to display all transaction from the users 
| # We obtain from the users table the total balance of users
| # Query your API to obtain the balance on your wallet balance
| # Obtain the number of registerd users
---------------------------------------------------------------------------------
*/


// Session check
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}


// pending deposit

$sql = "SELECT * FROM manual_deposits ";
$query = mysqli_query($conn, $sql);
$results = mysqli_num_rows($query);

// transactions
$sql2 = "SELECT * FROM transactions    limit 10";
$query2 = mysqli_query($conn, $sql2);
$results2 = mysqli_num_rows($query2);

// Customers Balance
$stm = "SELECT SUM(balance) from users";
$Customers_balance = mysqli_query($conn, $stm);

while ($ress = mysqli_fetch_array($Customers_balance)) {
    $Cbalance = $ress['SUM(balance)'];
}

// number of users
$users = "SELECT * from users";
$exc = mysqli_query($conn,$users);
$return = mysqli_num_rows($exc);

// API Query for balance

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://halleldatang.com/api/user/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Token b5b7fd471655bba431c9b9a0084a2aae7cf52b1f',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

if ($response) {
    curl_close($curl);
    urldecode($response);
    $arry = json_decode($response, true);
    $balance = $arry['user']['Account_Balance'];
} else {
    $balance = '<br>
    <p class="text-dark">
    Unable to connect with your API 
    <br>
    check your Internet connection
    </p>';
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
            <div class="d-sm-flex align-items-center justify-content-center gap-4 py-5 text-center">
                <!-- account balance -->
                <div class="col-sm-3 section cardcontainer">
                    <h2 class="ml-auto">API Balance</h2>
                    <h3>NGN <?=$balance?></h3>
                </div>
                <!-- Deposite -->
                <div class="col-sm-4 section cardcontainer">
                    <h2 class="ml-auto">Number of users</h2>
                    <h3 class=""><?=$return?> </h3>
                </div>
                <!-- purchase -->
                <div class="col-sm-4 section cardcontainer">
                    <h2 class="ml-auto">Customers Balance</h2>
                    <h3 class="">NGN <?= $Cbalance?></h3>
                </div>
            </div>
        </div>

        <!-- Deposit -->

        <div class="trans container py-4 my-4 bg-light section cardcontainer">
            <div class="  ">
                <!-- Transactions -->
                <h3 class="text-center">Pending Deposits</h3>

                <?php
                if ($results) {
                    echo ( '
                    
                <div class="col-sm-10 px-3 mx-auto py-3   ">
                     ');

                    while ($result = mysqli_fetch_assoc($query)) {
                    $id = $result['trans_id'];
                    $email = $result['email'];
                    $time = $result['time'];
                    $amount = $result['amo'];
                    $depositors_name = $result['depositor'];
                    echo ('
                    <div class="d-flex mb-3 ps-3 pt-3 cardcontainer text-dark">
                        <div class="col-sm-5">
                            <h6>A pending proof</h6>
                            <p>From: <span>' . $email .'</span> </p>
                            <p>Bank Name: <span>' . $depositors_name . '</span> </p>
                            <p>At: <span>' . $time . '</span> </p>
                        </div>
                        <div class="col-sm-6 text-end">
                            <h6 class="">NGN ' . $amount . '</h6>
                            <a class="btn mb-2 btn-primary" href="./approve/approve.php?id=' . $id .'">Approve</a>
                            <br>
                            <a class="btn mb-2 btn-danger" href="./reject/reject.php?id=' . $id . '">Reject</a>

                        </div>
                    </div>
                    ');
                    }
                }else {
                    echo ('
                <p class="text-center text-dark mt-3"> No pending transaction </p>
                ');
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Histories -->
        <div class="trans container py-4 my-4 bg-light section cardcontainer">
            <div class="">
                <!-- Transactions -->
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
        </div>
    </section>







    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>