<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    protected $fillable = ['shipping_method_id','governrate_id','cost'];
    protected $hidden=['created_at','updated_at'];
}
