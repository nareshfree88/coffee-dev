<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Giftsubscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\TrackShipping;
use App\User;
use App\EmailContent;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;
use App\Subscription;
class SubscriptionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {

        $subscriptions = Giftsubscription::get();
        $trackShipping = TrackShipping::get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function RecurringIndex() {
        $subscription = \App\Subscription::get();
        return view('admin.subscriptions.recurring', compact('subscription'));
    }

    public function RecurringShow($id) {
        $subscription = \App\Subscription::where('id', $id)->first();
        return view('admin.subscriptions.show-recurring', compact('subscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.subscriptions.create');
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

        Giftsubscription::create($requestData);

        return redirect('admin/subscriptions')->with('flash_message', 'Subscription added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $subscription = Giftsubscription::findOrFail($id);
        $trackerId = TrackShipping::where('gift_subscription_id', $id)->get();


        return view('admin.subscriptions.show', compact('subscription', 'trackerId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $subscription = Giftsubscription::findOrFail($id);

        return view('admin.subscriptions.edit', compact('subscription'));
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

        $requestData = $request->all();

        $subscription = Giftsubscription::findOrFail($id);
        $subscription->update($requestData);

        return redirect('admin/subscriptions')->with('flash_message', 'Subscription updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
     
        Giftsubscription::destroy($id);

        return redirect('admin/subscriptions')->with('flash_message', 'Subscription deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function claimView() {
        return view('user/gift-subscription/claim-subscription');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function claimPost(Request $request) {
        if ($request->ajax()) {
            $code = $request->code;
            $Subscription = Giftsubscription::where('subscription_code', $code)->where('status', '0')->first();
            if ($Subscription !== null):
                return response()->json(['msg' => 'code matched']);
            else:
                return response()->json(['error' => 'Gift-subscription not found']);
            endif;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function claimShippingAddress(Request $request) {

        $input = $request->all();

        $subscription = Giftsubscription::where('subscription_code', $input['sub_code'])->first();
        $days = 30 * $subscription['month'];
        $subscription['status'] = '1';
        $subscription['request_grind'] = $input['request_grind'];
        $subscription['claimed_at'] = Carbon::now();
        $subscription['expiring_at'] = Carbon::now()->addDays($days);
        $subscription->fill($input);
        $subscription->save();
        return redirect()->back()->with('message','Claim Successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function SubscriptionStatus(Request $request) {

        $details = Giftsubscription::where('id', $request->gift_subscription_id)->first();

        $UpdateDetails = Giftsubscription::where('id', $request->gift_subscription_id)->update([
            'shipping_status' => $request->Subscription_status,
            'tracking_id' => $request->tracking_id,
            'shipping_month' => $request->sub_month,
        ]);

        $create = TrackShipping::updateOrCreate(['month' => $request->sub_month, 'gift_subscription_id' => $request->gift_subscription_id], [
                    'user_id' => $details->user_id,
                    'tracking_id' => $request->tracking_id,
                    $request->month . '_month' => $request->sub_month,
                    'gift_subscription_id' => $request->gift_subscription_id,
                    'status' => $request->Subscription_status
        ]);
        
        $user = User::where('id', $details->user_id)->first();
     
        $email = EmailContent::where('status', $request->Subscription_status)->latest()->first();

        $data = [
            'name' => $user->email,
            'product_name' => $details->name,
            'content' => $email->content
        ];

        $mail = Mail::to('ashumehra768@outlook.com')->send(new OrderStatusMail($data));

        return redirect()->back()->with("message", "Status Update Successfully.!");
    }

}
