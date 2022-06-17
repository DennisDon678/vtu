<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

// payment_gateways
$sql2 = "SELECT * FROM payment_gateways ";
$query2 = mysqli_query($conn, $sql2);
$result2 = mysqli_fetch_array($query2);

if ($result2) {
    $public_key = $result2['public_key'];
    $secret_key = $result2['secret_key'];
}


// payment_gateways
$sql = "SELECT * FROM bank_account ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

if ($result) {
    $bank_name = $result['bank_name'];
    $account_name = $result['account_name'];
    $account_number = $result['account_number'];
}

// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];



include('../inc/header.php');
?>


    <!-- online payment-->
    <section class="container-fluid mt-5 py-5 h">
        <div class="container py-4 section bg-light enclose">
            <h3 class=" text-center">Update Payment options</h3>
            <div class="notice">
                <p class="alert alert-success">All online payment are done through paystack gatway, ensure to create an account with them.</p>
            </div>
            <form class="text-dark" action="../../app/forms/payment_gateway/gateway.php" method="post">
                <div class="form mb-3">
                    <label for="fullname">Modify your paystack secret key</label>
                    <input class="form-control" type="password" value="<?= $secret_key ?>" name="secret_key" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Modify your paystack public key</label>
                    <input class="form-control" type="text" value="<?= $public_key ?>" name="public_key" id="" required>
                </div>

                <div class="form justify-content-center text-dark mb-3">
                    <input class="form-control w-50 btn adlog" type="submit" name="submit" value="Update" id="">
                </div>
            </form>

            <h3 class=" text-center">Update Banck transfer options</h3>
            <div class="notice">
                <p class="alert alert-success">All payment made through this channel requires manual approval. Ensure to input correct bank information.</p>
            </div>
            <form class="text-dark" action="../../app/forms/payment_gateway/bank.php" method="post">
                <div class="form mb-3">
                    <label for="fullname">Account Number</label>
                    <input class="form-control" value="<?= $account_number ?>" type="text" name="ac_number" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Account Name</label>
                    <input class="form-control" value="<?= $account_name ?>" type="text" name="ac_name" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Bank Name</label>
                    <input class="form-control" value="<?= $bank_name ?>" type="text" name="bank_name" id="" required>
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