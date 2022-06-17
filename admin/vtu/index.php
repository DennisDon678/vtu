<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

// Select price list
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

include('../inc/header.php');
?>





<section class="container-fluid mt-5 py-5 h">
    <div class="container py-4 section bg-light enclose">


        <h3 class=" text-center">Update VTU settings options</h3>
        <div class="notice">
            <p class="alert alert-success">This is where you configure the price of products in your website. PLease take time to check on prices from the host site, <a href="https://legitdata.com.ng/profile/" target="blanck">Click here</a> and add your profit accordingly.</p>

        </div>
        <div class="notice">
            <p class="alert alert-warning">Default values has been setted based on other websites price list.</p>

        </div>

        <form class="text-dark" action="../../app/forms/price_list/pricing.php" method="post">
            <div class="form mb-3">
                <label for="fullname">MTN SME per 1GB</label>
                <input class="form-control" type="number" value="<?= $mtnsme ?>" name="mtnsme" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">MTN 500MB</label>
                <input class="form-control" type="number" value="<?= $mtn500 ?>" name="mtn500" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">Airtel SME per 1GB</label>
                <input class="form-control" value="<?= $airtelsme ?>" type="number" name="airtelsme" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">Airtel 500MB</label>
                <input class="form-control" value="<?= $airtel500 ?>" type="number" name="airtel500" id="" required>
            </div>

            <p class="alert alert-success">Be careful at this zone.</p>

            <div class="form mb-3">
                <label for="fullname">GLO 1.05GB</label>
                <input class="form-control" type="number" value="<?= $g1 ?>" name="g1" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">GLO Gifting 1.9GB</label>
                <input class="form-control" type="number" value="<?= $g2 ?>" name="g2" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">GLO Gifting 3.5GB</label>
                <input class="form-control" type="number" value="<?= $g3 ?>" name="g3" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">GLO Gifting 5.2GB</label>
                <input class="form-control" type="number" value="<?= $g4 ?>" name="g4" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">GLO Gifting 6.8GB</label>
                <input class="form-control" type="number" value="<?= $g5 ?>" name="g5" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">GLO Gifting 9.0GB</label>
                <input class="form-control" type="number" value="<?= $g6 ?>" name="g6" id="" required>
            </div>

            <p class="alert alert-warning">Be careful at this zone.</p>

            <div class="form mb-3">
                <label for="fullname">9mobil Gifting 500MB</label>
                <input class="form-control" type="number" value="<?= $m1 ?>" name="m1" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">9mobil Gifting 1.5GB</label>
                <input class="form-control" type="number" value="<?= $m2 ?>" name="m2" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">9mobil Gifting 2.0GB</label>
                <input class="form-control" type="number" value="<?= $m3 ?>" name="m3" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">9mobil Gifting 3.0GB</label>
                <input class="form-control" type="number" value="<?= $m4 ?>" name="m4" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">9mobil Gifting 4.5GB</label>
                <input class="form-control" type="number" value="<?= $m5 ?>" name="m5" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">9mobil Gifting 11.GB</label>
                <input class="form-control" type="number" value="<?= $m6 ?>" name="m6" id="" required>
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