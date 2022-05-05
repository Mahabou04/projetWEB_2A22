<?php
    require_once "assets/stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51KvoHwI69pGDO312QyXfT6L8js38KeO28dyXMc6qRce1gokFFkibjBd5F6XJCAC6eraCpgB9mEyP4NO9yG9eR8La00gakgt0cW",
        "publishableKey" => "pk_test_51KvoHwI69pGDO312KhU2uHpV0pXclISHGPxC3CTgDxgxPwfX71w3zFzBXwRUipijHKVjVwjcw7cBsTz722oYaIXI00vbqjWCTr"
    );

    \Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>