<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
                           'sku', 'name','name_fr', 'attribute_family', 'type','type_fr', 'status', 'price', 'quantity',
                           'url_key','cost','special_price','special_price_from','special_price_to',
                           'tax_category','new','featured','visible_individually','color','brand','size',
                           'width','height','depth','weight','image','channel','up_selling','cross_seling',
                           'description','description_fr','category','equip_addon','long_description','long_description_fr'
                        ];

    

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
