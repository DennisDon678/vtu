<?php
session_start();
include('../connection/database.php');
if (!isset($_SESSION['user'])) {
    header('location: ../login');
}

// Get user
$username = $_SESSION['user'];
$sql1 = "SELECT * FROM users where username = '$username' ";
$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_fetch_array($query1);
$fullname = $result1['fullname'];
$username1 = $result1['username'];
$email = $result1['email'];


// payment_gateways
$sql = "SELECT * FROM bank_account ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

if ($result) {
    $bank_name = $result['bank_name'];
    $account_name = $result['account_name'];
    $account_number = $result['account_number'];
}

// payment_gateways
$sql2 = "SELECT * FROM payment_gateways ";
$query2 = mysqli_query($conn, $sql2);
$result2 = mysqli_fetch_array($query2);

if ($result2) {
    $public_key = $result2['public_key'];
    $secret_key = $result2['secret_key'];
}

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
    <title>Deposit</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
    <section class="section mb-5" id="dashboard">
        <nav class="navbar navbar-light bg-light  fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="../"><?=$siteName?></a>
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
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../dashboard/">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../app/logout.php?action=logout">Log out</a>
                            </li>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="container-fluid  pt-5 pb-4 h bg">
        <div class="container  py-4 section bg-light enclose">
            <h3 class=" text-center">Fund wallet</h3>
            <form class="text-dark cardcontainer px-4 pt-3" action="" id="paymentForm" method="post">
                <div class="form mb-3">
                    <label for="fullname">Full name</label>
                    <input class="form-control" value="<?= $fullname ?>" type="text" name="fullname" id="first_name" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Username</label>
                    <input class="form-control" value="<?= $username1 ?>" type="text" name="username" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Email</label>
                    <input class="form-control" value="<?= $email ?>" type="text" name="email" id="email-address" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Amount</label>
                    <input class="form-control" type="Number" name="fullname" id="amount" required>
                </div>

                <div class="form justify-content-center text-dark mb-3">
                    <input onclick="payWithPaystack()" class=" form-control w-50 btn getStarted" type="submit" value="Pay with Card">
                </div>
            </form>

            <!-- Bank Transfer -->
            <div class="bank my-3 text-dark bg-light">
                <div class="details text-center">
                    <h5>Make a direct bank transfer:</h5>
                    <h6>Bank Name: <?= $bank_name ?></h6>
                    <h6>Account Number: <?= $account_number ?></h6>
                    <h6>Account Name: <?= $account_name ?></h6>
                </div>

                <div class="requestForm cardcontainer mt-3 mx-auto px-3 py-3">
                    <p>Fill in the form after payment for verification</p>
                    <form action="../app/forms/payment/manual_transfer.php" method="post">
                        <label class="ml-0" for="amount">Amount</label>
                        <input class="form-control" type="number" placeholder="Enter the amount you sent" name="amount" id="">

                        <label class="ml-0" for="amount">Senders Name</label>
                        <input class="form-control" type="text" placeholder="Enter the senders name as it appears on the account" name="name" id="" required>
                        <input class="form-control py-1 getStarted btn" type="submit" name="submit" value="Send Proof" id="">
                    </form>
                </div>
            </div>
        </div>
    </section>



    <script src=" https://js.paystack.co/v1/inline.js">
    </script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: '<?= $public_key ?>', // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                ref: 'AC-' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    window.location = "../deposit/verify_transaction.php?reference=" + response.reference;

                }
            });
            handler.openIframe();
        }
    </script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>