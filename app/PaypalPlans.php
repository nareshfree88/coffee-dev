<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class PaypalPlans extends Model
{
    use LogsActivity;
    
    protected $table = 'paypal_plans';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['user_id', 'plan_id','price'];
}
