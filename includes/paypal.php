<?php 

require 'paypal/autoload.php';

define('URL_SITIO','http://localhost/gdlwebcamp');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AflALVgpoZzjWKwFIPowparUw6VkcRBT2G4AFbmR-73NFy-NEdzQYPP92Ov2l7E42BBHkUvrHLsRoGi3', // ClienteID
        'EMpGoY9cGSpuE0i6Aa4HQJERY3uimon1GmTXSUrKmXqoczbiZS8bZD9D1Kvekx4gM4hPoG5DWXY-c6Jh'  //secret
    )
);