<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Order extends Model
{
    protected $fillable = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
