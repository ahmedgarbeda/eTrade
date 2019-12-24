<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;
// use Modules\CommonModule\Entities\ShippingCost;

class ShippingMethod extends Model
{
    protected $fillable = ['name'];
    protected $hidden=['created_at','updated_at'];
    public function shipping_cost()
    {
        return $this->hasMany(ShippingCost::class);
    }
}
