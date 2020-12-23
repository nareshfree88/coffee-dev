<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Address;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Cart;
use App\User;

class AddressesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $user_addr) {

        $addresses = Address::where('user_id', $user_addr)->get();
        return view('admin.addresses.index', compact('addresses', 'user_addr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($user_addr) {

        return view('admin.addresses.create', compact('user_addr'));
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
       
        $data = $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'post_code' => 'required',
            'default_address' => 'required',
        ]);
      
        $data['user_id'] = $request->userid;
        Address::create($data);

        return redirect('admin/addresses/' . $request->userid)->with('flash_message', 'Address added!');
    }

    public function checkoutView() {
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);

        $oldgiftcart = Session::get('giftcart');
        $giftcart = new Cart($oldgiftcart);

        $subscribe = Session::has('subscribe') ? Session::get('subscribe') : null;
        if ($subscribe != null):
            $subscriptionTotal = array_pop($subscribe);
        else:
            $subscriptionTotal = 0;
        endif;
        $address = Address::where('user_id', Auth::id())->first();
       

        return view('user/shipping_address/create', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice], ['gift' => $giftcart->items, 'giftPrice' => $giftcart->totalPrice, 'subscribe' => $subscribe, 'subscriptionTotal' => $subscriptionTotal,'userAddress'=>$address]);
    }

    public function shippingAddress(Request $request) {

        $requestData = $request->all();

        $data = $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'flat_rate' => '',
            'post_code' => 'required',
            'default_address' => 'required',
        ]);

        $data['user_id'] = Auth::id();
        $data['flat_rate'] = 10;
        
        $addressId = Address::updateOrCreate(['user_id' => Auth::id()
                        ], $data)->id;

        $getAddress = Address::where('id', $addressId)->first();
       

        $getUser = User::where('id', Auth::id())->first();
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);

        $oldgiftcart = Session::get('giftcart');
        $giftcart = new Cart($oldgiftcart);

        $subscribe = Session::has('subscribe') ? Session::get('subscribe') : null;
        if ($subscribe != null):
            $subscriptionTotal = array_pop($subscribe);
        else:
            $subscriptionTotal = 0;
        endif;

        $CartQuantity = 0;
        $GiftCartQuantity = 0;
        $SubscriptionQuantity = 0;

        if (isset($cart->items)):
            foreach ($cart->items as $c) {
                $CartQuantity += (int) $c['qty'];
            }
        endif;
        if (isset($giftcart->items)):
           
            foreach ($giftcart->items as $g) {
           
                $GiftCartQuantity += (int) $g['item']['month'];
              
            }
        endif;
        if (isset($subscribe)):
            foreach ($subscribe as $s) {
                $SubscriptionQuantity += (int) $s['qty'];
            }
        endif;


        // dd($SubscriptionQuantity);
        if (($CartQuantity + $GiftCartQuantity + $SubscriptionQuantity) >= 3):
          
            $getAddress['flat_rate'] = 0;
        endif;
  
        return view('user/payment/stripe', compact('getAddress', 'getUser',), ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'gift' => $giftcart->items, 'giftPrice' => $giftcart->totalPrice, 'subscribe' => $subscribe, 'subscriptionTotal' => $subscriptionTotal]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function address_details() {

        $address = Address::where('user_id', Auth::id())->first();
//dd($address);
        return view('user/page/address-details', compact('address'));
    }

    public function show($id, $user_addr) {
        $address = Address::findOrFail($id);

        return view('admin.addresses.show', compact('address', 'user_addr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, $user_addr) {
        $address = Address::findOrFail($id);

        return view('admin.addresses.edit', compact('address', 'user_addr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id, $user_addr) {

        $requestData = $request->all();

        $address = Address::findOrFail($id);
        $address->update($requestData);

        return redirect('admin/addresses/' . $user_addr)->with('flash_message', 'Address updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, $user_addr) {

        Address::destroy($id);

        return redirect('admin/addresses/' . $user_addr)->with('flash_message', 'Address deleted!');
    }

}
