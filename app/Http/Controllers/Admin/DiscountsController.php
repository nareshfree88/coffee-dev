<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Discount;
use Illuminate\Http\Request;
use Session;
use App\Cart;

class DiscountsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $discounts = Discount::where('coupan_code', 'LIKE', "%$keyword%")
                            ->orWhere('discount_percentage', 'LIKE', "%$keyword%")
                            ->orWhere('status', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $discounts = Discount::latest()->paginate($perPage);
        }

        return view('admin.discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.discounts.create');
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
        $requestData['status'] = 1;
        Discount::create($requestData);

        return redirect('admin/discounts')->with('flash_message', 'Discount added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $discount = Discount::findOrFail($id);

        return view('admin.discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $discount = Discount::findOrFail($id);

        return view('admin.discounts.edit', compact('discount'));
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

        $discount = Discount::findOrFail($id);
        $discount->update($requestData);

        return redirect('admin/discounts')->with('flash_message', 'Discount updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Discount::destroy($id);

        return redirect('admin/discounts')->with('flash_message', 'Discount deleted!');
    }

    public function getDiscount(Request $request) {
        if ($request->ajax()) {
            $coupan = $request->discount;
            $discount = Discount::where('coupan_code', $coupan)->where('status', '1')->first();

            if ($discount !== null):
                $Product_old_cart = Session::has('cart') ? Session::get('cart') : null;
                $gift_old_cart = Session::has('giftcart') ? Session::get('giftcart') : null;

                $product_cart = new Cart($Product_old_cart);
             
                $gift_cart = new Cart($gift_old_cart);
               
                $usd_price = Session::has('curency_rate') ? Session::get('curency_rate') : 0;
                $cad_price = number_format($product_cart->totalPrice + $gift_cart->totalPrice, 2);
//                enmycode

                $totalCart = $usd_price ? $cad_price * $usd_price : $cad_price;
//               
                $discountTotal = ($totalCart * $discount->discount_percentage) / 100;
                $discountAmt = number_format($discountTotal, 2);

                $grandTotal = number_format($totalCart - $discountTotal, 2);

                $getTotal = Session::put('gTotal', $grandTotal);
                Session::put('TotalDiscount', $discountTotal);
                return response()->json(["msg" => "coupan applied", "discount" => $discount->discount_percentage, "coupan" => $discount->coupan_code, 'grandTotal' => $grandTotal, 'discountAmt' => $discountAmt]);
            else:
                return response()->json(["error" => "Not a valid coupan code"]);
            endif;
        }
    }

    public function changeStatus(Request $request) {
        $id = $request->discountId;
        $status = $request->status;
        $discount = Discount::where('id', $id)->first();
        $getStatus = $discount->status = $status ? '1' : '0';

        $discount_status = ['status' => $getStatus];
        $discount->fill($discount_status);
        $discount->save();

        return response()->json(['msg' => 'Update discount status']);
    }

}
