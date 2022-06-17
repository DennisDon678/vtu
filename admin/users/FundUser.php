<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        $username = $result['username'];
    } else {
    }
}

// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];


include('../inc/header.php');
?>


    <section>
        <div class="fundform container pt-5">
            <div class="container enclose p-4 bg-light">
                <h5 class="text-center section">Fund this user</h5>
                <form action="./fund.php" method="post">
                    <div class="name mb-3">
                        <label class="ml-0" for="amount">Username</label>
                        <input class="form-control" type="text" value="<?= $username ?>" placeholder="<?= $username ?>" name="username" id="">
                    </div>

                    <div class="amount mb-3">
                        <label class="ml-0" for="amount">Amount to Fund</label>
                        <input class="form-control" type="tel" placeholder="Enter the amount" name="amount" id="">
                    </div>

                    <div class="submit mb-3"> <input class="form-control py-1  btn btn-primary" type="submit" name="submit" value="Fund Account" id="">
                    </div>

                </form>
            </div>
        </div>
    </section>





    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>