<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stripe;
use App\Trysubscription;
use App\User;
use App\Mail\AlertMail;
use Illuminate\Support\Facades\Mail;

class SubscriptionUpdate extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the subscription data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        
        $MyModel = new Trysubscription;
        $subscription = $MyModel->get();
        
        foreach ($subscription as $data):
            
            $UserSubscription = $stripe->subscriptions->retrieve($data->subscription_id);
            $updateSubscription = Trysubscription::where('subscription_id', $UserSubscription->id)->update([
                'end_date' => $UserSubscription->current_period_end
            ]);
            $updatedValue = $MyModel->where('subscription_id', $UserSubscription->id)->first();


            $date1 = date_create(date('d-m-Y', $updatedValue->end_date)); //Test
            $date2 = date_create('28-12-2020'); // current date test
//            $date1 = date_create(date('d-m-Y',$updatedValue->end_date)); //end date  
//            $date2 = date_create(date('d-m-Y')); // current date
            $diff = date_diff($date1, $date2);
            $daysLeft = $diff->format("%a");

            if ($daysLeft <= 7 && $daysLeft > 0):

                $user = User::where('id', $updatedValue->user_id)->first();
                $MainData = [
                    'email' => $user->email,
                    'subscription_id' => $UserSubscription->id,
                    'ended_at' => $updatedValue->ended_at,
                    'started_at' => $updatedValue->started_at,
                    'end_date' => $updatedValue->end_date,
                    'days' => $daysLeft
                ];

                Mail::to($user->email)->send(new AlertMail($MainData));
                echo 'Mail Send Successfully..';
                echo 'Days Left ----->' . $daysLeft;
            else:
                echo 'else---->' . $daysLeft;
            endif;

        endforeach;
        die;
//        print_r($data);
    }

}
