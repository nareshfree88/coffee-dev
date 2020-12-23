<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Used to process plans
//use PayPal\Api\ChargeModel;
//use PayPal\Api\Currency;
//use PayPal\Api\MerchantPreferences;
//use PayPal\Api\PaymentDefinition;
//use PayPal\Api\Plan;
//use PayPal\Api\Patch;
//use PayPal\Api\PatchRequest;
//use PayPal\Common\PayPalModel;
use App\Paypal\CreatePayment;
use App\Paypal\CreatePlan;
use PayPal\Api\PaymentExecution;
use App\Paypal\ExecutePayment;
use App\Paypal\PaypalAgreement;
use Session;

class PaypalController extends Controller {

    public function create(Request $request) {
        
        $payment = new CreatePayment;
        return $payment->create($request->all());
    }

    public function execute() {
        $payment = new ExecutePayment;
        return $payment->execute();
    }

    public function CreatePlan() {
        $plan = new CreatePlan;
        return $plan->create();
    }

    public function ListPlan() {
        $Plan = new CreatePlan;
        echo '<pre>';
        dd($Plan->ListPlan());
        return $Plan->ListPlan();
    }

    public function PlanDetails($id) {
        $plan = new CreatePlan;
        return $plan->PlanById($id);
    }

    public function activate($id) {
        $plan = new CreatePlan;
        return $plan->ActivatePlan($id);
    }

    public function CreateAgreement($id) {
        $agreement = new PaypalAgreement;

        return $agreement->create($id);
    }

    public function executeAgreement($status) {
        if ($status == true):
            $token = $_GET['token'];
            $agreement = new PaypalAgreement;
            $agreement->execute($token);
        endif;
        return 'Payment Successful';
    }

}
