<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'email', 'phone', 'address', 'city', 'country'];

    protected $dates = ['deleted_at'];

    public function orders()
    {
    	return $this->hasMany(Order::class);
    }
}


