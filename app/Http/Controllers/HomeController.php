<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Video;
use App\Trysubscription;
use Auth;
use App\Giftsubscription;
use App\TrackShipping;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $products = Product::where('category', 'whole_beans')->orderBy('id', 'desc')->take(3)->get();
        $subscription = Trysubscription::where('user_id',Auth::id())->where('status','1')->first();
        
        $video = Video::latest()->first();
       // dd($video);
        return view('home', compact('products','video'));
    }

    public function NewMain() {
        return view('layouts/user_layouts/new_main');
    }
    
    public static function  checkSubscription(){
        $subscription = Trysubscription::where('user_id',Auth::id())->where('status','1')->first();
        return $subscription;
    }
    
    public function giftSubscriptionHistory(){
        $orders = Giftsubscription::where('user_id',Auth::id())->get();
        return  view('user/page/gift-subscription-history', compact('orders'));
    }
    public static function TrackGiftSubscription($id){
        $Details= Giftsubscription::where('id',$id)->first();
        
        $orders =  TrackShipping::where('gift_subscription_id',$id)->get();
        return view('user/page/gift-subscription-details', compact('orders','Details'));

    }

}
