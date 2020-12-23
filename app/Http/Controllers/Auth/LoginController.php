<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback() {
        $user = Socialite::driver('google')->stateless()->user();
        $AuthUser = $this->findOrCreateUser($user, 'google');
        Auth::login($AuthUser, true);
//        return redirect($this->redirectTo);
        return redirect()->intended();
        
    }

//facebook
    public function redirectTo_fb_Provider() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handle_fb_ProviderCallback() {
        $user = Socialite::driver('facebook')->stateless()->user();
        try {
            if ($user->email !== null):
               
                $AuthUser = $this->findOrCreateUser($user, 'facebook');
                Auth::login($AuthUser, true);
                return redirect($this->redirectTo);
            else:
//                return view('payment.error');
                return redirect('payment-error')->withErrors(['msg' => 'The email is requred. Please enter your email insted of username ']);
            endif;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function findorCreateUser($user, $provider) {

        $AuthUser = User::where('client_id', $user->id)->first();
        if ($AuthUser) {
            return $AuthUser;
        }

        return User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'email' => $user->email,
                    'client_id' => $user->id,
                    'provider' => strtoupper($provider)
        ]);
    }

    protected function authenticated(Request $request) {
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return redirect('/admin');
        } else {
            $finalRedirectionTo = redirect()->intended($this->redirectPath());
            return $finalRedirectionTo;
        }
    }

}
