<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];

// notification
$notice_sql = "SELECT * FROM notification";
$notice_query = mysqli_query($conn, $notice_sql);
$notication = mysqli_fetch_array($notice_query);
$title = $notication['title'];
$message = $notication['message'];




include('../inc/header.php');
?>

<section class="container-fluid mt-5 py-5 h">
    <div class="container py-4 section bg-light enclose">

        <!-- Sit setting -->
        <h3 class=" text-center">Pop up notification for your users</h3>
        <div class="notice">
            <p class="alert alert-success">This where you can send out notification to all your users about an update or just welcome them.</p>
        </div>
        <form class="text-dark" action="../../app/forms/notification/notification.php" method="post">
            <div class="form mb-3">
                <label for="fullname">Title</label>
                <input class="form-control" value="<?= $title ?>" type="text" name="title" id="" required>
            </div>

            <div class="form mb-3">
                <label for="fullname">Message</label>
                <textarea class="form-control" type="text" name="message" id="" required><?= $message ?></textarea>
            </div>


            <div class="form justify-content-center text-dark mb-3">
                <input class="form-control w-50 btn adlog" type="submit" name="submit" value="Notify Now">
            </div>
        </form>

    </div>
</section>



<script src="../../assets/js/index.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>