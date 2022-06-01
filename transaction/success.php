<?php
include('../connection/database.php');
if (isset($_GET['id'])) {
    $trans_id = $_GET['id'];

    // Get transaction
    $sql = "SELECT * FROM transactions where trans_id = '$trans_id'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    $network = $result['network'];
    $amount = $result['amount'];
    $time = $result['time'];
    $plan_name = $result['plan_name'];
    $status = $result['status'];
    $phone = $result['phone'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Services</title>
</head>

<body>
    <!-- Header -->
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
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../dashboard/">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Log out</a>
                            </li>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section>
        <div class="container-fluid py-5 bg h">
            <div class="container py-4  enclose section bg-light mx-auto">
                <div class="thanksimge mx-auto  mobile">
                    <img class="pb-4  img-fluid" src="../assets/images/thank-you.png" alt="" srcset="">
                </div>
                <div class="textsuccess">
                    <h5 class="text-dark text-center">Transaction Receipt</h5>
                </div>

                <div class="card border-light text-dark p-4 enclose receipt">
                    <div class="item mb-3">
                        <div class="title">
                            <h6>Transaction Id</h6>
                        </div>
                        <div class="field">
                            <p><?= $trans_id ?></p>
                        </div>
                    </div>
                    <div class="item mb-3">
                        <div class="title">
                            <h6>Network</h6>
                        </div>
                        <div class="field">
                            <p><?= $network ?></p>
                        </div>
                    </div>
                    <div class="item mb-3">
                        <div class="title">
                            <h6>Phone number</h6>
                        </div>
                        <div class="field">
                            <p><span><?= $phone ?></span></p>
                        </div>
                    </div>
                    <div class="item mb-3">
                        <div class="title">
                            <h6>Status</h6>
                        </div>
                        <div class="field">
                            <p><span><?= $status ?></span></p>
                        </div>
                    </div>
                    <div class="item mb-3">
                        <div class="title">
                            <h6>Amount</h6>
                        </div>
                        <div class="field">
                            <p>NGN <?= $amount ?></p>
                        </div>
                    </div>
                    <div class="item mb-3">
                        <div class="title">
                            <h6>Plan Name</h6>
                        </div>
                        <div class="field">
                            <p><?= $plan_name ?></p>
                        </div>
                    </div>
                    <div class="item mb-3">
                        <div class="title">
                            <h6>Time</h6>
                        </div>
                        <div class="field">
                            <p><?= $time ?></p>
                        </div>
                    </div>
                </div>

                <div class="link text-center">
                    <P class="text-dark">If not redirected in 6 Seconds click <a href="../dashboard/">HERE</a></P>
                </div>
            </div>
        </div>
    </section>


    <script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>