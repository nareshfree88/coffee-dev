<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;
use Auth;
use Carbon\Carbon;
use Stripe;
use App\User;
use App\Subscription_plan;
use App\Http\Support\Helper;
use App\Trysubscription;

class SubscribeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $address = \App\Address::where('user_id', Auth::id())->first();
        return view('user.subscribe.subscribe', compact('address'));
    }

    
    public function profile() {
        $user = '';
        $retrive='';
        $SubscriptionStatus = Trysubscription::where('user_id', Auth::id())->where('status', '1')->get();
      
        foreach ($SubscriptionStatus as $subStatus):
            if ($subStatus):
                $user = User::where('id', $subStatus->user_id)->first();

                $retrive = $subStatus;
            else:
                $retrive = '';
            endif;

        endforeach;
     

        $data = Trysubscription::where('user_id', Auth::id())->first();

        return view('user/page/profile', compact('SubscriptionStatus','retrive', 'data', 'user'));
    }

    public function store(Request $request) {

        $user = Auth::user();
        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentMethod = $request->payment_method;
        $planId = $request->plan;

        $Subs_pans = Subscription_plan::where('price_id', $planId)->first();

        $subscription = $user->newSubscription('main', $planId);

        $customer = $subscription->create($paymentMethod, [
            'email' => $user->email,
            'name' => $user->name,
            'description' => 'Subscription'
        ]);

        \App\Address::updateOrCreate(['user_id' => Auth::id()], [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'user_id' => Auth::id(),
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'post_code' => $request->post_code,
            'default_address' => '1'
        ]);

        return response()->json(['status' => '200', 'message' => 'Subscribed successfully', 'url' => url('/profile')]);
    }

    public function getCancel(Request $request) {
        $retrive = '';
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $cancel = $stripe->subscriptions->cancel(
                $request->sub_id,
        );

        $updateSubscription = Trysubscription::where('subscription_id', $request->sub_id)->update([
            'status' => '0',
            'ended_at' => $cancel->current_period_end,
            'started_at' => $cancel->current_period_start,
            'end_date' => $cancel->ended_at
        ]);
        $data = Trysubscription::where('user_id', Auth::id())->first();

        return view('user/page/profile', compact('data', 'retrive'));
//        return redirect()->back()->with('cancel');
    }

    public function reccuringIndex($pack) {
        return view('user/subscribe/recrring_subscribe', compact('pack'));
    }

    public function reccuringPost(Request $request) {

        $subscription_plans = \App\Subscription_plan::where('recurring', $request->pack)->first();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(
                env('STRIPE_KEY')
        );
//        $user = \App\User::where('id', Auth::id())->first();

        $customer = Stripe\Customer::create([
                    'name' => $request->fname,
                    'description' => $request->pack . 'Product Subscription',
                    'email' => $request->email,
                    "source" => $request->stripeToken,
                    "address" => ["city" => $request->city, "country" => 'US', "line1" => $request->address, "line2" => "", "postal_code" => '135002', "state" => 'CA']
        ]);


//        $product = $stripe->products->create([
//            'name' => 'Sivler Special',
//        ]);
//        $price = $stripe->prices->create([
//            'unit_amount' => 10 * 100,
//            'currency' => $request->currency,
//            'recurring' => ['interval' => 'week'],
//            'product' => $product->id,
//        ]);

        $subscription = $stripe->subscriptions->create([
            'customer' => $customer->id,
            'items' => [
                ['price' => $subscription_plans->price_id],
            ],
        ]);

        $charge = Stripe\Charge::create([
                    "customer" => $customer->id,
                    "amount" => $subscription_plans->price,
                    "currency" => 'CAD',
                    "description" => "this is Subscription",
        ]);
        $subscriptionInsert = \App\Subscription::create([
                    'user_id' => Auth::id(),
                    'name' => $subscription_plans->plan_name,
                    'stripe_id' => $subscription->id,
                    'stripe_status' => 'Active',
                    'stripe_plan' => $subscription_plans->price_id,
                    'quantity' => 1,
        ]);

//        $invoice = $stripe->invoices->create([
//            'customer' => $customer->id,
//        ]);


        return view('user/page/profile');
    }

}
