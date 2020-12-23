<?php

namespace App\Paypal;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

class ExecutePayment extends Paypal {

    public function execute() {

        $paymentId = $this->GetThePayment();

        $execution = $this->CreateExecution();

        $details = $this->details();
        $amount = $this->amount($details);
        $transaction = $this->transaction($amount);

        $execution->addTransaction($transaction);
        $payment = Payment::get($paymentId, $this->apiContext);
        $result = $payment->execute($execution, $this->apiContext);

        return $result;
    }

    protected function GetThePayment() {
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);
        return $paymentId;
    }

    protected function CreateExecution() {
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));
        return $execution;
    }

    protected function details() {
        $details = new Details();
        $details->setShipping(2.2)
                ->setTax(1.3)
                ->setSubtotal(17.50);
        return $details;
    }

    protected function amount($details) {
        $amount = new Amount();
        $amount->setCurrency('USD');
        $amount->setTotal(21);
        $amount->setDetails($details);
        return $amount;
    }

    protected function transaction($amount) {
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        return $transaction;
    }

}
