<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table='settings';
    protected $fillable = ['address','email','phone','youtube','facebook','twitter','aboutus','aboutphoto','logo'];
}
