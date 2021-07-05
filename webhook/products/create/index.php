<?php
require '/Users/christian/Documents/Projects/refersion_be/refersion/conversionTrigger.php';
/**
 * verify 
 */
function verify_request($data, $hmac) {
    if (isset($hmac)) {
        $verify_hmac = base64_encode(hash_hmac('sha256', $data, 'e106cb4267223cf36f9bcfaf72983a2831dce8e3e9cc446ee2b1f973b10c8d4e', true));
        return hash_equals($hmac, $verify_hmac);
    }

    return false;
}

function getSkuId($sku){   
    $arr = explode(':', $sku);
    return $arr[1];
}

$my_hmac = $_SERVER["HTTP_X_SHOPIFY_HMAC_SHA256"];

$data = file_get_contents('php://input'); //get headers
$json = json_decode($data, true); //associated array
$response = '';
$affilID = 'rfsnadid';

if (verify_request($data, $my_hmac)) {
    $response = $json;
    foreach($response['variants'] as $variant) {
        $sku = $variant['sku'];

        //set the conversion triggers
        if (strpos($sku, $affilID) !== false) {
            $trigger = getSkuId($sku);
            $ct = new ConversionTrigger;
            $ct->affiliate_code = '16d337';
            $ct->trigger_id = $trigger;
            
            if ($ct->setConversionTrigger($trigger)){
                $response = 'Merchant Verified, Affiliate Converted';
            }
        }
    }
    
} else {
    $response = 'ERROR: Cannot verify merchant.';
}

echo $response;
