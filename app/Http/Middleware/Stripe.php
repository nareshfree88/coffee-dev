<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Stripe {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $cart = Session::has('cart') ? Session::get('cart') : null;

        if ($cart == null || $cart->totalPrice == 0 || $cart->totalPrice == null) {

            $giftcart = Session::has('giftcart') ? Session::get('giftcart') : null;

            if ($giftcart == null || $giftcart->totalPrice == 0 || $giftcart->totalPrice == null) {

                $subscribe = Session::has('subscribe') ? Session::get('subscribe') : null;
                if ($subscribe == null) {
                    return redirect('payment-error');
                } else {
                    return $next($request);
                }
            } else {
                return $next($request);
            }


//            return redirect('payment-error');
        }
        return $next($request);
    }

}
