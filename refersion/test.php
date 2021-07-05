<?php

$post = array(
    "affiliate_code" => "a3y7",
    "type" => "COUPON",
    "trigger" => 'CODE100',
    );

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.refersion.com/api/new_affiliate_trigger');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post));
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    "content-type: application/json",
    "refersion-public-key: pub_7ba1d3d7cd9c413a146f",
    "refersion-secret-key: sec_054af8c1d49277550cb1"
));
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
