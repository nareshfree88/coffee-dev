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
use Session;

class CreatePayment extends PayPal {

    public function create($data) {
      
        $oldcart = session::has('cart') ? session::get('cart') : null;
        $cart = new \App\Cart($oldcart);


        $payer = $this->payer();
        $itemList = $this->itemList($this->Item($data['total'])); //, $this->Item2()
       
        
        $details = $this->details($data['total']);
        $GrandTotal = $data['total'] + ($details->shipping + $details->tax);
        
        $this->Amount($details, $GrandTotal);


        $amount = $this->Amount($details, $GrandTotal);
        $transaction = $this->transaction($amount, $itemList);
        $redirectUrls = $this->redirectUrls();

        $payment = $this->payment($payer, $redirectUrls, $transaction);

        return redirect($payment);
    }

    protected function payer() {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        return $payer;
    }

    protected function Item($price) {
        $item1 = new Item();
        $item1->setName('Coffee-Product')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setSku("123123") // Similar to `item_number` in Classic API
                ->setPrice($price);
        return $item1;
    }

//    protected function Item2() {
//        $item2 = new Item();
//        $item2->setName('Granola bars')
//                ->setCurrency('USD')
//                ->setQuantity(5)
//                ->setSku("321321") // Similar to `item_number` in Classic API
//                ->setPrice(2);
//        return $item2;
//    }

    protected function itemList($item1) {
        $itemList = new ItemList();
        $itemList->setItems(array($item1));
        return $itemList;
    }

    protected function transaction($amount, $itemList) {
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setInvoiceNumber(uniqid());
        return $transaction;
    }

    protected function payment($payer, $redirectUrls, $transaction) {
        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
        $payment->create($this->apiContext);
        $approvalUrl = $payment->getApprovalLink();
        return $approvalUrl;
    }

    protected function redirectUrls() {
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(config("services.paypal.redirect"))
                ->setCancelUrl(config("services.paypal.cancel"));
        return $redirectUrls;
    }

}
