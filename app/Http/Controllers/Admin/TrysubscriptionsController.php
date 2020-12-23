<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;
use App\Product;
use App\Trysubscription;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\User;

use App\EmailContent;

class TrysubscriptionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        
        $trysubscriptions = Trysubscription::with('get_user')->orderBy('id', 'DESC')->get();
        return view('admin.trysubscriptions.index', compact('trysubscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.trysubscriptions.create');
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

        Trysubscription::create($requestData);

        return redirect('admin/trysubscriptions')->with('flash_message', 'Trysubscription added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $trysubscription = Trysubscription::findOrFail($id);

        return view('admin.trysubscriptions.show', compact('trysubscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $trysubscription = Trysubscription::findOrFail($id);

        return view('admin.trysubscriptions.edit', compact('trysubscription'));
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

        $trysubscription = Trysubscription::findOrFail($id);
        $trysubscription->update($requestData);

        return redirect('admin/trysubscriptions')->with('flash_message', 'Trysubscription updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Trysubscription::destroy($id);

        return redirect('admin/trysubscriptions')->with('flash_message', 'Trysubscription deleted!');
    }

    public function wholeBeans() {
        $wholeBrans = Product::where('category', 'whole_beans')->get();
        $equipments = Product::where('category', 'equipment')->where('equip_addon', 'equipment')->get();
        $filters = Product::where('category', 'equipment')->where('equip_addon', 'filter')->get();
        $merch = Product::where('category', 'equipment')->where('equip_addon', 'merch')->get();
        return view('user/try-subscription/try-subscription', compact('wholeBrans', 'equipments', 'filters', 'merch'));
    }

    public function subscribe(Request $request) {
       
        $input = $request->all();
       
        $total = $input['subTotal'];
        $request->session()->put('subscribe', $input);
        
        return response()->json(['url'=>url('/checkout')]);
    }
    
    
    public function TrySubscriptionStatus(Request $request){
       
        
         $subscription = Trysubscription::where('id', $request->trySubscription_id)->update([
            'shipping_status' => $request->Order_status,
            'tracking_id'=>$request->tracking_id,
        ]);
      
        $SubscriptionDetails = Trysubscription::where('id', $request->trySubscription_id)->first();
       
     
        $user = User::where('id', $SubscriptionDetails->user_id)->first();
     
        $email = EmailContent::where('status', $request->Order_status)->latest()->first();
       
        $data = [
            'name' => $user->email,
            'product_name' => $SubscriptionDetails->name,
            'content' => $email->content 
        ];
        $mail = Mail::to('ashumehra768@outlook.com')->send(new OrderStatusMail($data));

        return redirect()->back()->with('success', 'status Updated Successfully.!');
        
    }

}
