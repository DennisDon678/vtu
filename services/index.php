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

    <!-- Services -->
    <section class="h bg container-fluid pb-3 pt-5">
        <div class="mainctn  container px-3 bg-light text-dark py-3 enclose">
            <div class="d-flex flex-wrap  text-center gap-3">
                <div class="col-md-3 p-2 cardcontainer col-6">
                    <div class="image cardImage">
                        <img class="img-fluid" src="../assets/images/airtime.svg" alt="" srcset="">
                    </div>
                    <a class="btn mt-3 getStarted">Airtime</a>
                </div>

                <div class="col-md-3 p-2 cardcontainer col-6">
                    <div class="image cardImage">
                        <img class="img-fluid" src="../assets/images/mtn.png" alt="" srcset="">

                    </div>
                    <a class="btn mt-3 getStarted" data-bs-toggle="modal" data-bs-target="#mtn">MTN data</a>

                </div>

                <div class="col-md-3 p-2 cardcontainer col-6">
                    <div class="image cardImage">
                        <img class="img-fluid" src="../assets/images/airtel.png" alt="" srcset="">

                    </div>
                    <a class="btn mt-3 getStarted" data-bs-toggle="modal" data-bs-target="#airtel">Airtel data</a>
                </div>

                <div class="col-md-3 p-2 cardcontainer col-6">
                    <div class="image cardImage">
                        <img class="img-fluid" src="../assets/images/glo.jpg" alt="" srcset="">

                    </div>
                    <a class="btn mt-3 getStarted" data-bs-toggle="modal" data-bs-target="#glo">GLO data</a>
                </div>

                <div class=" col-md-3 p-2 cardcontainer col-6">
                    <div class="image cardImage">
                        <img class="img-fluid" src="../assets/images/9Mobile.jpg" alt="" srcset="">

                    </div>
                    <a class="btn mt-3 getStarted">9mobile data</a>
                </div>

                <div class="col-md-3 p-2 cardcontainer col-6">
                    <div class="image ">
                        <div class="cardImage">
                            <img class="img-fluid" src="../assets/images/curved-tv.png" alt="" srcset="">
                        </div>
                    </div>
                    <a class="btn mt-3 getStarted"> Tv Subscription</a>

                </div>

                <div class="col-md-3 p-2 cardcontainer col-6">
                    <div class="image ">
                        <div class="cardImage">
                            <img class="img-fluid" src="../assets/images/bulb.png" alt="" srcset="">
                        </div>
                    </div>
                    <a class="btn mt-3 getStarted">Electricity bills</a>

                </div>

            </div>
        </div>
    </section>



    <!-- POPUPS -->
    <section>
        <!-- mtn -->
        <div class="modal fade" id="mtn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">MTN Data Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3 cardcontainer">
                        <form action="../app/services/MTNData.php" method="post">
                            <input type="hidden" name="network_id" value="1">
                            <div class="form-outline flex-fill mb-1">
                                <input type="tel" name="phone" placeholder="Enter Your Phone number e.g 08100918427" class="form-control" />
                                <label class="form-label" for="phone">Your phone number</label>
                            </div>
                            <div class="form-outline flex-fill mb-1">
                                <select name="plan" class="form-select">
                                    <option selected>Click to select plan</option>
                                    <option value="49">500MB SME Data - NGN </option>
                                    <option value="7">1GB SME Data - NGN </option>
                                    <option value="8">2GB SME Data - NGN </option>
                                    <option value="11">5GB SME Data - NGN </option>
                                    <option value="213">10GB SME Data - NGN </option>
                                </select>
                                <label class="form-label" for="plan">Select Plan</label>
                            </div>
                            <div class="form-outline flex-fill mb-0">
                                <input type="submit" name="submit" value="Purchase Now" class="form-control getStarted" />

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Airtel -->
        <div class="modal fade" id="airtel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Airtel Data Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3 cardcontainer">
                        <form action="../app/services/MTNData.php" method="post">

                            <input type="hidden" name="network_id" value="4">

                            <div class="form-outline flex-fill mb-1">
                                <input type="tel" name="phone" placeholder="Enter Your Phone number e.g 08100918427" class="form-control" />
                                <label class="form-label" for="phone">Your phone number</label>
                            </div>
                            <div class="form-outline flex-fill mb-1">
                                <select name="plan" class="form-select">
                                    <option selected>Click to select plan</option>
                                    <option value="227">500MB corporate Data - NGN </option>
                                    <option value="228">1GB corporate Data - NGN </option>
                                    <option value="229">2GB corporate Data - NGN </option>
                                    <option value="230">5GB corporate Data - NGN </option>
                                    <option value="231">10GB corporate Data - NGN </option>
                                </select>
                                <label class="form-label" for="plan">Select Plan</label>
                            </div>
                            <div class="form-outline flex-fill mb-0">
                                <input type="submit" name="submit" value="Purchase Now" class="form-control getStarted" />

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- GLO -->

        <div class="modal fade" id="glo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">GLO Data Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3 cardcontainer">
                        <form action="../app/services/Data.php" method="post">

                            <input type="hidden" name="network_id" value="2">

                            <div class="form-outline flex-fill mb-1">
                                <input type="tel" name="phone" placeholder="Enter Your Phone number e.g 08100918427" class="form-control" />
                                <label class="form-label" for="phone">Your phone number</label>
                            </div>
                            <div class="form-outline flex-fill mb-1">
                                <select name="plan" class="form-select">
                                    <option selected>Click to select plan</option>
                                    <option value="194">1.05GB GIFTING Data - NGN </option>
                                    <option value="195">2.9GB GIFTING Data - NGN </option>
                                    <option value="196">4.1GB GIFTING Data - NGN </option>
                                    <option value="197">5.8GB GIFTING Data - NGN </option>
                                    <option value="198">7.7GB GIFTING Data - NGN </option>
                                    <option value="199">10GB GIFTING Data - NGN </option>
                                    <option value="200">13.25GB GIFTING Data - NGN </option>
                                    <option value="201">18.25GB GIFTING Data - NGN </option>
                                    <option value="202">29.5GB GIFTING Data - NGN </option>
                                    <option value="203">50GB GIFTING Data - NGN </option>

                                </select>
                                <label class="form-label" for="plan">Select Plan</label>
                            </div>
                            <div class="form-outline flex-fill mb-0">
                                <input type="submit" name="submit" value="Purchase Now" class="form-control getStarted" />

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </section>






    <script src=" https://js.paystack.co/v1/inline.js">
    </script>

    <script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>