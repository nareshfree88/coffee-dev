<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Trysubscription extends Model {

    use LogsActivity;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trysubscriptions';

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
    protected $fillable = ['user_id','subscription_id', 'name', 'bag_qty', 'total_bag_price', 'bag_per_month', 'status',
        'ended_at','started_at','end_date','shipping_status','tracking_id','address','city','state','post_code','country'
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
