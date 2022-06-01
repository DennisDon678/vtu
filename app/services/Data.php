<?php
session_start();
include('../../connection/database.php');
if (!isset($_SESSION['user'])) {
    header('location: ../../login');
}

// Select user
$username = $_SESSION['user'];
$sql = "SELECT * FROM users where username = '$username'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
$id = $result['id'];
$userBalance = $result['balance'];

// API key

$sql1 = "SELECT * FROM vtu_api";
$query1 = mysqli_query($conn, $sql1);
$results = mysqli_fetch_array($query1);
$api = $results['API_key'];

// Get input
if (isset($_POST['submit']) && !empty($_POST['phone'])) {
    $network_id = $_POST['network_id'];
    $phone = $_POST['phone'];
    $plan = $_POST['plan'];
    $amount = $_POST['amount'];



// Query balance
if ($userBalance >= $amount) {

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://legitdata.com.ng/api/data/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"network":'.$network_id.',
"mobile_number": "'.$phone.'",
"plan": '.$plan.',
"Ported_number":true
}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Token ' . $api . '',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);   
$response = json_decode($response, true);

if (isset($response['error']['0'])){
       $response = 'Sorry this transaction could not be completed. Kindly contact Support.';
       header('location: ../../transaction/failed.php?response='.$response.'');
}else {
        $trans_id = $response['id'];
        $network = $response['plan_network'];
        $status = $response['Status'];
        $plan_name = $response['plan_name'];
        $phone = $response['mobile_number'];
        $newBalance = $userBalance - $amount;

        // Add to transactions
        $trans_sql = "INSERT INTO transactions (id, trans_id, network, phone, status, amount, plan_name) VALUES ($id,'$trans_id','$network','$phone','$status',$amount,'$plan_name')";
        $trans_query = mysqli_query($conn,$trans_sql);

        // update balance
        $sql = "UPDATE users  SET balance = $newBalance WHERE id = $id";
        $query = mysqli_query($conn, $sql);

       

        // redirect
        header('location: ../../transactions/success.php?id='.$trans_id.'');

}
    
    

} else {
    $msg = "Your Balance is not enough to carry out this transaction";
    $msg = urlencode($msg);
    header('location: ../../services/index.php?msg=' . $msg . '');
}

} else {
    $msg = "Enter a phone number to proceed";
    $msg = urlencode($msg);
    header('location: ../../services/index.php?msg=' . $msg . '');
}