<?php
session_start();
include('../connection/database.php');
if (!isset($_SESSION['user'])) {
    header('location: ../login');
}

$sql = "SELECT * FROM price_list where id = 1";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

$mtnsme = $result['mtn'];
$mtn500 = $result['mtn500'];
$airtelsme = $result['airtel'];
$airtel500 = $result['airte'];
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

// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];

// users details
$current_user = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE username = '$current_user' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
if ($result > 0) {
    $id = $result['id'];
    $fullname = $result['fullname'];
    $username = $result['username'];
    $email = $result['email'];
    $balance = $result['balance'];
}



include('../inc/dash_header.php');
?>


<!-- Services -->
<section class="h bg container-fluid pb-3 pt-5">
    <div class="mainctn  container px-3 bg-light text-dark py-3 enclose">

        <?php
        if (isset($_GET['msg'])) {
        ?>
            <div class="msg">
                <p class="alert alert-warning text-center"><?= $_GET['msg'] ?></p>
            </div>

        <?php
        }
        ?>
        <div class="d-flex flex-wrap justify-content-center  text-center gap-3">
            <div class="col-md-3 p-2 cardcontainer col-6">
                <div class="image cardImage">
                    <img class="img-fluid" src="../assets/images/airtime.svg" alt="" srcset="">
                </div>
                <a class="btn mt-3 getStarted" data-bs-toggle="modal" data-bs-target="#airtime">Airtime Topup</a>
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
                <a class="btn mt-3 getStarted" data-bs-toggle="modal" data-bs-target="#mobile">9mobile data</a>
            </div>

        </div>
    </div>
</section>



<!-- POPUPS -->
<section class="text-dark">

    <!-- Airtime -->
    <div class="modal fade" id="airtime" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Airtime Top Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 cardcontainer">
                    <form action="../app/services/airtime.php" method="post">

                        <div class="form-outline flex-fill mb-1">
                            <select name="network_id" class="form-select">
                                <option selected>Click to select Network</option>
                                <option value="1">MTN </option>
                                <option value="2">GLO </option>
                                <option value="4">Airtel </option>
                                <option value="3">9mobile </option>

                            </select>
                            <label class="form-label" for="plan">Select Network</label>
                        </div>

                        <div class="form-outline flex-fill mb-1">
                            <input type="tel" name="phone" placeholder="Enter Your Phone number e.g 08100918427" class="form-control" />
                            <label class="form-label" for="phone">Your phone number</label>
                        </div>

                        <div class="form-outline flex-fill mb-1">
                            <input type="tel" name="amount" placeholder="min amount of 100" class="form-control" />
                            <label class="form-label" for="amount">Amount in NGN</label>
                        </div>
                        <div class="form-outline flex-fill mb-0">
                            <input type="submit" name="submit" value="Purchase Now" class="form-control getStarted" />

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- mtn -->
    <div class="modal fade" id="mtn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">MTN Data Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 cardcontainer">
                    <form action="../app/services/Data.php" method="post">
                        <input type="hidden" name="network_id" value="1">
                        <div class="form-outline flex-fill mb-1">
                            <input type="tel" name="phone" placeholder="Enter Your Phone number e.g 08100918427" class="form-control" />
                            <label class="form-label" for="phone">Your phone number</label>
                        </div>
                        <div class="form-outline flex-fill mb-1">
                            <select name="plan" id="selectmtn" class="form-select">
                                <option selected>Click to select plan</option>
                                <option value="229" id="mtn1">500MB SME Data - NGN <?= $mtn500 ?> </option>
                                <option value="7">1GB SME Data - NGN <?= $mtnsme * 1 ?> </option>
                                <option value="8">2GB SME Data - NGN <?= $mtnsme * 2 ?></option>
                                <option value="11">5GB SME Data - NGN <?= $mtnsme * 5 ?></option>
                                <option value="213">10GB SME Data - NGN <?= $mtnsme * 10 ?></option>
                            </select>
                            <label class="form-label" for="plan">Select Plan</label>
                        </div>
                        <div class="form-outline flex-fill mb-1">
                            <input type="hidden" name="amount" value="?" id="mtnamount" class="form-control" />

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
                    <form action="../app/services/Data.php" method="post">

                        <input type="hidden" name="network_id" value="4">

                        <div class="form-outline flex-fill mb-1">
                            <input type="tel" name="phone" placeholder="Enter Your Phone number e.g 08100918427" class="form-control" />
                            <label class="form-label" for="phone">Your phone number</label>
                        </div>
                        <div class="form-outline flex-fill mb-1">
                            <select name="plan" id="airtel1" class="form-select">
                                <option selected>Click to select plan</option>
                                <option value="234">500MB corporate Data - NGN <?= $airtel500 * 1 ?></option>
                                <option value="231">1GB corporate Data - NGN <?= $airtelsme * 1 ?> </option>
                                <option value="232">2GB corporate Data - NGN <?= $airtelsme * 2 ?></option>
                                <option value="243">5GB corporate Data - NGN <?= $airtelsme * 5 ?></option>
                            </select>
                            <label class="form-label" for="plan">Select Plan</label>
                        </div>
                        <div class="form-outline flex-fill mb-1">
                            <input type="hidden" name="amount" id="airtelamount" value="?" class="form-control" />

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
                            <select name="plan" id="glo1" class="form-select">
                                <option selected>Click to select plan</option>
                                <option value="194">1.05GB GIFTING Data - NGN <?= $g1 ?></option>
                                <option value="195">1.9GB GIFTING Data - NGN <?= $g2 ?></option>
                                <option value="196">3.5GB GIFTING Data - NGN <?= $g3 ?></option>
                                <option value="197">5.2GB GIFTING Data - NGN <?= $g4 ?></option>
                                <option value="198">6.8GB GIFTING Data - NGN <?= $g5 ?></option>
                                <option value="199">9GB GIFTING Data - NGN <?= $g6 ?></option>
                            </select>
                            <label class="form-label" for="plan">Select Plan</label>
                        </div>
                        <div class="form-outline flex-fill mb-1">
                            <input type="hidden" value="?" name="amount" id="gloamount" class="form-control" />

                        </div>
                        <div class="form-outline flex-fill mb-0">
                            <input type="submit" name="submit" value="Purchase Now" class="form-control getStarted" />

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- 9mobil -->
    <div class="modal fade" id="mobile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">9mobile Data Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3 px-2 cardcontainer">
                    <form action="../app/services/Data.php" method="post">

                        <input type="hidden" name="network_id" value="3">

                        <div class="form-outline flex-fill mb-1">
                            <input type="tel" name="phone" placeholder="Enter Your Phone number e.g 08100918427" class="form-control" />
                            <label class="form-label" for="phone">Your phone number</label>
                        </div>
                        <div class="form-outline flex-fill mb-1">
                            <select name="plan" id="9mobile1" class="form-select">
                                <option selected>Click to select plan</option>
                                <option value="182">500MB GIFTING Data - NGN <?= $m1 ?></option>
                                <option value="183">1.5GB GIFTING Data - NGN <?= $m2 ?></option>
                                <option value="184">2.0GB GIFTING Data - NGN <?= $m3 ?></option>
                                <option value="185">3.0GB GIFTING Data - NGN <?= $m4 ?></option>
                                <option value="186">4.5GB GIFTING Data - NGN <?= $m5 ?></option>
                                <option value="187">11.0GB GIFTING Data - NGN <?= $m6 ?></option>

                            </select>
                            <label class="form-label" for="plan">Select Plan</label>
                        </div>
                        <div class="form-outline flex-fill mb-1">
                            <input type="hidden" value="?" name="amount" id="9mobileamount" class="form-control" />

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



