<?php

define('API_HOST', "https://numa-dev.myshopify.com");
define('PROJECT_PATH', '/webhooks/products/create');
define('DOMAIN', 'https://f3f2f54f89cd.ngrok.io');
define('API_KEY', '96675de6bbf8396c257dba925cf2ccfe');
define('API_PASS', 'bdc10dad4728db576d2e9a2ea2ad0fa6');
define('API_VERSION', '2019-04');

$access_token = 'e106cb4267223cf36f9bcfaf72983a2831dce8e3e9cc446ee2b1f973b10c8d4e';

$shop_url = API_KEY . ":" . API_PASS . '@' . DOMAIN;

$arr = array(
    'webhook' => array(
        'topic' => 'products/create',
        'address' => DOMAIN . PROJECT_PATH,
        'format' => 'json'
        )
    );

// $webhooks = shopify_call($access_token, $shop_url, 'admin/api/' . API_VERSION . '/webhooks.json', $arr, 'POST');
$webhooks = json_decode($webhooks['response'], true);

echo print_r($webhooks);


//since this is not a shopify app, we aren't using this code.  Configured webhook in shopify.