<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\PasswordReset;
use App\Http\Requests;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class PasswordController extends Controller {

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validatePasswordRequest(Request $data){
        $email = $data['email'];
        //You can add validation login here
        $user = User::where('email', '=', $email)
            ->first();
        //Check if the user exists
        if (empty($user)) {
            //return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
            echo "NOT_EXIST";die();
        }
        
        //check if token already exists
        $check = PasswordReset::where('email', '=', $email)->first();
        if(empty($check)){
            //Create Password Reset Token
            PasswordReset::insert([
                'email' => $email,
                'token' => str_random(60),
                'created_at' => Carbon::now()
                
            ]);
        }else{
            //update Password Reset Token
            PasswordReset::where('email', $email)->update([
                'token' => str_random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        
        //Get the token just created above
        $tokenData = PasswordReset::where('email', $email)->first();

        if($this->sendResetEmail($email, $tokenData->token)){
            echo "SENT";die();
        }else{
            echo "FAILED";die();
        }

        /*if ($this->sendResetEmail($email, $tokenData->token)) {
            //We have e-mailed your password reset link!
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }*/
    }


    protected function sendResetEmail($email, $token){
        //Retrieve the user from the database
        $user = User::where('email', $email)->select('name', 'email')->first();

        //Generate, the password reset link. The token generated is embedded in the link
        $link = url(''). '/password/reset/' . $token . '?email=' . urlencode($user->email);

        try {
            //Here send pasword reset link through mail
            $emailData['data'] = [
                'name'      =>  $user->name,
                'link'   =>   $link
            ];
            $to = $user->email;
            $subject = "Reset Password Notification";

            Mail::send('email.reset_email_template', $emailData, function ($message) use ($to, $subject) {
                $message->to($to, '')->subject($subject);
            });
            
            return true;
            
        } catch (\Exception $e) {
            return false;
        }
    }
}