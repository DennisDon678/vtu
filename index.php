<?php
session_start();
include('./connection/database.php');

$sql = "SELECT * FROM price_list where id = 1";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

$mtnsme = $result['mtn'];
$airtelsme = $result['airtel'];
$g1 = $result['g1'];
$g2 = $result['g2'];
$g3 = $result['g3'];
$g4 = $result['g4'];
$g5 = $result['g5'];
$g6 = $result['g6'];
$m1 = $result['m1'];
$m2 = $result['m2'];
$m3 = $result['m3'];
$m4 = $result['m4'];
$m5 = $result['m5'];
$m6 = $result['m6'];

// site details
$sql2 = "SELECT * FROM site_settings";
$query1 = mysqli_query($conn, $sql2);
$results1 = mysqli_fetch_array($query1);
$siteName = $results1['site_name'];
$siteDescription = $results1['site_description'];

if (!isset($_SESSION['user'])) {

?>

    <!-- LOGGED OUT USERS -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=
    , initial-scale=1.0">
        <title>vtu</title>
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./assets/css/index.css">
    </head>

    <body>
        <!-- nav bar -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="./"><?= $siteName ?></a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#Services">Services</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./register/">Register</a>
                        </li>

                        <li class="nav-item ms-4">
                            <a class="btn getStartedNav  " href="./login/">Login Now</a>
                        </li>
                </div>
            </div>
        </nav>
        <!-- Hero section -->

        <section>
            <div class="container-fluid  mb-0 px-5 d-sm-flex" id="hero">
                <div class="content textContent text-center align-self-center col-md-7">
                    <h1 class="py-3">
                        Welcome to <?= $siteName ?>
                    </h1>

                    <p class="mb-3">
                        <?= $siteDescription ?>
                    </p>

                    <div class="botton justify-content-center mb-2  gap-4 d-flex">
                        <div>
                            <a class="btn getStarted" href="./register/">Get started now</a>
                        </div>

                        <div>
                            <a class="btn login" href="./login/">Login Now</a>
                        </div>

                    </div>
                </div>

                <div class="image align-items-end col-md-5">
                    <img class="img-fluid" src="./assets/images/happyUser.png" alt="" srcset="">
                </div>

            </div>
        </section>

        <!-- services -->
        <section>
            <div id="Services" class=" text-center px-5">
                <h2 class=" pt-2 section">Our services</h2>

                <div class="cardSize  d-md-flex gap-2">
                    <div class="cardcontainer mx-auto col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/airtime.svg" alt="" srcset="">
                        </div>
                        <div class="card-title ">
                            <h3>Airtime Top-up</h3>
                        </div>
                        <div class="card-body">
                            <p>Making an online recharge has become very easy and safe </p>
                        </div>
                    </div>

                    <div class="cardcontainer mx-auto  col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/data.jpg" alt="" srcset="">
                        </div>
                        <div class="card-title">
                            <h3>Data Top-up</h3>
                        </div>
                        <div class="card-body">
                            <p>Start enjoying this very low rates Data plan for your internet browsing databundle.</p>
                        </div>
                    </div>

                    <div class="cardcontainer mx-auto  col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/curved-tv.png" alt="" srcset="">
                        </div>
                        <div class="card-title">
                            <h3>TV subscription</h3>
                        </div>
                        <div class="card-body">
                            <p>Enjoy an instantly activated Cable Subscriptions (Gotv, DSTV and Startimes).</p>
                        </div>
                    </div>

                    <div class="cardcontainer mx-auto  col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/bulb.png" alt="" srcset="">
                        </div>
                        <div class="card-title">
                            <h3>Electricity bill</h3>
                        </div>
                        <div class="card-body">
                            <p>Paying for your Electricity Bills is as easy as ABC. Easy Process, Swift Payment with Receipt!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- mission -->
        <section>
            <div class="container-fluid bg-gray text-center px-5">
                <h3 class="pb-2 pt-3 section" id="mission">Our Mission</h3>
                <div class="d-sm-flex">
                    <div class="col-sm-6">
                        <div class="image mission">
                            <img class="img-fluid missionImg" src="./assets/images/phone.svg" alt="" srcset="">
                        </div>

                    </div>

                    <div class="col-sm-6 p-3 align-self-center my-4">
                        <p>
                            Our mission at vtu platform is to provide you and your business with the fastest connection to the rest of world. This we do by means of cheap data subscriptions, cheap TV subscriptions and also electrity bill settlment. Our support system is dedicated to helping you sort any issues you might encounter while using our services.
                        </p>

                    </div>
                </div>

            </div>

        </section>

        <!-- pricing -->
        <section id="pricing">
            <div class="container my-3">
                <h3 class="text-center mb-4 section">Pricing</h3>

                <div class="gap-3 d-sm-flex">
                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">MTN</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1GB SME</td>
                                    <td><?= $mtnsme * 1 ?></td>
                                </tr>
                                <tr>
                                    <td>2GB SME</td>
                                    <td><?= $mtnsme * 2 ?></td>
                                </tr>
                                <tr>
                                    <td>3GB SME</td>
                                    <td><?= $mtnsme * 3 ?></td>
                                </tr>
                                <tr>
                                    <td>4GB SME</td>
                                    <td><?= $mtnsme * 4 ?></td>
                                </tr>
                                <tr>
                                    <td>5GB SME</td>
                                    <td><?= $mtnsme * 5 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">Airtel</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1GB SME</td>
                                    <td><?= $airtelsme * 1 ?></td>
                                </tr>
                                <tr>
                                    <td>2GB SME</td>
                                    <td><?= $airtelsme * 2 ?></td>
                                </tr>
                                <tr>
                                    <td>3GB SME</td>
                                    <td><?= $airtelsme * 3 ?></td>
                                </tr>
                                <tr>
                                    <td>4GB SME</td>
                                    <td><?= $airtelsme * 4 ?></td>
                                </tr>
                                <tr>
                                    <td>5GB SME</td>
                                    <td><?= $airtelsme * 5 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">GLO</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>GLO Gifting 1.05GB</td>
                                    <td><?= $g1 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 2.9GB</td>
                                    <td><?= $g2 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 4.1GB</td>
                                    <td><?= $g3 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 5.8GB</td>
                                    <td><?= $g4 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 7.7GB</td>
                                    <td><?= $g5 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 10.0GB</td>
                                    <td><?= $g6 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">9mobile</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>9mobil Gifting 500MB</td>
                                    <td><?= $m1 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 1.5GB</td>
                                    <td><?= $m2 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 2.0GB</td>
                                    <td><?= $m3 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 3.0GB</td>
                                    <td><?= $m4 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 4.5GB</td>
                                    <td><?= $m5 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 11.0GB</td>
                                    <td><?= $m6 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </section>

        <!-- Footer -->
        <section>
            <div class="container-fluid mt-4 py-4 text-light bg-dark">
                <div class="container gap-4 d-sm-flex">
                    <div class="text-center align-self-center col-sm-4">
                        <div class="brand">
                            <h2>
                                <?= $siteName ?>
                            </h2>
                            <p>
                                Your number one platform for all vtu services. Stay safe, stay tuned.
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form">
                            <h2 class="text-center py-2">Contact Us Now</h2>
                            <form action="" method="post">
                                <div class="formInput">
                                    <label for="name">Enter your full name</label>
                                    <input class="form-control" type="text" name="name" id="">
                                </div>

                                <div class="formInput">
                                    <label for="email">Enter your Email</label>
                                    <input class="form-control" type="email" name="email" id="">
                                </div>

                                <div class="formInput">
                                    <label for="email">Enter your Message</label>
                                    <textarea class="form-control" type="email" name="email" id=""></textarea>
                                </div>

                                <div class="formInput">
                                    <input class="bg-primary text-light form-control" type="submit" name="submit" value="SEND" id="">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="align-self-center col-sm-4">
                        <div class="text-center">
                            <p>
                                Visit us at our office. <br>
                                No. 33, <br>
                                Elias avenue, <br>
                                Unniversity of nigeria, <br>
                                Nsukka.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="./assets/bootstrap/js/bootstrap.js"></script>
    </body>

    </html>



    <!-- LOGGED IN USERS -->

<?php
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=
    , initial-scale=1.0">
        <title>vtu</title>
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./assets/css/index.css">
    </head>

    <body>
        <!-- nav bar -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="./"><?= $siteName ?></a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#Services">Services</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard/">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./app/logout.php?action=logout">Log out</a>
                        </li>


                </div>
            </div>
        </nav>
        <!-- Hero section -->

        <section>
            <div class="container-fluid  mb-0 px-5 d-sm-flex" id="hero">
                <div class="content textContent text-center align-self-center col-md-7">
                    <h1 class="py-3">
                        Welcome to <?= $siteName ?>
                    </h1>

                    <p class="mb-3">
                        <?= $siteDescription ?>
                    </p>

                    <div class="botton justify-content-center mb-2  gap-4 d-flex">
                        <div>
                            <a class="btn getStarted" href="./register/">Get started now</a>
                        </div>

                        <div>
                            <a class="btn login" href="./login/">Login Now</a>
                        </div>

                    </div>
                </div>

                <div class="image align-items-end col-md-5">
                    <img class="img-fluid" src="./assets/images/happyUser.png" alt="" srcset="">
                </div>

            </div>
        </section>

        <!-- services -->
        <section>
            <div id="Services" class=" text-center px-5">
                <h2 class=" pt-2 section">Our services</h2>

                <div class="cardSize  d-md-flex gap-2">
                    <div class="cardcontainer mx-auto col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/airtime.svg" alt="" srcset="">
                        </div>
                        <div class="card-title ">
                            <h3>Airtime Top-up</h3>
                        </div>
                        <div class="card-body">
                            <p>Making an online recharge has become very easy and safe </p>
                        </div>
                    </div>

                    <div class="cardcontainer mx-auto  col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/data.jpg" alt="" srcset="">
                        </div>
                        <div class="card-title">
                            <h3>Data Top-up</h3>
                        </div>
                        <div class="card-body">
                            <p>Start enjoying this very low rates Data plan for your internet browsing databundle.</p>
                        </div>
                    </div>

                    <div class="cardcontainer mx-auto  col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/curved-tv.png" alt="" srcset="">
                        </div>
                        <div class="card-title">
                            <h3>TV subscription</h3>
                        </div>
                        <div class="card-body">
                            <p>Enjoy an instantly activated Cable Subscriptions (Gotv, DSTV and Startimes).</p>
                        </div>
                    </div>

                    <div class="cardcontainer mx-auto  col-3">
                        <div class="cardImage">
                            <img class="img-fluid" src="./assets/images/bulb.png" alt="" srcset="">
                        </div>
                        <div class="card-title">
                            <h3>Electricity bill</h3>
                        </div>
                        <div class="card-body">
                            <p>Paying for your Electricity Bills is as easy as ABC. Easy Process, Swift Payment with Receipt!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- mission -->
        <section>
            <div class="container-fluid bg-gray text-center px-5">
                <h3 class="pb-2 pt-3 section" id="mission">Our Mission</h3>
                <div class="d-sm-flex">
                    <div class="col-sm-6">
                        <div class="image mission">
                            <img class="img-fluid missionImg" src="./assets/images/phone.svg" alt="" srcset="">
                        </div>

                    </div>

                    <div class="col-sm-6 p-3 align-self-center my-4">
                        <p>
                            Our mission at vtu platform is to provide you and your business with the fastest connection to the rest of world. This we do by means of cheap data subscriptions, cheap TV subscriptions and also electrity bill settlment. Our support system is dedicated to helping you sort any issues you might encounter while using our services.
                        </p>

                    </div>
                </div>

            </div>

        </section>

        <!-- pricing -->
        <section id="pricing">
            <div class="container my-3">
                <h3 class="text-center mb-4 section">Pricing</h3>

                <div class="gap-3 d-sm-flex">
                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">MTN</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1GB SME</td>
                                    <td><?= $mtnsme * 1 ?></td>
                                </tr>
                                <tr>
                                    <td>2GB SME</td>
                                    <td><?= $mtnsme * 2 ?></td>
                                </tr>
                                <tr>
                                    <td>3GB SME</td>
                                    <td><?= $mtnsme * 3 ?></td>
                                </tr>
                                <tr>
                                    <td>4GB SME</td>
                                    <td><?= $mtnsme * 4 ?></td>
                                </tr>
                                <tr>
                                    <td>5GB SME</td>
                                    <td><?= $mtnsme * 5 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">Airtel</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1GB SME</td>
                                    <td><?= $airtelsme * 1 ?></td>
                                </tr>
                                <tr>
                                    <td>2GB SME</td>
                                    <td><?= $airtelsme * 2 ?></td>
                                </tr>
                                <tr>
                                    <td>3GB SME</td>
                                    <td><?= $airtelsme * 3 ?></td>
                                </tr>
                                <tr>
                                    <td>4GB SME</td>
                                    <td><?= $airtelsme * 4 ?></td>
                                </tr>
                                <tr>
                                    <td>5GB SME</td>
                                    <td><?= $airtelsme * 5 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">GLO</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>GLO Gifting 1.05GB</td>
                                    <td><?= $g1 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 2.9GB</td>
                                    <td><?= $g2 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 4.1GB</td>
                                    <td><?= $g3 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 5.8GB</td>
                                    <td><?= $g4 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 7.7GB</td>
                                    <td><?= $g5 ?></td>
                                </tr>
                                <tr>
                                    <td>GLO Gifting 10.0GB</td>
                                    <td><?= $g6 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="text-center mtn px-3 col-sm-3 cardcontainer">
                        <h4 class="section">9mobile</h4>
                        <table class="table">
                            <thead>
                                <th class="section">Quantity</th>
                                <th class="section">Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>9mobil Gifting 500MB</td>
                                    <td><?= $m1 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 1.5GB</td>
                                    <td><?= $m2 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 2.0GB</td>
                                    <td><?= $m3 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 3.0GB</td>
                                    <td><?= $m4 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 4.5GB</td>
                                    <td><?= $m5 ?></td>
                                </tr>
                                <tr>
                                    <td>9mobil Gifting 11.0GB</td>
                                    <td><?= $m6 ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </section>

        <!-- Footer -->
        <section>
            <div class="container-fluid mt-4 py-4 text-light bg-dark">
                <div class="container gap-4 d-sm-flex">
                    <div class="text-center align-self-center col-sm-4">
                        <div class="brand">
                            <h2>
                                VTU
                            </h2>
                            <p>
                                Your number one platform for all vtu services. Stay safe, stay tuned.
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form">
                            <h2 class="text-center py-2">Contact Us Now</h2>
                            <form action="" method="post">
                                <div class="formInput">
                                    <label for="name">Enter your full name</label>
                                    <input class="form-control" type="text" name="name" id="">
                                </div>

                                <div class="formInput">
                                    <label for="email">Enter your Email</label>
                                    <input class="form-control" type="email" name="email" id="">
                                </div>

                                <div class="formInput">
                                    <label for="email">Enter your Message</label>
                                    <textarea class="form-control" type="email" name="email" id=""></textarea>
                                </div>

                                <div class="formInput">
                                    <input class="bg-primary text-light form-control" type="submit" name="submit" value="SEND" id="">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="align-self-center col-sm-4">
                        <div class="text-center">
                            <p>
                                Visit us at our office. <br>
                                No. 33, <br>
                                Elias avenue, <br>
                                Unniversity of nigeria, <br>
                                Nsukka.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="./assets/bootstrap/js/bootstrap.js"></script>
    </body>

    </html>


<?php
}

?>