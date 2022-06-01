<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://halleldatang.com/api/topup/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"network":1,
"amount":100,
"mobile_number":"09032431003",
"Ported_number":true,
"airtime_type":"VTU"

}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token b5b7fd471655bba431c9b9a0084a2aae7cf52b1f',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;