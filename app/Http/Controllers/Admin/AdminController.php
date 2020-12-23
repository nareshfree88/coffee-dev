<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Order;
use App\Subscription;
use App\Giftsubscription;

use App\Trysubscription;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $user = User::get()->count();
        $products = Product::get()->count();
        $orders = Order::get()->count();
        $subscriptions = Giftsubscription::get()->count();
       
        $trySubscription = Trysubscription::get()->count();

        return view('admin.dashboard', compact('user', 'products', 'orders', 'subscriptions','trySubscription'));
    }
}
