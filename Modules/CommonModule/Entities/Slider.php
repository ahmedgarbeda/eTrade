<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $table = "sliders";
    protected $fillable = ['title', 'image', 'description'];
    protected $guarded = [];
}
