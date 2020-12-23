<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Address;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;
use App\EmailContent;
use Illuminate\Http\Request;

class OrdersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $orders = Order::with('get_user')->orderBy('id','DESC')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public static function getProductName($id) {

        $proName = \App\Product::select('id', 'name')->where('id', $id)->first();
        return $proName->name;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.orders.create');
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

        Order::create($requestData);

        return redirect('admin/orders')->with('flash_message', 'Order added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function order_history() {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'desc')->take(8)->get();
        return view('user/page/order-history', compact('orders'));
    }

    public function show($id) {
        $order = Order::findOrFail($id);


        $user = \App\User::where('id', $order->user_id)->select('id', 'name', 'email')->first();
        $address = Address::where('user_id', $user->id)->latest()->first();
//        dd($address->toArray());
        return view('admin.orders.show', compact('order', 'user', 'address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', compact('order'));
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

        $order = Order::findOrFail($id);
        $order->update($requestData);

        return redirect('admin/orders')->with('flash_message', 'Order updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function OrderStatus(Request $request) {
   
        $order = Order::where('id', $request->order_id)->update([
            'status' => $request->Order_status,
            'tracking_id'=>$request->tracking_id,
        ]);
      
        $OrderDetails = Order::where('id', $request->order_id)->first();
     
        $user = User::where('id', $OrderDetails->user_id)->first();
     
        $email = EmailContent::where('status', $request->Order_status)->latest()->first();

        $data = [
            'name' => $user->email,
            'product_name' => $OrderDetails->product_name,
            'content' => $email->content,
            'tracking_id'=> ($request->tracking_id !=null)?$request->tracking_id:'',
        ];
        $mail = Mail::to('ashumehra768@outlook.com')->send(new OrderStatusMail($data));

        return redirect()->back()->with('success', 'Status Updated Successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Order::destroy($id);

        return redirect('admin/orders')->with('flash_message', 'Order deleted!');
    }

}
