<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewslatterController extends Controller {

    public function NewsLatter(Request $request) {
//        Newsletter::delete($request->email);
        if (!Newsletter::isSubscribed($request->email)): //returns a boolean);
       
            Newsletter::subscribe($request->email, ['FNAME' => $request->fname, 'LNAME' => $request->lname]);
//         dd('subscribe');
            return redirect()->back()->with('status', 'You Subscribed Successfully');
        endif;
//        dd('already Subscribed');
        return redirect()->back()->with('status', 'You have already subscribed.');
    }

}
