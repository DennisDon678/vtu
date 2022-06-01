<?php
$response = $_GET['response'];

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
        <div class="container-fluid py-5 bg text-center h">
            <div class="container py-4  enclose section bg-light mx-auto">
                <div class="mobile">
                    <img class="pb-4 img-fluid mobile" src="../assets/images/disappointed-mad-emoji.png" alt="" srcset="">
                </div>
                <div class="textThanks">
                    <h5 class="text-dark"><?= $response ?></h5>
                </div>
                <div class="link">
                    <P class="text-dark">If not redirected in 6 Seconds click <a href="../dashboard/">HERE</a></P>
                </div>
            </div>
        </div>
    </section>

    <?php
    header("refresh:6;   ../dashboard");
    ?>


    <script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>