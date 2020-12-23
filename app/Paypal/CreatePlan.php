<?php

namespace App\Paypal;

use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Common\PayPalModel;
use PayPal\Api\PatchRequest;
use App\PaypalPlans;
use Auth;

class CreatePlan extends PayPal {

    public function create() {
        
        $plan = new Plan();
        $plan->setName('T-Shirt of the Month Club Plan')
                ->setDescription('Template creation.')
                ->setType('fixed');

        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
                ->setType('REGULAR')
                ->setFrequency('Month')
                ->setFrequencyInterval("1")
                ->setCycles("12")
                ->setAmount(new Currency(array('value' => 100, 'currency' => 'USD')));
        $chargeModel = new ChargeModel();
        $chargeModel->setType('SHIPPING')
                ->setAmount(new Currency(array('value' => 10, 'currency' => 'USD')));
        $paymentDefinition->setChargeModels(array($chargeModel));

        $merchantPreferences = new MerchantPreferences();


        $merchantPreferences->setReturnUrl(config('services.paypal.executeAgreement.success'))
                ->setCancelUrl(config('services.paypal.executeAgreement.failure'))
                ->setAutoBillAmount("yes")
                ->setInitialFailAmountAction("CONTINUE")
                ->setMaxFailAttempts("0")
                ->setSetupFee(new Currency(array('value' => 1, 'currency' => 'USD')));

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        $output = $plan->create($this->apiContext);
        dd($output);
    }

    /**
     * Create a new controller instance.
     *
     * @return Plan
     */
    /**
     * Create a new controller instance.
     *
     * @return PaymentDefinition
     */
    /**
     * Create a new controller instance.
     *
     * @return ChargeModel
     */
    /**
     * Create a new controller instance.
     *
     * @return MerchantPreferences
     */

    /**
     * Create a new controller instance.
     *
     * @return List Plan
     */
    public function ListPlan() {

        $params = array('page_size' => '2');
        $planList = Plan::all($params, $this->apiContext);
        return $planList;
    }

    public function PlanById($id) {
        $planDetails = Plan::get($id, $this->apiContext);

        return $planDetails;
    }

    public function ActivatePlan($id) {

        $patch = new Patch();
        $createdPlan = $this->PlanById($id);

        $value = new PayPalModel('{
	       "state":"ACTIVE"
	     }');

        $patch->setOp('replace')
                ->setPath('/')
                ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);

        $createdPlan->update($patchRequest, $this->apiContext);

        $plan = Plan::get($createdPlan->getId(), $this->apiContext);

        return $plan;
    }

}
