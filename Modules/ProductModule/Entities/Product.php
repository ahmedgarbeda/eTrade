<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function photo(){
        return $this->hasOne(ProductPhotos::class);
    }

}
