<?php
session_start();
include('../connection/database.php');
$user = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE username = '$user' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
if ($result>0) {
    $id = $result['id'];
    $oldBalance = $result['balance'];
}



// Paystack verification
$curl = curl_init();
$reference = $_GET['reference'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_539d6d80cddd21ecc375b3d62c67fff2dc662c0f",
    "Cache-Control: no-cache",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
urldecode($response);
$arry=json_decode($response,true);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  // grap response
  $status = $arry['data']['status'];
  $amount = ($arry['data']['amount'])/100;
  $ref = $arry['data']['reference'];
  $time = $arry['data']['paid_at'];
  $email = $arry['data']['customer']['email'];


  // insert to database
  $sql = "INSERT INTO deposit (id, status, depositors_email, amount, transaction_id)              VALUES ($id,'$status', '$email', $amount, '$ref');";
  $query = mysqli_query($conn,$sql);


  // update amount
  $newBalance = $oldBalance + $amount;
  $sql = "UPDATE users  SET balance = $newBalance WHERE id = $id";
  $query = mysqli_query($conn,$sql);


  
 echo ('

 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>thanks</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>

  <!-- Thanks page -->
  <section>
    <div class="container-fluid py-5 bg text-center h">
      <div class="container py-4  enclose section bg-light mx-auto">
          <div class="thanksimge">
            <img class="pb-4 img-fluid" src="../assets/images/thank-you.png" alt="" srcset="">
          </div>
          <div class="textThanks">
            <h2>Your Deposit was successfull and your balance updated!</h2>
          </div>
          <div class="link">
            <P>If not redirected in 6 Seconds click <a href="../dashboard/">HERE</a></P>
          </div>
      </div>
    </div>
  </section>







  <script src=" https://js.paystack.co/v1/inline.js">
  </script>
  <script src="./index.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>
 
 
 
 ');

  header("refresh:6;   ../dashboard");
}
?>