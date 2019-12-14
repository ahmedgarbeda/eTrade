<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\AdminModule\Entities\Admin;

class Product extends Model
{
    protected $fillable = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function photo(){
        return $this->hasOne(ProductPhotos::class);
    }

    public  function offer(){
        return $this->hasOne(Offer::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}
