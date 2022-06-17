<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['admin'])) {
    header('location: ../');
}

$limit = 20;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM users ORDER BY registered_at desc limit $start_from,$limit";
$query = mysqli_query($conn, $sql);


// Site Details
$sql4 = "SELECT * FROM site_settings";
$query4 = mysqli_query($conn, $sql4);
$results4 = mysqli_fetch_array($query4);
$siteName = $results4['site_name'];


include('../inc/header.php');
?>



<section class="my-5">
    <div class="m-5 mx-auto container  py-5 ">
        <div class="table-responsive enclose p-4 bg-light">
            <h4 class="text-dark text-center mb-3">Registered users</h4>

            <div class="container">

                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="col-md-6">

                        <div class="form">
                            <form class="d-flex align-items-center" action="" method="get">
                                <input type="text" name="user" class="form-control form-input me-1" placeholder="Search user by username...">
                                <button class="btn btn-primary mb-2" name="submit"> <i class="fa fa-search " name="submit"></i></button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>View more</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn = 0;
                    if (!isset($_GET['user'])) {
                        while ($result = mysqli_fetch_assoc($query)) {
                            $sn++;
                            $name = $result['fullname'];
                            $email = $result['email'];
                            $balance = $result['balance'];
                            $user = $result['username'];
                            $id = $result['id'];

                            echo ('
                        <tr>
                            <td>' . $sn . '</td>
                            <td>' . $name . '</td>
                             <td>' . $user . '</td>
                            <td>' . $email . '</td>
                            <td>NGN ' . $balance . '</td>
                            <td><a class=" btn btn-primary" href="./Details.php?id=' . $id . '">View Details</a></td>
                        </tr>
                           ');
                        }
                    } else {
                        $user = $_GET['user'];
                        $sql = "SELECT * FROM users where username = '$user' ORDER BY registered_at desc";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        $result = mysqli_fetch_array($query);
                        if ($count > 0) {
                            $sn++;
                            $name = $result['fullname'];
                            $email = $result['email'];
                            $user = $result['username'];
                            $balance = $result['balance'];
                            $id = $result['id'];

                            echo ('
                        <tr>
                            <td>' . $sn . '</td>
                            <td>' . $name . '</td>
                            <td>' . $user . '</td>
                            <td>' . $email . '</td>
                            <td>NGN ' . $balance . '</td>
                            <td><a class=" btn btn-primary" href="./Details.php?id=' . $id . '">View Details</a></td>
                        </tr>
                        <a class="btn btn-primary" href="./">All users</a>
                           ');
                        } else {
                            echo ('
                            
                                 <p>This username may not be registered on this platform. Be sure your typing the right username.</p>
                                 <a class="btn btn-primary" href="./">All users</a>
                            ');
                        }
                    }
                    ?>

                </tbody>
            </table>
            <?php
            if (!isset($_GET['user'])) {
                $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM users");
                $row_db = mysqli_fetch_row($result_db);
                $total_records = $row_db[0];
                $total_pages = ceil($total_records / $limit);
                /* echo  $total_pages; */
                $pagLink = "<ul class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                    $pagLink .= "<li class='page-item'><a class='page-link' href='./?page=" . $i . "'>" . $i . "</a></li>";
                }
                echo $pagLink . "</ul>";
            }
            ?>
        </div>

    </div>
</section>


<script src="../../assets/js/index.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>