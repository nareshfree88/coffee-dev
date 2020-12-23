<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Session;
use App\Cart;

class ProductsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    public function index(Request $request) {

        $products = Product::where('category', 'whole_beans')->get();


        return view('user.products.coffee', compact('products'));
    }

    public function equipmentIndex(Request $request) {

        $equipments = Product::where('category', 'equipment')->get();

        return view('user.equipment.equipment', compact('equipments'));
    }

    public function allProducts() {
        $products = Product::get();
        return view('user.products.all', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('user.products.show', compact('product'));
    }

    public static function cartValues() {
        $oldCart = Session::get('cart');

        $cart = new Cart($oldCart);

        return ['cartValue' => $cart->items, 'totalPrice' => $cart->totalPrice];
    }

    public function addItem(Request $request) {
//        dd($request->all());
        $id = $request->product_id;
        $qty = $request->qty;
        $product = Product::find($id);
//        dd($product);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $qty);
        $request->session()->put('cart', $cart);

//        return redirect()->to('/show/' . $product->id);
        Session::flash('message', "open_cart");
        return redirect()->back();
    }

    public function giftSubscriptionView() {
        return view('user/gift-subscription/index');
    }

    public function giftSubscription(Request $request) {
        $product = [
            'id' => rand(10, 100),
            'name' => 'Gift-Subscription',
            'name_fr' => 'Gift-Subscription',
            'price' => $request->total,
            'quantity' => $request->bag,
            'month' => $request->month
        ];

        $oldcart = Session::has('giftcart') ? Session::get('giftcart') : null;
        $cart = new Cart($oldcart);
        $cart->giftSubscription($product, $product['id'], $request->bag);

        $request->session()->put('giftcart', $cart);
        Session::flash('message', "openGift");
        return redirect()->back();
    }

    public static function giftCartValue() {
        $oldcart = Session::get('giftcart');
        $cart = new Cart($oldcart);
        return ['cartValue' => $cart->items, 'totalPrice' => $cart->totalPrice];
    }

 

    public function edit($id) {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {

        $requestData = $request->all();

        $product = Product::findOrFail($id);
        $product->update($requestData);

        return redirect('admin/products')->with('flash_message', 'Product updated!');
    }

    public function destroy($id) {
        Product::destroy($id);

        return redirect('admin/products')->with('flash_message', 'Product deleted!');
    }

    public function delete(Request $request, $id) {

        $oldCart = Session::get('cart');

        $cart = new Cart($oldCart);
//        dd();
//        dd($cart->totalPrice .'-'. $cart->items[$id]['price'] .'*'. $cart->items[$id]['qty']);
        $cart->totalPrice = $cart->totalPrice - ($cart->items[$id]['item']['price'] * $cart->items[$id]['qty']);
        unset($cart->items[$id]);
        $request->session()->put('cart', $cart);

        return back();
    }

    public function deleteGiftSubscription(Request $request, $id) {
        $oldCart = Session::get('giftcart');
        $cart = new Cart($oldCart);
        $cart->totalPrice = $cart->totalPrice - $cart->items[$id]['price'];
        unset($cart->items[$id]);
        $request->session()->put('giftcart', $cart);
        return back();
    }

    public function DeleteTrySubscription() {
        Session::forget('subscribe');
        return back();
    }

}
