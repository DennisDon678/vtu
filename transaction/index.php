<?php
session_start();
include('../connection/database.php');
if (!isset($_SESSION['user'])) {
    header('location: ../login');
}

$limit = 5;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

// users details
$current_user = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE username = '$current_user' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
if ($result > 0) {
    $id = $result['id'];
}

// transactions
$sql2 = "SELECT * FROM transactions WHERE id = '$id' ORDER BY time DESC limit $start_from, $limit";
$query2 = mysqli_query($conn, $sql2);
$results2 = mysqli_num_rows($query2);


// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];


include('../inc/dash_header.php')
?>


<section class="my-5 container">
    <div class="mt-5  py-5 ">
        <div class="trans container py-4 my-4 bg-light section cardcontainer">



            <!-- Deposits -->
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
                }
            } else {
                echo ('
                                <p class="text-center text-dark mt-3"> No Transaction has been made</p>
                            ');
            }
            ?>

            <?php

            $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM transactions");
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
            /* echo  $total_pages; */
            $pagLink = "<ul class='pagination'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                $pagLink .= "<li class='page-item'><a class='page-link' href='./index.php?page=" . $i . "'>" . $i . "</a></li>";
            }
            echo $pagLink . "</ul>";
            ?>
        </div>
    </div>
</section>


<script src="../assets/js/index.js"></script>
<script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>