<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Stripe;
use App\User;
use App\Address;
use App\Payment;
use App\Cart;
use App\Order;
use App\Giftsubscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;
use App\Mail\MainSubscriptionMail;
use App\Mail\ProductMail;
use App\Paypal\CreatePlan;

class StripePaymentController extends Controller {

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe() {
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        return view('user/payment/stripe', ['totalPrice' => $cart->totalPrice]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request) {


        $user = User::where("id", Auth::id())->first();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Stripe\Customer::create([
                    'name' => $request->name,
                    'description' => 'Stripe Customer',
                    'email' => $user->email,
                    "source" => $request->stripeToken,
                    "address" => ["city" => $request->city, "country" => 'US', "line1" => $request->address, "line2" => "", "postal_code" => $request->post_code, "state" => 'CA']
        ]);
//#####################################################################################################################

        $subscribe = Session::has('subscribe') ? Session::get('subscribe') : null;

        if ($subscribe != null):
            $SubscriptionUnitAmount = number_format($subscribe['subTotal']) + 10;

            $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $Createproduct = \Stripe\Product::create([
                        'name' => 'Try Subscription',
            ]);

            $price = \Stripe\Price::create([
                        'product' => $Createproduct->id,
                        'unit_amount' => $SubscriptionUnitAmount * 100,
                        'currency' => $request->currency,
                        'recurring' => [
                            'interval' => 'month',
                        ],
            ]);
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $Subscription = $stripe->subscriptions->create([
                'customer' => $customer->id,
                'items' => [
                    ['price' => $price->id],
                ],
            ]);


            $subscriptionTotal = array_pop($subscribe);
            \App\Trysubscription::create([
                'name' => 'Subscription',
                'user_id' => Auth::id(),
                'subscription_id' => $Subscription->id,
                'bag_qty' => json_encode($subscribe),
                'total_bag_price' => $subscriptionTotal,
                'bag_per_month' => 1,
                'ended_at' => $Subscription->current_period_end,
                'started_at' => $Subscription->created,
                'end_date' => $Subscription->current_period_end,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'post_code' => $request->post_code,
                'country' => $request->country,
                'status' => '1'
            ]);

            $MainData = [
                'email' => $user->email,
                'subscription_id' => $Subscription->id,
                'ended_at' => $Subscription->current_period_end,
                'started_at' => $Subscription->created,
                'end_date' => $Subscription->current_period_end,
            ];
            Mail::to($user->email)->send(new MainSubscriptionMail($MainData));
            Session::forget('subscribe');
        endif;
//###############################End code ###########################################################################
//############################################# Gift Subscription ##############################################
//dd($request->subscription_type);

        if ($request->subscription_type !== null) {
            if (Session::has('giftcart')):


                $giftcart = Session::get('giftcart');

                foreach ($giftcart->items as $item) {

                    $subscrption = \App\Giftsubscription::create([
                                'user_id' => Auth::id(),
                                'name' => $request->subscription_type,
                                'price' => $item['price'],
                                'customer_trans_id' => $customer->id,
                                'quantity' => $request->quantity,
                                'month' => $item['item']['month'],
                                'subscription_code' => rand(),
                                'status' => 1,
                    ]);
//                    $giftsubscription_id[] = $subscrption->id;
//                    $giftsubscription_price[] = $subscrption->price;
                    $user = User::select('id', 'name', 'email')->where('id', $subscrption->user_id)->first();
                    $data = [
                        'subscription_code' => $subscrption->subscription_code,
                        'user' => $user->name,
                        'name' => $subscrption->name,
                        'price' => $subscrption->price,
                        'currency' => $request->currency,
                        'quantity' => $subscrption->quantity,
                        'month' => $subscrption->month,
                    ];
                    Mail::to($user->email)->send(new SubscriptionMail($data));
                }
            endif;
        }
//##################################################### End gift cart ###############################################
//################################## Product Code ###################################################################        

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $OriginalData = array();
        if (is_array($cart->items) || is_object($cart->items)) {
            foreach ($cart->items as $products) {
                $order = [
                    'user_id' => Auth::id(),
                    'product_name' => $products['item']['name'],
                    'product_price' => $products['item']['price'],
                    'quantity' => $products['qty'],
                    'product_id' => $products['item']['id'],
                    'sub_total' => $products['price'],
                    'gift_sub_total' => isset($request->giftprice) ? $request->giftprice : 0,
                    'grand_total' => $request->total,
                    'order_status' => '1',
                    'currency' => $request->currency
                ];

                array_push($OriginalData, $order);
            }


            $Order = Order::create([
                        'user_id' => Auth::id(),
                        'product_name' => $products['item']['name'],
                        'product_price' => $products['item']['price'],
                        'quantity' => $products['qty'],
                        'product_id' => $products['item']['id'],
                        'flat_rate' => $request->flat_rate,
                        'customer_trans_id' => $customer->id,
                        'product_description' => json_encode($OriginalData),
                        'sub_total' => ($products['price'] + $request->flat_rate),
                        'gift_sub_total' => isset($request->giftprice) ? $request->giftprice : 0,
                        'grand_total' => $request->total,
                        'order_status' => '1',
                        'currency' => $request->currency,
                        'subscription_amt' => $request->subscriptionAmt
            ]);
            $user = User::where('id', $Order->user_id)->first();
            $productData = [
                'name' => $user->name,
                'product_name' => $Order->product_name,
                'total' => $Order->grand_total,
                'products' => $Order->product_description,
                'currency' => $request->currency,
                'shipping' => $request->flat_rate,
            ];

            Mail::to($user->email)->send(new ProductMail($productData));
        }
//#################################################End Product code #############################################        



        $charge = Stripe\Charge::create([
                    "customer" => $customer->id,
                    "amount" => $request->total * 100,
                    "currency" => $request->currency,
                    "description" => "Islands.cafe",
        ]);

        $payment = Payment::create([
                    'user_id' => Auth::id(),
                    'params' => json_encode($customer),
                    'charge_id' => $customer->id,
                    'charge_type' => 'Stripe'
        ]);






//cart session
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $cart->totalPrice = $cart->totalPrice - $request->product_total_price;
        unset($cart->items);
        $request->session()->put('cart', $cart);

//gift Subscription cart session
        $oldGiftCart = Session::get('giftcart');
        $giftcart = new Cart($oldGiftCart);
        $giftcart->totalPrice = $giftcart->totalPrice - $request->Sub_totalprice;
        unset($giftcart->items);
        $request->session()->put('giftcart', $giftcart);
        $request->session()->get('giftcart');

//        grand total of cart
        $gTotal = Session::has('gTotal') ? Session::get('gTotal') : null;
        $discountAmount = Session::has('TotalDiscount') ? Session::get('TotalDiscount') : null;
        Session::forget('gTotal', $gTotal);
        Session::forget('TotalDiscount', $discountAmount);

        return view('user/success');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function paypalPayment(Request $request) {

        $payment = Payment::create([
                    'user_id' => Auth::id(),
                    'params' => json_encode($request->params),
                    'charge_id' => $request->charge_id,
                    'charge_type' => 'PayPal'
        ]);
//######################### ##Product code  ############################################################################

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $OriginalData = array();
        if (is_array($cart->items) || is_object($cart->items)) {
            foreach ($cart->items as $products) {
                $order = [
                    'user_id' => Auth::id(),
                    'product_name' => $products['item']['name'],
                    'product_price' => $products['item']['price'],
                    'quantity' => $products['qty'],
                    'product_id' => $products['item']['id'],
                    'sub_total' => $products['price'],
                    'gift_sub_total' => isset($request->giftprice) ? $request->giftprice : 0,
                    'grand_total' => $request->total,
                    'order_status' => '1',
                    'currency' => $request->currency
                ];

                array_push($OriginalData, $order);
            }


            $Order = Order::create([
                        'user_id' => Auth::id(),
                        'product_name' => $products['item']['name'],
                        'product_price' => $products['item']['price'],
                        'quantity' => $products['qty'],
                        'product_id' => $products['item']['id'],
                        'flat_rate' => $request->flat_rate,
                        'customer_trans_id' => $request->charge_id,
                        'product_description' => json_encode($OriginalData),
                        'sub_total' => ($products['price'] + $request->flat_rate),
                        'gift_sub_total' => isset($request->giftprice) ? $request->giftprice : 0,
                        'grand_total' => $request->total,
                        'order_status' => '1',
                        'currency' => $request->currency,
                        'subscription_amt' => $request->subscriptionAmt
            ]);
            $user = User::where('id', $Order->user_id)->first();
            $productData = [
                'name' => $user->name,
                'product_name' => $Order->product_name,
                'total' => $Order->grand_total,
                'products' => $Order->product_description,
                'currency' => $request->currency,
                'shipping' => $request->flat_rate,
            ];

            Mail::to($user->email)->send(new ProductMail($productData));
        }
// ############################# End Product Code ######################################################
// ##############################################  Subscription code---------------------------->

        $subscribe = Session::has('subscribe') ? Session::get('subscribe') : null;

        if ($subscribe != null):
            $SubscriptionUnitAmount = number_format($subscribe['subTotal']) + 10;
            $Newdate = date('d-m-Y');
            $next_due_date = strtotime($Newdate . ' +31 days');



            $subscriptionTotal = array_pop($subscribe);
            \App\Trysubscription::create([
                'name' => 'Subscription',
                'user_id' => Auth::id(),
                'subscription_id' => $request->charge_id,
                'bag_qty' => json_encode($subscribe),
                'total_bag_price' => $subscriptionTotal,
                'bag_per_month' => 1,
                'ended_at' => $next_due_date,
                'started_at' => strtotime($Newdate),
                'end_date' => $next_due_date,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'post_code' => $request->post_code,
                'country' => $request->country,
                'status' => '1'
            ]);
            $MainData = [
                'email' => $request->email,
                'subscription_id' => $request->charge_id,
                'ended_at' => $next_due_date,
                'started_at' => strtotime($Newdate),
                'end_date' => $next_due_date,
            ];
            Mail::to('ashumehra768@outlook.com')->send(new MainSubscriptionMail($MainData)); //$user->email
            Session::forget('subscribe');
        endif;

//################################################  End Subscription code ------------------------->
//########################## Gift Subscription Code #################################################->

        if ($request->subscription_type !== null) {
            if (Session::has('giftcart'))
                $giftcart = Session::get('giftcart');

            foreach ($giftcart->items as $item) {

                $subscrption = \App\Giftsubscription::create([
                            'user_id' => Auth::id(),
                            'name' => $request->subscription_type,
                            'price' => $item['price'],
                            'customer_trans_id' => $request->params['payerID'],
                            'quantity' => $request->quantity,
                            'month' => $item['item']['month'],
                            'subscription_code' => rand(),
                            'status' => 1,
                ]);

                $user = User::select('id', 'name', 'email')->where('id', $subscrption->user_id)->first();
                $data = [
                    'subscription_code' => $subscrption->subscription_code,
                    'user' => $user->name,
                    'name' => $subscrption->name,
                    'price' => ($subscrption->price + $request->flat_rate),
                    'currency' => $request->currency,
                    'quantity' => $subscrption->quantity,
                    'month' => $subscrption->month,
                ];
                Mail::to($user->email)->send(new SubscriptionMail($data));
            }
        }
// ################################ End Gift- Subscription code  ############################################


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $cart->totalPrice = $cart->totalPrice - $request->product_total_price;
        unset($cart->items);
        $request->session()->put('cart', $cart);

//gift Subscription cart session
        $oldGiftCart = Session::get('giftcart');
        $giftcart = new Cart($oldGiftCart);
        $giftcart->totalPrice = $giftcart->totalPrice - $request->Sub_totalprice;
        unset($giftcart->items);
        $request->session()->put('giftcart', $giftcart);
        $request->session()->get('giftcart');

//        grand total of cart
        $gTotal = Session::has('gTotal') ? Session::get('gTotal') : null;
        $discountAmount = Session::has('TotalDiscount') ? Session::get('TotalDiscount') : null;
        Session::forget('gTotal', $gTotal);
        Session::forget('TotalDiscount', $discountAmount);



        return response()->json(['success' => true]);
    }

    public function order_success() {
        return view('user/success');
    }

}
