<?php

namespace Modules\AdminModule\Entities;

use Modules\AdminModule\Entities\Role;
use Modules\AdminModule\Entities\AdminPhone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class Admin extends Model implements Authenticatable

{
    use AuthenticableTrait;
    protected $fillable = ['name','email','password','address','phone','role_id'];
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
