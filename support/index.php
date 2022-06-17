<?php
session_start();
include('../connection/database.php');
if (!isset($_SESSION['user'])) {
    header('location: ../login');
}


// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];

// contact 
$sql3 = "SELECT * FROM contact";
$query3 = mysqli_query($conn, $sql3);
$result3 = mysqli_fetch_array($query3);
$tel = $result3['phone'];
$email = $result3['email'];
$whatsapp = $result3['whatsapp'];



include('../inc/dash_header.php');



?>

<section class="h bg container-fluid pb-3 pt-5">
    <div class="mainctn  container px-3 bg-light text-dark py-3 enclose">

        <div class="d-flex flex-wrap justify-content-center  text-center gap-3">
            <div class="col-md-3 p-2 cardcontainer col-6">
                <div class="image cardImage">
                    <img class="img-fluid" src="../assets/images/icons8-mail-96.png" alt="" srcset="">
                </div>
                <a class="btn mt-3 getStarted" href="mailto: <?=$email?>">Mail Us</a>
            </div>

            <div class="col-md-3 p-2 cardcontainer col-6">
                <div class="image cardImage">
                    <img class="img-fluid" src="../assets/images/icons8-call-80.png" alt="" srcset="">

                </div>
                <a class="btn mt-3 getStarted" href="tel: <?=$tel?>">Call Us</a>

            </div>

            <div class="col-md-3 p-2 cardcontainer col-6">
                <div class="image cardImage">
                    <img class="img-fluid" src="../assets/images/icons8-whatsapp.svg" alt="" srcset="">

                </div>
                <a class="btn mt-3 getStarted" href="https://wa.me/234<?=$whatsapp?>">Whatsapp Us</a>
            </div>


        </div>
    </div>
</section>





<script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>