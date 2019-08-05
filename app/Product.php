<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable= ['name', 'category_id', 'brand_id', 'description', 'price', 'color', 'image', 'availability', 'status'];

    protected $dates= ['deleted_at'];

    public function setStatusAttribute($value)
    {
         $this->attributes['status']= (boolean)($value);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function brand()
    {
    	return $this->belongsTo(Brand::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