<script src="../assets/bootstrap/js/bootstrap.js"></script>

</html>


<script>
    // mtn
    var mtn = document.getElementById('selectmtn')
    var amount = document.getElementById('mtnamount')
    mtn.addEventListener('change', function() {

        if (this.value == 229) {
            amount.value = <?= $mtn500 ?>;
        } else if (this.value == 7) {
            amount.value = <?= $mtnsme * 1 ?>;
        } else if (this.value == 8) {
            amount.value = <?= $mtnsme * 2 ?>;
        } else if (this.value == 11) {
            amount.value = <?= $mtnsme * 5 ?>;
        } else if (this.value == 213) {
            amount.value = <?= $mtnsme * 10 ?>;
        }
    });

    // airtel
    var airtel = document.getElementById('airtel1')
    var amount1 = document.getElementById('airtelamount')
    airtel.addEventListener('change', function() {

        if (this.value == 234) {
            amount1.value = <?= $airtel500 ?>;
            console.log(amount1.value)
        } else if (this.value == 231) {
            amount1.value = <?= $airtelsme * 1 ?>;
        } else if (this.value == 232) {
            amount1.value = <?= $airtelsme * 2 ?>;
        } else if (this.value == 243) {
            amount1.value = <?= $airtelsme * 5 ?>;
        }
    });

    // GLO
    var glo = document.getElementById('glo1')
    var amount2 = document.getElementById('gloamount')
    glo.addEventListener('change', function() {
        console.log(this.value)
        if (this.value == 194) {
            amount2.value = <?= $g1 ?>;
        } else if (this.value == 195) {
            amount2.value = <?= $g2 ?>;
        } else if (this.value == 196) {
            amount2.value = <?= $g3 ?>;
        } else if (this.value == 197) {
            amount2.value = <?= $g4 ?>;
        } else if (this.value == 198) {
            amount2.value = <?= $g5 ?>;
        } else if (this.value == 199) {
            amount2.value = <?= $g6 ?>;
        }
    });

    // 9mobile
    var mobile = document.getElementById('9mobile1')
    var amount3 = document.getElementById('9mobileamount')
    mobile.addEventListener('change', function() {

        if (this.value == 182) {
            amount3.value = <?= $m1 ?>;
        } else if (this.value == 183) {
            amount3.value = <?= $m2 ?>;
        } else if (this.value == 184) {
            amount3.value = <?= $m3 ?>;
        } else if (this.value == 185) {
            amount3.value = <?= $m4 ?>;
        } else if (this.value == 186) {
            amount3.value = <?= $m5 ?>;
        } else if (this.value == 187) {
            amount3.value = <?= $m6 ?>;
        }
    });
</script>