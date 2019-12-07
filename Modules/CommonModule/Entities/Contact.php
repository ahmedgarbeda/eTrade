<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = "contact_us";
    protected $fillable = ['email', 'title', 'status'];
}
