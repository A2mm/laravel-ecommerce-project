<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'shipping_id', 'payment_id', 'order_total', 'status_id'];

    protected $dates = ['deleted_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function order_details()
    {
    	return $this->hasMany(OrderDetail::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

}
