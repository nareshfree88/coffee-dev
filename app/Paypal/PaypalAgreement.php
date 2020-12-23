<?php

namespace App\Paypal;

use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

class PaypalAgreement extends Paypal {

    public function create($id) {

        $agreement = $this->Agreement($id);

        try {

            $agreement = $agreement->create($this->apiContext);
            $approvalUrl = $agreement->getApprovalLink();
            return redirect($approvalUrl);
        } catch (\Exception $ex) {
            return $ex->getData();
        }
    }

    protected function Agreement($id) {
       
        $agreement = new Agreement();
        $agreement->setName('Base Agreement')
                ->setDescription('Basic Agreement')
                ->setStartDate('2021-12-08T09:13:49Z');

        $agreement->setPlan($this->Plan($id));
        $agreement->setPayer($this->Payer());
        $agreement->setShippingAddress($this->ShippingAddress());
        return $agreement;
    }

    protected function Plan($id) {
        $plan = new Plan();
        $plan->setId($id);
        return $plan;
    }

    protected function Payer() {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        return $payer;
    }

    protected function ShippingAddress() {
        $shippingAddress = new ShippingAddress();
        $shippingAddress->setLine1('111 First Street')
                ->setCity('Saratoga')
                ->setState('CA')
                ->setPostalCode('95070')
                ->setCountryCode('US');
        return $shippingAddress;
    }

    public function execute($token) {
      

        $agreement = new Agreement();
        return $agreement->execute($token, $this->apiContext);
    }

}
