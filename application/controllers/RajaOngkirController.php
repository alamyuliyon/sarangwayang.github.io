<?php

$curl = curl_init();

curl_setopt_array($curl, array(
   CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
   CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      "key: ad6f75cae274cc79ae3d0cd18aba96e5"
   ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
   echo "cURL Error #:" . $err;
} else {
   echo $response;
}
