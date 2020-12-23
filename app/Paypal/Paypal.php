<?php

namespace App\Paypal;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\Amount;
class Paypal {

    protected $apiContext;

    function __construct() {

        $this->apiContext = new ApiContext(
                new OAuthTokenCredential(
                        config('services.paypal.client_id'),
                        config('services.paypal.client_secret')
                )
        );
    }
    
    
    public function details($total) {
        $details = new Details();
        $details->setShipping(1.2)
                ->setTax(1.3)
                ->setSubtotal($total);
        return $details;
    }

    public function Amount($details,$GrandTotal) {
        $amount = new Amount();
        $amount->setCurrency("USD")
                ->setTotal($GrandTotal)
                ->setDetails($details);
        return $amount;
    }

}
