<?php

if (isset($_POST['submit'])) {
    $DiscoName = $_POST['DiscoName'];
    $meter_type = $_POST['meter_type'];
    $meter_number = $_POST['meter_number'];
    $amount = $_POST['amount'];
}
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://halleldatang.com/api/billpayment/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"disco_name":'.$DiscoName.',
"amount":'.$amount.',
"meter_number": "'.$meter_number. '",
"MeterType": 1,
"Ported_number":true

}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Token b5b7fd471655bba431c9b9a0084a2aae7cf52b1f',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
