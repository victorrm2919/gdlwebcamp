<?php 

require 'paypal/autoload.php';

define('URL_SITIO','http://localhost/gdlwebcamp');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AWHLK6npjnrjGbIGHzguqqMQAVbGHjDIMwS8mXfTGIXiRUeLLRluZcuT99M8fCdZWmUUxpaUMGz3wTXB', // ClienteID
        'EE4FL5zh9qV5fYzhrZXqk71vYDD3vGuyxPUMiV2JugB4CPjeqrbXItjPiKoz-Hsemkf-DLci6L9KXTtn'  //secret
    )
);