<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductPhotos extends Model
{
    protected $fillable = [];

    protected $uploads = '/productImages/';
    
    public function getPathAttribute ($path){
        return $this->uploads . $path ;
    }
}
