<?php

//url aquispe
define('URL_SITIO', 'http://192.168.64.2/proyecto');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ActthXHJkmlt30ibGjqN3Bt_sgOdk1Cap4sjD3q3ErVvqUnGO0pqUH13pkKA44J_9cdvnP3B7QjE7_pW',     // ClientID
        'EClnHjHD7ZOxaIj4AcGP3T1Mfk73DGBZcOcADlXck-IpOanBunuBe2FjYIC68GZz70xpTGTc1ovEk2Ae'      // ClientSecret
    )
);
