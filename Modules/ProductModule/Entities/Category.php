<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }
}
