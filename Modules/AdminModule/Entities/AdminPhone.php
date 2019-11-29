<?php

namespace Modules\AdminModule\Entities;

use Modules\AdminModule\Entities\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminPhone extends Model
{
    protected $fillable = ['admin_id','phone'];
}
