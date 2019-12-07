<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    protected $fillable = [];

    public  function product(){
        return $this->belongsTo(Product::class);
    }

    public  function category(){
        return $this->belongsTo(Category::class);
    }
}
