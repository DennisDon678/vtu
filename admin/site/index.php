<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

// api key
$sql = "SELECT * FROM vtu_api";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_array($query);
$api = $results['API_key'];

// site details
$sql2 = "SELECT * FROM site_settings";
$query1 = mysqli_query($conn, $sql2);
$results1 = mysqli_fetch_array($query1);
$siteName = $results1['site_name'];
$siteDescription = $results1['site_description'];

// contact 
$sql3 = "SELECT * FROM contact";
$query3 = mysqli_query($conn,$sql3);
$result3 = mysqli_fetch_array($query3);
$tel = $result3['phone'];
$email = $result3['email'];
$whatsapp = $result3['whatsapp'];
$street_num = $result3['street_number'];
$street_name = $result3['street_name'];
$town = $result3['town'];


include('../inc/header.php');
?>




    <section class="container-fluid mt-5 py-5 h">
        <div class="container py-4 section bg-light enclose">

            <!-- Sit setting -->
            <h3 class=" text-center">Update Website settings options</h3>
            <div class="notice">
                <p class="alert alert-success">This where you configure the name of your website and the descriptions, add details that would be nice to your users.</p>
            </div>
            <form class="text-dark" action="../../app/forms/site/site.php" method="post">
                <div class="form mb-3">
                    <label for="fullname">Site Name</label>
                    <input class="form-control" value="<?= $siteName ?>" type="text" name="site_name" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Site Description</label>
                    <textarea class="form-control" type="text" name="description" id="" required><?= $siteDescription ?></textarea>
                </div>


                <div class="form justify-content-center text-dark mb-3">
                    <input class="form-control w-50 btn adlog" type="submit" name="submit" value="Update">
                </div>
            </form>

            <!-- Contact info -->
            <h3 class=" text-center">Contact information</h3>
            <form class="text-dark" action="../../app/forms/contact/contact.php" method="post">
                <h5>Mobile</h5>
                <div class="form mb-3">
                    <label for="fullname">Company Tel.</label>
                    <input class="form-control" value="<?= $tel ?>" type="text" name="tel" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Support Email</label>
                    <input class="form-control" value="<?= $email ?>" type="text" name="email" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Whatsapp number</label>
                    <input class="form-control" value="<?= $whatsapp ?>" type="text" name="whatsapp" id="" required>
                </div>
                <!-- physical address -->
                <h5>Office location</h5>
                <div class="form mb-3">
                    <label for="fullname">street number</label>
                    <input class="form-control" value="<?= $street_num ?>" type="text" name="street_num" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Street Name</label>
                    <input class="form-control" value="<?= $street_name ?>" type="text" name="Street_name" id="" required>
                </div>

                <div class="form mb-3">
                    <label for="fullname">Town</label>
                    <input class="form-control" value="<?= $town ?>" type="text" name="town" id="" required>
                </div>

                <div class="form justify-content-center text-dark mb-3">
                    <input class="form-control w-50 btn adlog" type="submit" name="submit" value="Update">
                </div>
            </form>

            <!-- API setting -->
            <h3 class=" text-center">API key set-up</h3>

            <form class="text-dark" action="../../app/forms/API/api.php" method="post">
                <div class="form mb-3">
                    <label for="fullname">API Key</label>
                    <input class="form-control" value="<?= $api ?>" type="text" name="api_key" id="" required>
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