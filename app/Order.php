<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Order extends Model {

    use LogsActivity;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_description', 'product_name', 'product_price', 'quantity', 'product_id', 'sub_total',
        'customer_trans_id', 'gift_sub_total','currency', 'grand_total', 'channel_name', 'status', 'tracking_id',
        'order_status','subscription_amt','flat_rate'
    ];

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName) {
        return __CLASS__ . " model has been {$eventName}";
    }

    public function get_user() {
        return $this->hasOne(User::class, 'id', 'user_id')->select('id', 'name');
    }

}
