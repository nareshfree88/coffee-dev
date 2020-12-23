<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Stripe;
use Illuminate\Validation\Validator;
use App\Subscription_plan;
use Illuminate\Http\Request;

class Subscription_plansController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $subscription_plans = Subscription_plan::where('plan_name', 'LIKE', "%$keyword%")
                            ->orWhere('price', 'LIKE', "%$keyword%")
                            ->orWhere('currency', 'LIKE', "%$keyword%")
                            ->orWhere('recurring', 'LIKE', "%$keyword%")
                            ->orWhere('image', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $subscription_plans = Subscription_plan::latest()->paginate($perPage);
        }

        return view('admin.subscription_plans.index', compact('subscription_plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.subscription_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        $requestData = $request->all();
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $product = \Stripe\Product::create([
                    'name' => $request->plan_name,
                    'images' => $request->$image,
        ]);

        $price = \Stripe\Price::create([
                    'product' => $product->id,
                    'unit_amount' => $request->price * 100,
                    'currency' => $request->currency,
                    'recurring' => [
                        'interval' => $request->recurring,
                    ],
        ]);

        $requestData['price_id'] = $price->id;
        $requestData['product_id'] = $product->id;
        $requestData['image'] = $name;
        Subscription_plan::create($requestData);

        return redirect('admin/subscription_plans')->with('flash_message', 'Subscription plan added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $subscription_plan = Subscription_plan::findOrFail($id);

        return view('admin.subscription_plans.show', compact('subscription_plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $subscription_plan = Subscription_plan::findOrFail($id);

        return view('admin.subscription_plans.edit', compact('subscription_plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {

        $subscription_plan = \App\Subscription_plan::where('id', $id)->first();
        $requestData = $request->all();
        $stripe = new \Stripe\StripeClient(
                'sk_test_MMS0Hq1stljp6oq5GfiFh3d300vvcBfMsn'
        );
        $stripe->products->update(
                $subscription_plan->product_id,
                [
                    'name' => $request->plan_name,
                ]
        );

        $subscription_plan = Subscription_plan::findOrFail($id);
        $subscription_plan->update($requestData);

        return redirect('admin/subscription_plans')->with('flash_message', 'Subscription_plan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Subscription_plan::destroy($id);

        return redirect('admin/subscription_plans')->with('flash_message', 'Subscription_plan deleted!');
    }

}
