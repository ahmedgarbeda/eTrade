<?php

namespace Modules\AdminModule\Entities;

use Modules\AdminModule\Entities\Role;
use Modules\AdminModule\Entities\AdminPhone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    protected $fillable = ['name','email','password','address','role_id'];
    use SoftDeletes;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function phones()
    {
        return $this->hasMany(AdminPhone::class);
    }
}
