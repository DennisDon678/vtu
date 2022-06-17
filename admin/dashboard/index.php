<?php

// Session check
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}


// pending deposit

$sql = "SELECT * FROM manual_deposits ";
$query = mysqli_query($conn, $sql);
$results1 = mysqli_num_rows($query);

// transactions
$sql2 = "SELECT * FROM transactions    limit 10";
$query2 = mysqli_query($conn, $sql2);
$results2 = mysqli_num_rows($query2);

// Customers Balance
$stm = "SELECT SUM(balance) from users";
$Customers_balance = mysqli_query($conn, $stm);

// users
$sql6 = "SELECT * FROM users";
$query6 = mysqli_query($conn,$sql6);
$count = mysqli_num_rows($query6);
if ($count>0) {
while ($ress = mysqli_fetch_array($Customers_balance)) {
   
    $Cbalance = $ress['SUM(balance)'];  
}
} else {
    $Cbalance = 0;
}

// number of users
$users = "SELECT * from users";
$exc = mysqli_query($conn, $users);
$return = mysqli_num_rows($exc);

// API Query for balance
// API key

$sql1 = "SELECT * FROM vtu_api";
$query1 = mysqli_query($conn, $sql1);
$results = mysqli_fetch_array($query1);
$api = $results['API_key'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://legitdata.com.ng/api/user/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Token ' . $api . '',
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

// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];



// Notification
$sql5 = "SELECT * FROM admin_notification";
$query5 = mysqli_query($conn,$sql5);
$num = mysqli_num_rows($query5);

include('../inc/header.php');
?>




<!-- Dashboard -->
<section class="container-fluid py-5 h " id="dash">
    <div class="container px-3 text-dark enclose bg-light">
        <div class="d-sm-flex align-items-center justify-content-center gap-4 py-5 text-center">
            <!-- account balance -->
            <div class="col-sm-3 section cardcontainer">
                <h2 class="ml-auto">API Balance</h2>
                <h3>NGN <?= $balance ?></h3>
            </div>
            <!-- Deposite -->
            <div class="col-sm-4 section cardcontainer">
                <h2 class="ml-auto">Number of users</h2>
                <h3 class=""><?= $return ?> </h3>
            </div>
            <!-- purchase -->
            <div class="col-sm-4 section cardcontainer">
                <h2 class="ml-auto">Customers Balance</h2>
                <h3 class="">NGN <?= $Cbalance ?></h3>
            </div>
        </div>
    </div>

    <!-- Deposit -->

    <div class="trans container py-4 my-4 bg-light section cardcontainer">
        <div class="  ">
            <!-- Transactions -->
            <h3 class="text-center">Pending Deposits</h3>

            <?php
            if ($results1) {
                echo ('
                    
                <div class=" px-3 mx-auto py-3   ">
                     ');

                while ($result = mysqli_fetch_assoc($query)) {
                    $id = $result['trans_id'];
                    $email = $result['email'];
                    $time = $result['time'];
                    $amount = $result['amo'];
                    $depositors_name = $result['depositor'];
                    echo ('
                    <div class="d-flex mb-3 p-3 gap-2 cardcontainer text-dark">
                        <div class="col-6">
                            <h6>A pending proof</h6>
                            <p>From: <span>' . $email . '</span> </p>
                            <p>Bank Name: <span>' . $depositors_name . '</span> </p>
                            
                        </div>
                        <div class="col-6 text-end">
                            <h6 class="">NGN ' . $amount . '</h6>
                            <a class="btn mb-2 btn-primary" href="./approve/approve.php?id=' . $id . '">Accept</a>
                            <br>
                            <a class="btn mb-2 btn-danger" href="./reject/reject.php?id=' . $id . '">Reject</a>

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
    <!-- Histories -->
    <div class="trans container py-4 my-4 bg-light section cardcontainer">
        <div class="">
            <!-- Transactions -->
            <h3 class="text-center">Transaction History</h3>
            <?php
            if ($results2) {


                while ($res2 = mysqli_fetch_assoc($query2)) {
                    $trans_id = $res2['trans_id'];
                    $amount2 = $res2['amount'];
                    $plan = $res2['plan_name'];
                    $network = $res2['network'];
                    $status2 = $res2['status'];
                    echo ('<div class="d-flex flex-wrap cardcontainer mb-3 p-3 text-dark">');
                    echo ('<div class="col-6">');
                    echo ('<h6>Account Transaction</h6>');
                    echo ('<p>Newtork: <span>' . $network . ' </span></p>');
                    echo ('<p>Plan: <span>' . $plan . ' </span></p>');
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
            ?>
        </div>
    </div>
</section>







<script src="../../assets/js/sweetalert/sweetalert.js"></script>
<script src="../../assets/js/index.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.js"></script>

<?php
    if ($num>0) {

?>
<script>
    swal({
        title: "Unsuccessfull Transaction",
        text: "You have an unsuccessfull transaction from your customers, kindly check your API dashboard",
        button: "Continue",
    });
</script>

<?php
$sql = "TRUNCATE  admin_notification ";
$query = mysqli_query($conn, $sql);
    }
?>
</body>

</html>