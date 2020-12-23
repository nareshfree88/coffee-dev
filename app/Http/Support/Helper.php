<?php

namespace App\Http\Support;

use Session;
use App\Currencyrate;

class Helper {

    public static function convertion($curency) {
        
        $currency_rate = Currencyrate::first();
       if($curency == 'usd'):
           
         session()->put('curency_rate', number_format($currency_rate->conversion_rate,2));
       else:
           session()->put('curency_rate', 0); 
       endif;
        return $curency;
    }

}
